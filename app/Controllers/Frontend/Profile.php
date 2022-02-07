<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Profile extends BaseController
{
    private function getRole()
    {
        $authorize = $auth = service('authorization');
        $role      = '';
        if ($authorize->inGroup('admin', user_id())) {
            $role = 'Admin';
        } elseif ($authorize->inGroup('contributor', user_id())) {
            $role = 'Contributor';
        } else {
            $role = 'Donor';
        }

        return $role;
    }

    public function index()
    {
        //$user = new User();
        //var_dump(user()->firstname);

        return view('Frontend/dashboard', [
            'role' => $this->getRole(),
        ]);
    }

    public function updateShow()
    {
        return view('Frontend/profileupdate', [
            'role' => $this->getRole(),
        ]);
    }

    public function update()
    {
        $rules = [
            'firstname'   => 'required|alpha|max_length[255]',
            'lastname'    => 'required|alpha|max_length[255]',
            'phonenumber' => 'required|max_length[15]|numeric',
            'gender'      => 'required|in_list[Male,Female]',
            'institute'   => 'required|alpha_space|max_length[255]',
            'batch'       => 'required|max_length[70]|alpha_numeric_punct',
            'bgroup'      => 'required|in_list[A+,B+,AB+,O+,O-,A-,B-,AB-]',
            'haddress'    => 'required|string|max_length[255]',
        ];

        $photo = $this->request->getFile('photo');

        if ($this->request->getFile('photo')->isValid()) {
            $rules['photo'] = 'ext_in[photo,png,jpg,jpeg]|is_image[photo]|mime_in[photo,image/png,image/jpg,image/jpeg]';
        }

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new UserModel();

        if (! $model->userUpdate($this->request)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect('dashboard')->with('message', 'Profile update successfull');
    }

    public function showPasswordcng()
    {
        return view('Frontend/passwordcng', [
            'role' => $this->getRole(),
        ]);
    }

    public function passwordChng()
    {
        $rules = [
            'password'     => 'required|strong_password',
            'pass_confirm' => 'required|matches[password]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new UserModel();
        $user  = $model->where('id', user_id())
            ->first();

        $user->password = $this->request->getPost('password');

        if (! $model->save($user)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect('dashboard')->with('message', 'Password update successfull');
    }

    public function showLastdon()
    {
        return view('Frontend/lastdon', [
            'role' => $this->getRole(),
        ]);
    }

    public function lastDonup()
    {
        $rules = [
            'lastdon' => 'required|valid_date',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new UserModel();

        $data = [
            'lastdonate' => $this->request->getPost('lastdon'),
        ];

        if (! $model->update(user_id(), $data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect('dashboard')->with('message', 'Last blood donation update successfull');
    }
}
