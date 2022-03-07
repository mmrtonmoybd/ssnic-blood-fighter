<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateSeoTable extends Migration
{
    public function up()
    {
        $data = [
            'sslug' => [
                'type' => 'varchar',
                'constraint' => 150,
                'after' => 'id',
                'unique' => true,
            ],
        ];

        $this->forge->addColumn('seo', $data);
    }

    public function down()
    {
        //
    }
}
