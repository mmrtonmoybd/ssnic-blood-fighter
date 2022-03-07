<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Page;
use CodeIgniter\Exceptions\PageNotFoundException;

class PageController extends BaseController
{
    public function index()
    {
        $model = new Page();
        $get   = $model->findAll();

        return view('Admin/page', [
            'datas' => $get,
        ]);
    }

    public function show($id)
    {
        $model = new Page();
        $get   = $model->find($id);

        if (null === $get) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('Admin/pageupdate', [
            'page' => $get,
        ]);
    }

    public function update($id)
    {
        $model = new Page();
        $get   = $model->find($id);

        if (null === $get) {
            throw PageNotFoundException::forPageNotFound();
        }

        $rules = [
            'pname' => 'required|string',
            'seot' => 'required|string',
            'seod' => 'required|string',
            'seok' => 'required|string',
            'pcontent' => 'required|string',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'pname' => $this->request->getPost('pname'),
            'seot' => $this->request->getPost('seot'),
            'seod' => $this->request->getPost('seod'),
            'seok' => $this->request->getPost('seok'),
            'pcontent' => $this->request->getPost('pcontent'),
        ];

        if (!$model->update($id, $data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors()); 
        }
        return redirect()->route('admin.page.index')->with('message', 'Page update successfull');
    }
}
