<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSeoTable extends Migration
{
    public function up()
    {
        $data = [
            'id' => [
                'type'           => 'int',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'stitle' => [
                'type'       => 'varchar',
                'constraint' => 150,
            ],
            'sdetails' => [
                'type'       => 'varchar',
                'constraint' => 255,
            ],
            'skey' => [
                'type'       => 'varchar',
                'constraint' => 255,
            ],
            'created_at' => [
                'type' => 'datetime', 
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'datetime', 
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'datetime', 
                'null' => true,
            ],
        ];

        $this->forge->addKey('id', true);
        $this->forge->addField($data);
        $this->forge->createTable('seo', true);
    }

    public function down()
    {
        $this->forge->dropTable('seo', true);
    }
}
