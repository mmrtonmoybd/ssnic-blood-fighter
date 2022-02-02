<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use Config\Database;

class AuthGroup extends Seeder
{
    public function run()
    {
        $db      = Database::connect();
        $builder = $db->table('auth_groups');

        $data = [
            [
                'name'        => 'donor',
                'description' => 'Normal user call Donor. This user can edit there profile and just see ther blood history.',
            ],
            [
                'name'        => 'contributor',
                'description' => 'The user who manage the blood donor is call contributor. This user also same as donor.',

            ],
            [
                'name'        => 'admin',
                'description' => 'Admin is a person who can manage everything on this system.',
            ],
        ];

        $builder->insertBatch($data);
    }
}
