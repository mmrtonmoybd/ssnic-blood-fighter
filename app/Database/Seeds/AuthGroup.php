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
                'name'        => 'sadmin',
                'description' => 'Super admin is a person who can manage everything on this system.',
            ],
            [
                'name'        => 'admin',
                'description' => 'Admin is a person who can manage many things on this system.',
            ],
            [
                'name'        => 'contributor',
                'description' => 'The user who manage the blood donor is call contributor. This user also same as donor.',

            ],
            [
                'name'        => 'donor',
                'description' => 'Normal user call Donor. This user can edit there profile and just see ther blood history.',
            ],
        ];

        $builder->insertBatch($data);
    }
}
