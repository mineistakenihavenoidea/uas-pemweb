<?php namespace App\Libraries;

class ImageLib
{
    protected $uploadPath;

    public function __construct()
    {
        $this->uploadPath = ROOTPATH . 'public/uploads/images/';
    }

    public function upload($imageFile)
    {
        $uploadPath = ROOTPATH . 'public/uploads/images/';
        $imageName = $imageFile->getRandomName();
        $imageFile->move($uploadPath, $imageName);

        return 'uploads/images' . $imageName;
    }
}
