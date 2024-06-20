<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddImageToGames extends Migration
{
    public function up()
    {
        $fields = [
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
        ];

        $this->forge->addColumn('games', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('games', 'image');
    }
}
