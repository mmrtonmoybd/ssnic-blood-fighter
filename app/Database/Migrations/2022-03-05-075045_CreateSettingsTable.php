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
            'siteName' => [
                'type'       => 'varchar',
                'constraint' => 255,
            ],
            'siteEmail' => [
                'type'       => 'varchar',
                'constraint' => 100,
            ],
            'sitePhone' => [
                'type'       => 'varchar',
                'constraint' => 18,
            ],
            'siteAddress' => [
                'type'       => 'varchar',
                'constraint' => 255,
            ],
            'siteFB' => [
                'type'       => 'varchar',
                'constraint' => 100,
            ],
            'siteTwitter' => [
                'type'       => 'varchar',
                'constraint' => 100,
            ],
            'siteLinkIn' => [
                'type'       => 'varchar',
                'constraint' => 100,
            ],
            'siteYT' => [
                'type'       => 'varchar',
                'constraint' => 100,
            ],
            'siteInsta' => [
                'type'       => 'varchar',
                'constraint' => 100,
            ],
            'siteAus' => [
                'type'       => 'varchar',
                'constraint' => 255,
            ],
            'siteGkey' => [
                'type'       => 'varchar',
                'constraint' => 255,
            ],
            'siteBkey' => [
                'type'       => 'varchar',
                'constraint' => 255,
            ],
            'siteFkey' => [
                'type'       => 'varchar',
                'constraint' => 255,
            ],
            'siteGAKet' => [
                'type'       => 'varchar',
                'constraint' => 255,
            ],
            'siteCover' => [
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
        $this->forge->createTable('settings', true);
    }

    public function down()
    {
        $this->forge->dropTable('settings', true);
    }
}
