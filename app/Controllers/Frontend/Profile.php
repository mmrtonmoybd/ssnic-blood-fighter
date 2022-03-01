<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\BloodRequest;
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

        $model  = new BloodRequest();
        $dcount = $model->where('donor', user()->id)->countAllResults();
        $mcount = $model->where('manage_by', user()->id)->countAllResults();

        return view('frontend/dashboard', [
            'role'   => $this->getRole(),
            'dcount' => $dcount,
            'mcount' => $mcount,
        ]);
    }

    public function updateShow()
    {
        return view('frontend/profileupdate', [
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
        return view('frontend/passwordcng', [
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
        return view('frontend/lastdon', [
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

    public function showBloodRequest()
    {
        return view('frontend/bloodrequest', [
            'role' => $this->getRole(),
        ]);
    }

    public function attempBloodRequest()
    {
        $rules = [
            'bgroup'      => 'required|in_list[A+,B+,AB+,O+,O-,A-,B-,AB-]',
            'donateplace' => 'required|string|max_length[255]',
            'refarence'   => 'required|string|max_length[255]',
            'details'     => 'required|string',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new BloodRequest();

        $data = [
            'bgroup'      => $this->request->getPost('bgroup'),
            'donateplace' => $this->request->getPost('donateplace'),
            'refarence'   => $this->request->getPost('refarence'),
            'details'     => $this->request->getPost('details'),
            'user_id'     => user()->id,
        ];

        if (! $model->insert($data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect('dashboard')->with('message', 'Blood request added successfull');
    }

    public function manage()
    {
        $model = new BloodRequest();
        $get   = $model->select('blood_requests.*,
                (SELECT CONCAT(users.firstname, " ", users.lastname) FROM users WHERE users.id=blood_requests.donor) AS dname')
            ->join('users', 'manage_by=users.id')
            ->where('manage_by', user()->id)->where('blood_requests.status', 'true')
            ->orderBy('blood_requests.id', 'desc')
            ->findAll();

        return view('frontend/manage', [
            'role'  => $this->getRole(),
            'datas' => $get,
        ]);
    }

    public function donate()
    {
        $model = new BloodRequest();
        $get   = $model->select('blood_requests.*,
                (SELECT CONCAT(users.firstname, " ", users.lastname) FROM users WHERE users.id=blood_requests.manage_by) AS mname')
            ->join('users', 'donor=users.id')
            ->where('donor', user()->id)->where('blood_requests.status', 'true')
            ->orderBy('blood_requests.id', 'desc')
            ->findAll();

        return view('frontend/donor', [
            'role'  => $this->getRole(),
            'datas' => $get,
        ]);
    }
}
