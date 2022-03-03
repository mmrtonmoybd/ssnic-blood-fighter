<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColumnOnUsers extends Migration
{
    public function up()
    {
        $data = [
            'city' => [
              'type'       => 'VARCHAR',
              'constraint' => 255,
              'after'      => 'haddress',  
            ],
        ];

        $this->forge->addColumn('users', $data);
    }

    public function down()
    {
        //
    }
}
