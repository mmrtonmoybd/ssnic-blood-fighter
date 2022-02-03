<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColumnsOnUsers extends Migration
{
    public function up()
    {
        $data = [

            'firstname' => [
                'type'       => 'varchar',
                'constraint' => 255,
                'after'      => 'username',
            ],
            'lastname' => [
                'type'       => 'varchar',
                'constraint' => 255,
                'after'      => 'username',
            ],

            'phonenumber' => [
                'type'       => 'VARCHAR',
                'constraint' => 15,
                'after'      => 'username',
            ],

            'haddress' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'after'      => 'username',
            ],
            'bgroup' => [
                'type'       => 'VARCHAR',
                'constraint' => 6,
                'after'      => 'username',
            ],
            'lastdonate' => [
                'type'    => 'date',
                'null'    => true,
                'after'   => 'username',
                'default' => '1971-01-01',
            ],
            'pphoto' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'username',
            ],
            'gender' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
                'after'      => 'username',
            ],

            'institute' => [
                'type'       => 'varchar',
                'constraint' => 255,
                'after'      => 'username',
            ],
            'batch' => [
                'type'       => 'varchar',
                'constraint' => 70,
                'after'      => 'username',
            ],

        ];

        $this->forge->addColumn('users', $data);
    }

    public function down()
    {
    }
}
