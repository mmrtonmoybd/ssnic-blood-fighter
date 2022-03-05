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
    }
}
