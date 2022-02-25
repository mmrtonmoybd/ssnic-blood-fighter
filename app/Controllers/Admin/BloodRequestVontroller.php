<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BloodRequest;
use App\Models\UserModel;

class BloodRequestVontroller extends BaseController
{
    public function index()
    {
        $model = new BloodRequest();
        $get = $model->select('blood_requests.*, CONCAT(users.firstname, " ", users.lastname) AS fullname,
                              (SELECT CONCAT(usad.firstname, " ", usad.lastname) FROM users AS usad WHERE usad.id=blood_requests.donor) AS donorname,
                              (SELECT CONCAT(usam.firstname, " ", usam.lastname) FROM users AS usam WHERE usam.id=blood_requests.manage_by) AS managername')
                     ->join('users', 'users.id=blood_requests.user_id')
                     ->orderBy('blood_requests.id', 'desc')->findAll();
        return view('Admin/bloodrequest', [
            'bloodreqs' => $get,
        ]);
    }

    public function updateShow($id)
    {
        $model = new BloodRequest();
        $get = $model->find($id);
        $umodel = new UserModel();
        $usersa = $umodel->select('CONCAT(firstname, " ", lastname) AS fullname, id')->findAll();

        $usersc = $umodel->select('CONCAT(firstname, " ", lastname) AS fullname, users.id AS id')
                         ->join('auth_groups_users AS agu', 'agu.user_id=users.id')
                         ->join('auth_groups AS ag', 'agu.group_id=ag.id')
                         ->where('ag.name', 'contributor')->findAll();
        return view('Admin/bloodrequp', [
            'bloodreq' => $get,
            'users' => $usersa,
            'cusers' => $usersc,
        ]);
    }

    public function update($id)
    {
        $model = new BloodRequest();
        $rules = [
            'bgroup' => 'required|in_list[A+,B+,AB+,O+,O-,A-,B-,AB-]',
            'donateplace' => 'required|string|max_length[255]',
            'refarence' => 'required|string|max_length[255]',
            'donor' => 'required',
            'manage' => 'required',
            'details' => 'required|string',
            'status' => 'required|in_list[true,false]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new BloodRequest();

        $data = [
            'bgroup' => $this->request->getPost('bgroup'),
            'donateplace' => $this->request->getPost('donateplace'),
            'refarence' => $this->request->getPost('refarence'),
            'donor' => (is_numeric($this->request->getPost('donor'))) ? $this->request->getPost('donor') : null,
            'manage_by' =>  (is_numeric($this->request->getPost('manage'))) ? $this->request->getPost('manage') : null,
            'details' => $this->request->getPost('details'),
            'status' => $this->request->getPost('status')
        ];

        if (! $model->update($id, $data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->route('admin.blood.request')->with('message', 'Blood request update successfull');
    }

    public function addShow()
    {
        //
    }
}
