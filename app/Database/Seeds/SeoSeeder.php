<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeoSeeder extends Seeder
{
    public function run()
    {
        $datas = [
            [
                'stitle'   => 'home Title',
                'sdetails' => 'home details',
                'skey'     => 'home, Title',
                'sslug' => 'home'
            ],
            [
                'stitle'   => 'Login title',
                'sdetails' => 'login details',
                'skey'     => 'login, title',
                'sslug' => 'login',
            ],
            [
                'stitle'   => 'Register title',
                'sdetails' => 'register details',
                'skey'     => 'register, detakisl',
                'sslug' => 'register',
            ],
            [
                'stitle'   => 'forget password',
                'sdetails' => 'forget password',
                'skey'     => 'forget, password',
                'sslug' => 'forget',
            ],
            [
                'stitle'   => 'reset password',
                'sdetails' => 'reset password',
                'skey'     => 'reset, password',
                'sslug' => 'reset',
            ],
        ];

        $builder = $this->db->table('seo');

        foreach ($datas as $data) {
            $builder->insert($data);
        }
    }
}
