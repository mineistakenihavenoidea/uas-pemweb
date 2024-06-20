<?php namespace App\Models;

use CodeIgniter\Model;

class CoverModel extends Model
{
    protected $table = 'covers';
    protected $allowedFields = ['game_id', 'file_path'];
    protected $useTimestamps = true;
}
