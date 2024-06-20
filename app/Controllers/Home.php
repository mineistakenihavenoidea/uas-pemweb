<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // Load the homepage view
        echo view('templates/header');
        echo view('pages/home');
        echo view('templates/footer');
    }
}
