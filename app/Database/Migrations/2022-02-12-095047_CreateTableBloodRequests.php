<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableBloodRequests extends Migration
{
    public function up()
    {
        $data = [
            'id' => [
                'type' => 'int', 
                'constraint' => 11, 
                'unsigned' => true, 
                'auto_increment' => true
            ],
            'bgroup' => [
                'type' => 'varchar', 
                'constraint' => 6
            ],
            'user_id' => [
                'type' => 'int', 
                'constraint' => 11, 
                'unsigned' => true
            ],
            'donateplace' => [
'type' => 'varchar',
                'constraint' => 255
            ],
            'donor' => [
                'type' => 'int', 
                'constraint' => 11, 
                'unsigned' => true
            ],
            'manage_by' => [
               'type' => 'int', 
                'constraint' => 11, 
                'unsigned' => true
            ],
            'refarence' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'status'           => [
                'type' => 'int', 
                'constraint' => 1, 
                'null' => true
        ],
            'details' => [
                'type' => 'text'
            ],
            'created_at'       => [
                'type' => 'datetime', 'null' => true
            ],
            'updated_at'       => [
                'type' => 'datetime', 'null' => true
            ],
            'deleted_at'       => [
                'type' => 'datetime', 'null' => true
            ],
        ];

        $this->forge->addKey('id', true);
        $this->forge->addField($data);
        $this->forge->addForeignKey('user_id', 'users', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('donor', 'users', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('manage_by', 'users', 'id', '', 'CASCADE');
        
        $this->forge->createTable('blood_requests', true);
    }

    public function down()
    {
        $this->forge->dropForeignKey('blood_requests', 'blood_requests_user_id_foreign');
        $this->forge->dropForeignKey('blood_requests', 'blood_requests_donor_foreign');
        $this->forge->dropForeignKey('blood_requests', 'blood_requests_manage_by_foreign');

        $this->forge->dropTable('blood_requests', true);
    }
}
