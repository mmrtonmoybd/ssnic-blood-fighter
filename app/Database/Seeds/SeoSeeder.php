<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeoSeeder extends Seeder
{
    public function run()
    {
        $datas = [
            [
                'stitle' => 'home Title',
                'sdetails' => 'home details',
                'skey' => 'home, Title',
            ],
            [
                'stitle' => 'Login title',
                'sdetails' => 'login details',
                'skey' => 'login, title',
            ],
            [
                'stitle' => 'Register title',
                'sdetails' => 'register details',
                'skey' => 'register, detakisl',
            ],
            [
                'stitle' => 'forget password',
                'sdetails' => 'forget password',
                'skey' => 'forget, password',
            ],
        ];

        $builder = $this->db->table('seo');

        foreach ($datas as $data) {
            $builder->insert($data);
        }
    }
}
