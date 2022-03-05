<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePageTable extends Migration
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
            'slug' => [
                'type'       => 'varchar',
                'constraint' => 150,
            ],
            'seot' => [
                'type'       => 'varchar',
                'constraint' => 100,
            ],
            'seod' => [
                'type'       => 'varchar',
                'constraint' => 180,
            ],
            'seok' => [
                'type'       => 'varchar',
                'constraint' => 255,
            ],
            'pname' => [
                'type'       => 'varchar',
                'constraint' => 250,
            ],
            'pcontent' => [
                'type' => 'text',
            ],
            'created_at' => [
                'type' => 'datetime', 'null' => true,
            ],
            'updated_at' => [
                'type' => 'datetime', 'null' => true,
            ],
            'deleted_at' => [
                'type' => 'datetime', 'null' => true,
            ],
        ];

        $this->forge->addKey('id', true);
        $this->forge->addField($data);
        $this->forge->createTable('pages', true);
    }

    public function down()
    {
        $this->forge->dropTable('pages', true);
    }
}
