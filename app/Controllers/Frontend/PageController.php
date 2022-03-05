<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\Page;

class PageController extends BaseController
{
    public function index($id)
    {
        $model = new Page();
        $get   = $model->find($id);

        if (null === $get) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('frontend/page', [
            'pdata' => $get,
        ]);
    }
}
