<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeetingSeeder extends Seeder
{
    public function run()
    {
        $datas = [
            [
                'siteName'    => 'BWS',
                'siteEmail'   => 'admin@ssnic.com',
                'sitePhone'   => '01936559057',
                'siteAddress' => 'Mymensingh',
                'siteFB'      => 'www.fb.com',
                'siteTwitter' => 'www.tw.com',
                'siteLinkIn'  => 'www.ln.com',
                'siteYT'      => 'www.yt.com',
                'siteInsta'   => 'www.insta.com',
                'siteAus'     => 'About me',
                'siteGkey'    => 'gggggggg',
                'siteBkey'    => 'bbbbbb',
                'siteFkey'    => 'ffffffffff',
                'siteGAKet'   => 'gggggggg',
                'siteCover'   => 'hhhh.jpg',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
        ];

        $builder = $this->db->table('settings');

        foreach ($datas as $data) {
            $builder->insert($data);
        }
    }
}
