<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Config\Database;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $seed = Database::seeder();
        $seed->call('AuthGroup');
        $seed->call('UsersSeeder');
    }
}
