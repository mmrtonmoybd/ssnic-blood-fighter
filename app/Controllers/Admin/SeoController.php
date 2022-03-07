<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Seo;
use CodeIgniter\Exceptions\PageNotFoundException;

class SeoController extends BaseController
{
    public function index()
    {
        $model = new Seo();
        $get = $model->findAll();

        return view('Admin/seo', [
            'datas' => $get,
        ]);
    }

    public function show($id)
    {
        $model = new Seo();
        $get = $model->find($id);

        if (null === $get) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('Admin/seoupdate', [
            'page' => $get,
        ]);
    }

    public function update($id)
    {
        $model = new Seo();
        $get   = $model->find($id);

        if (null === $get) {
            throw PageNotFoundException::forPageNotFound();
        }

        $rules = [
            'seot' => 'required|string',
            'seod' => 'required|string',
            'seok' => 'required|string',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'stitle' => $this->request->getPost('seot'),
            'sdetails' => $this->request->getPost('seod'),
            'skey' => $this->request->getPost('seok'),
        ];

        if (!$model->update($id, $data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors()); 
        }
        return redirect()->route('admin.seo.index')->with('message', 'Seo update successfull');
    }
}
