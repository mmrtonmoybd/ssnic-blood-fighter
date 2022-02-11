<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserSector extends BaseController
{
    public function index()
    {
        $users = new UserModel();
        return view('admin/users', [
            'users' => $users->findAll(),
        ]);
    }
}
