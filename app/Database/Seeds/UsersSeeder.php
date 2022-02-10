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
                'email'       => 'admin@gmail.com',
                'username'    => 'admin',
                'firstname'   => 'Moshiur',
                'lastname'    => 'Rahman',
                'phonenumber' => '01925398888',
                'gender'      => 'Male',
                'institute'   => 'ssnic',
                'batch'       => 'Batch-21',
                'bgroup'      => 'O+',
                'haddress'    => 'Mymensingh',
                'password'    => Password::hash('224466@@'),
                'active'      => 1,
            ],
            [
                'email'       => 'contributor@gmail.com',
                'username'    => 'contributor',
                'firstname'   => 'Moshiur',
                'lastname'    => 'Rahman',
                'phonenumber' => '01925398888',
                'gender'      => 'Male',
                'institute'   => 'ssnic',
                'batch'       => 'Batch-21',
                'bgroup'      => 'O+',
                'haddress'    => 'Mymensingh',
                'password'    => Password::hash('224466@@'),
                'active'      => 1,
            ],
            [
                'email'       => 'donor@gmail.com',
                'username'    => 'donor',
                'firstname'   => 'Moshiur',
                'lastname'    => 'Rahman',
                'phonenumber' => '01925398888',
                'gender'      => 'Male',
                'institute'   => 'ssnic',
                'batch'       => 'Batch-21',
                'bgroup'      => 'O+',
                'haddress'    => 'Mymensingh',
                'password'    => Password::hash('224466@@'),
                'active'      => 1,
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
                'group_id' => 3,
                'user_id'  => 1,
            ],
            [
                'group_id' => 2,
                'user_id'  => 1,
            ],
            [
                'group_id' => 1,
                'user_id'  => 2,
            ],
        ];

        $builder = $this->db->table('auth_groups_users');

        foreach ($rows as $row) {
            $builder->insert($row);
        }
    }
}