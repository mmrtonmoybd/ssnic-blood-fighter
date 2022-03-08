<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Myth\Auth\Entities\User;
use Myth\Auth\Password;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'email'         => 'sadmin@gmail.com',
                'username'      => 'sadmin',
                'firstname'     => 'Moshiur',
                'lastname'      => 'Rahman',
                'phonenumber'   => '01925398888',
                'gender'        => 'Male',
                'institute'     => 'ssnic',
                'batch'         => 'Batch-21',
                'bgroup'        => 'O+',
                'haddress'      => 'Mymensingh',
                'city'          => 'Mymensingh',
                'password_hash' => Password::hash('224466@@'),
                'active'        => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'email'         => 'admin@gmail.com',
                'username'      => 'admin',
                'firstname'     => 'Moshiur',
                'lastname'      => 'Rahman',
                'phonenumber'   => '01925398888',
                'gender'        => 'Male',
                'institute'     => 'ssnic',
                'batch'         => 'Batch-21',
                'bgroup'        => 'O+',
                'haddress'      => 'Mymensingh',
                'city'          => 'Mymensingh',
                'password_hash' => Password::hash('224466@@'),
                'active'        => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'email'         => 'contributor@gmail.com',
                'username'      => 'contributor',
                'firstname'     => 'Moshiur',
                'lastname'      => 'Rahman',
                'phonenumber'   => '01925398888',
                'gender'        => 'Male',
                'institute'     => 'ssnic',
                'batch'         => 'Batch-21',
                'bgroup'        => 'O+',
                'haddress'      => 'Mymensingh',
                'city'          => 'Mymensingh',
                'password_hash' => Password::hash('224466@@'),
                'active'        => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'email'         => 'donor@gmail.com',
                'username'      => 'donor',
                'firstname'     => 'Moshiur',
                'lastname'      => 'Rahman',
                'phonenumber'   => '01925398888',
                'gender'        => 'Male',
                'institute'     => 'ssnic',
                'batch'         => 'Batch-21',
                'bgroup'        => 'O+',
                'haddress'      => 'Mymensingh',
                'city'          => 'Mymensingh',
                'password_hash' => Password::hash('224466@@'),
                'active'        => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
        ];

        $builder = $this->db->table('users');

        foreach ($users as $user) {
            // Use the User entity to handle correct password hashing
            //$user = new User($user);
            $builder->insert($user);
        }

        // GROUPS-USERS
        $rows = [
            [
                'group_id' => 1,
                'user_id'  => 1,
            ],
            [
                'group_id' => 2,
                'user_id'  => 2,
            ],
            [
                'group_id' => 3,
                'user_id'  => 3,
            ],
            [
                'group_id' => 4,
                'user_id'  => 4,
            ],
        ];

        $builder = $this->db->table('auth_groups_users');

        foreach ($rows as $row) {
            $builder->insert($row);
        }
    }
}
