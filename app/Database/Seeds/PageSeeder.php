<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run()
    {
        $datas = [
            [
                'slug'       => 'about-us',
                'seot'       => 'About us',
                'seod'       => 'about us',
                'seok'       => 'about, us',
                'pname'      => 'About us',
                'pcontent'   => 'about us details',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'slug'       => 'contact-us',
                'seot'       => 'Contact us',
                'seod'       => 'contact us',
                'seok'       => 'contact, us',
                'pname'      => 'Contact us',
                'pcontent'   => 'contact us',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'slug'       => 'why-donate-blood',
                'seot'       => 'Why donate blood',
                'seod'       => 'why donate blood',
                'seok'       => 'why, donate, blood',
                'pname'      => 'Why donate blood',
                'pcontent'   => 'why donate blood',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $builder = $this->db->table('pages');

        foreach ($datas as $data) {
            $builder->insert($data);
        }
    }
}
