<?php namespace App\Controllers;

use App\Models\GameModel;
use App\Models\CategoryModel;
use CodeIgniter\Controller;

class CollectionController extends Controller
{
    public function index()
    {
        $gameModel = new GameModel();

        $currentPage = $this->request->getVar('page') ?? 1;
        $perPage = 10; 

        $data = [
            'games' => $gameModel->getPaginatedGamesWithCategory($perPage, $currentPage),
            'pager' => $gameModel->pager,
        ];

        return view('pages/collection', $data);
    }
}
