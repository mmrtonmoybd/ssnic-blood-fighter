<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeetingSeeder extends Seeder
{
    public function run()
    {
        $datas = [
            [
                'sname'      => 'siteName',
                'sdetails'   => 'BWS',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'sname'      => 'siteEmail',
                'sdetails'   => 'admin@ssnic.com',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'sname'      => 'sitePhone',
                'sdetails'   => '01965374411',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'sname'      => 'siteAddress',
                'sdetails'   => 'Mymensingh',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'sname'      => 'siteFB',
                'sdetails'   => 'https://www.facebook.com',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'sname'      => 'siteTwitter',
                'sdetails'   => 'https://www.twitter.com',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'sname'      => 'siteLinkIn',
                'sdetails'   => 'www.linkin.com',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'sname'      => 'siteYT',
                'sdetails'   => 'www.yoytube.com',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'sname'      => 'siteInsta',
                'sdetails'   => 'www.instagram.com',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'sname'      => 'siteAus',
                'sdetails'   => 'About us 255 lenth',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'sname'      => 'siteGkey',
                'sdetails'   => '555555555555555555',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'sname'      => 'siteBkey',
                'sdetails'   => '55555555555555',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'sname'      => 'siteFkey',
                'sdetails'   => '4444444444444444',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'sname'      => 'siteGAKet',
                'sdetails'   => 'jdjjckkdlll',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'sname'      => 'siteLogo',
                'sdetails'   => 'ggggggggggg.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'sname'      => 'siteCover',
                'sdetails'   => 'aaaaaa.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $builder = $this->db->table('settings');

        foreach ($datas as $data) {
            $builder->insert($data);
        }
    }
}
