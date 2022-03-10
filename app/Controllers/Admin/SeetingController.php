<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Setting;

class SeetingController extends BaseController
{
    public function index()
    {
        $model = new Setting();
        $get   = $model->first();

        return view('Admin/settings', [
            'setting' => $get,
        ]);
    }

    public function update()
    {
        $rules = [
            'siteName'    => 'required|alpha_space|max_length[30]',
            'siteEmail'   => 'required|valid_email|max_length[100]',
            'sitePhone'   => 'required|numeric|max_length[15]',
            'siteAddress' => 'required|string|max_length[255]',
            'siteFB'      => 'required|valid_url|max_length[100]',
            'siteTwitter' => 'required|valid_url|max_length[100]',
            'siteLinkIn'  => 'required|valid_url|max_length[100]',
            'siteYT'      => 'required|valid_url|max_length[100]',
            'siteInsta'   => 'required|valid_url|max_length[100]',
            'siteAus'     => 'required|string|max_length[255]',
            'siteGkey'    => 'required|alpha_numeric_punct|max_length[255]',
            'siteBkey'    => 'required|alpha_numeric_punct|max_length[255]',
            'siteFkey'    => 'required|alpha_numeric_punct|max_length[255]',
            'siteGAKet'   => 'required|alpha_numeric_punct|max_length[255]',
            'siteFName'   => 'required|alpha_space|max_length[255]',
        ];
        $photo = $this->request->getFile('photo');

        if ($this->request->getFile('photo')->isValid()) {
            $rules['photo'] = 'ext_in[photo,png,jpg,jpeg]|is_image[photo]|mime_in[photo,image/png,image/jpg,image/jpeg]|max_size[photo,5120]|max_dims[photo,1200,630]';
        }

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'siteName'    => $this->request->getPost('siteName'),
            'siteEmail'   => $this->request->getPost('siteEmail'),
            'sitePhone'   => $this->request->getPost('sitePhone'),
            'siteAddress' => $this->request->getPost('siteAddress'),
            'siteFB'      => $this->request->getPost('siteFB'),
            'siteTwitter' => $this->request->getPost('siteTwitter'),
            'siteLinkIn'  => $this->request->getPost('siteLinkIn'),
            'siteYT'      => $this->request->getPost('siteYT'),
            'siteInsta'   => $this->request->getPost('siteInsta'),
            'siteAus'     => $this->request->getPost('siteAus'),
            'siteGkey'    => $this->request->getPost('siteGkey'),
            'siteBkey'    => $this->request->getPost('siteBkey'),
            'siteFkey'    => $this->request->getPost('siteFkey'),
            'siteGAKet'   => $this->request->getPost('siteGAKet'),
            'siteFName' => $this->request->getPost('siteFName'),
        ];

        if ($this->request->getFile('photo')->isValid() && ! $photo->hasMoved()) {
            $randomName = $photo->getRandomName();
            if ($photo->move(FCPATH . 'photos', $randomName)) {
                $data['siteCover'] = 'photos/' . $randomName;
            }
        }

        $model = new Setting();
        $first = $model->first();

        if (! $model->update($first->id, $data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->route('admin.setting.index')->with('message', 'Setting update successfull');
    }
}
