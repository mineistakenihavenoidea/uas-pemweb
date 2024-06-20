<?php

namespace App\Models;

use CodeIgniter\Model;

class GameModel extends Model
{
    protected $table = 'games';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'description', 'category_id', 'image'];

    public function getPaginatedGamesWithCategory($perPage, $currentPage)
    {
        return $this->select('games.*, categories.name as category')
                    ->join('categories', 'categories.id = games.category_id')
                    ->orderBy('games.id', 'DESC')
                    ->paginate($perPage, 'default', $currentPage);
    }
}
