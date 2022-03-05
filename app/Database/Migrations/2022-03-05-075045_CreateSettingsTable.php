<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSettingsTable extends Migration
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
            'sname' => [
                'type'       => 'varchar',
                'constraint' => 255,
                'unique'     => true,
            ],
            'sdetails' => [
                'type'       => 'text',
                'constraint' => 450,
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
        $this->forge->createTable('settings', true);
    }

    public function down()
    {
        $this->forge->dropTable('settings', true);
    }
}
