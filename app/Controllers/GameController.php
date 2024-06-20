<?php namespace App\Controllers;

use App\Models\GameModel;
use App\Models\CategoryModel;
use App\Libraries\ImageLib;
use CodeIgniter\Controller;

class GameController extends Controller
{
    protected $gameModel;
    protected $imageLib;

    public function __construct()
    {
        $this->gameModel = new GameModel();
        $this->imageLib = new ImageLib();
    }
    
    public function index()
    {
        $gameModel = new GameModel();
        $data['games'] = $gameModel->getGamesWithCategory();
        $data['pager'] = $gameModel->pager;
    
        // Debugging: Print the data to check if 'category' field exists
        echo "<pre>";
        print_r($data['games']);
        echo "</pre>";
        exit;
    
        return view('pages/collection', $data);
    }    

    public function create()
    {
        $categoryModel = new CategoryModel();
        $data['categories'] = $categoryModel->findAll();
        
        return view('games/create', $data);
    }

    public function store()
    {
        $gameModel = new GameModel();

        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'category_id' => $this->request->getPost('category_id')
        ];

        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads/images/', $newName);
            $data['image'] = $newName;
        }

        $gameModel->insert($data);
        
        return redirect()->to('/collection');
    }

    public function edit($id)
    {
        $gameModel = new GameModel();
        $categoryModel = new CategoryModel();

        $data['game'] = $gameModel->find($id);
        $data['categories'] = $categoryModel->findAll();

        return view('games/edit', $data);
    }

    public function update($id)
    {
        $gameModel = new GameModel();
        $imageLib = new ImageLib();
        $existingGame = $gameModel->find($id);

        $data = [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'category_id' => $this->request->getPost('category_id'),
        ];

        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $imagePath = $imageLib->upload($image);  
            if ($imagePath) {
                $data['image'] = $imagePath;
            }
        } else {
            $data['image'] = $existingGame['image']; 
        }

        $gameModel->update($id, $data);

        return redirect()->to('/collection');
    }

    public function delete($id)
    {
        $gameModel = new GameModel();
        
        $game = $gameModel->find($id);

        $gameModel->delete($id);

        if ($game && !empty($game['image'])) {
            $imagePath = ROOTPATH . 'public/uploads/images/' . $game['image'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        return redirect()->to('/collection');
    }

    private function uploadImage()
    {
        $image = $this->request->getFile('image');
        $imageName = $image->getRandomName();
        $image->move('uploads/images/', $imageName);
        return 'uploads/images/' . $imageName;
    }
}
