<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Exceptions\CurrentUserIsAdmin;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;
use Config\Database;
use Myth\Auth\Exceptions\UserNotFoundException;

class UserSector extends BaseController
{
    public function index()
    {
        $users = new UserModel();
        $get   = $users
            ->select('users.*,
               (SELECT COUNT(*) FROM blood_requests as blr WHERE users.id=blr.donor) AS dcount,
               (SELECT COUNT(*) FROM blood_requests as blr WHERE users.id=blr.manage_by) AS mcount')
            ->where('users.status', null)->findAll();

        return view('Admin/users', [
            'users' => $get,
        ]);
    }

    public function updateShow($id)
    {
        $model = new UserModel();
        $user  = $model->find($id);

        $authorize = service('authorization');

        if (! $user) {
            throw UserNotFoundException::forUserID($id);
        }
        if (user()->id === $id) {
            throw new CurrentUserIsAdmin('Admin can not update or delete own account');
        }

        if (($authorize->inGroup('admin', user()->id)) && ($authorize->inGroup('sadmin', $id))) {
            throw new CurrentUserIsAdmin('Admin can not update or delete Super Admin');
        }

        return view('Admin/userupdate', [
            'user'      => $user,
            'authorize' => $authorize,
        ]);
    }

    public function update($id)
    {
        $model     = new UserModel();
        $user      = $model->find($id);
        $authorize = service('authorization');

        if (! $user) {
            throw UserNotFoundException::forUserID($id);
        }
        if (user()->id === $id) {
            throw new CurrentUserIsAdmin('Admin can not update or delete own account');
        }

        if (($authorize->inGroup('admin', user()->id)) && ($authorize->inGroup('sadmin', $id))) {
            throw new CurrentUserIsAdmin('Admin can not update or delete Super Admin');
        }

        $rules = [
            'firstname' => 'required|alpha|max_length[255]',
            'lastname'  => 'required|alpha|max_length[255]',
            'status'    => 'required|in_list[banned,unbanned]',
            'role'      => 'required|in_list[donor,contributor,admin,sadmin]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if (($authorize->inGroup('admin', user()->id)) && ($this->request->getPost('role') === 'sadmin')) {
            throw new CurrentUserIsAdmin('Admin can not give Super Admin permition.');
        }

        $status = ($this->request->getPost('status') === 'banned') ? 'banned' : null;

        $data = [
            'firstname' => $this->request->getPost('firstname'),
            'lastname'  => $this->request->getPost('lastname'),
            'status'    => $status,
        ];

        if (! $authorize->inGroup($this->request->getPost('role'), $user->id)) {
            $db = Database::connect();
            $db->table('auth_groups_users')->where('user_id', $user->id)->delete();

            $authorize->addUserToGroup($user->id, $this->request->getPost('role'));
        }

        if (! $model->update($id, $data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->route('admin.users')->with('message', 'User update successfull');
    }

    public function delete($id)
    {
        $model     = new UserModel();
        $user      = $model->find($id);
        $authorize = service('authorization');

        if (! $user) {
            throw UserNotFoundException::forUserID($id);
        }
        if (user()->id === $id) {
            throw new CurrentUserIsAdmin('Admin can not update or delete own account');
        }

        if (($authorize->inGroup('admin', user()->id)) && ($authorize->inGroup('sadmin', $id))) {
            throw new CurrentUserIsAdmin('Admin can not update or delete Super Admin');
        }

        if ($model->delete($id)) {
            return redirect()->route('admin.users')->with('message', 'User delete successfull');
        }

        return redirect()->route('admin.users')->with('error', 'User delete unsuccessfull');
    }

    public function viewUser($id)
    {
        $model = new UserModel();
        $user  = $model->find($id);

        if (! $user) {
            throw UserNotFoundException::forUserID($id);
        }

        return view('Admin/userview', [
            'user' => $user,
        ]);
    }

    public function adminUsers()
    {
        $model  = new UserModel();
        $admins = $model->select('users.*')
            ->join('auth_groups_users AS agu', 'agu.user_id=users.id')
            ->join('auth_groups AS ag', 'ag.id=agu.group_id')
            ->where('ag.name', 'admin')->findAll();

        return view('Admin/adminusers', [
            'users' => $admins,
        ]);
    }

    public function banList()
    {
        $model    = new UserModel();
        $banusers = $model->select('users.*,
               (SELECT COUNT(*) FROM blood_requests as blr WHERE users.id=blr.donor) AS dcount,
               (SELECT COUNT(*) FROM blood_requests as blr WHERE users.id=blr.manage_by) AS mcount')->where('status', 'banned')->findAll();

        return view('Admin/banusers', [
            'users' => $banusers,
        ]);
    }

    public function avilableDonors()
    {
        $model     = new UserModel();
        $date      = Time::parse('90 days ago');
        $beforeday = $date->toDateString();

        $getdonors = $model->select('users.*,
               (SELECT COUNT(*) FROM blood_requests as blr WHERE users.id=blr.donor) AS dcount,
               (SELECT COUNT(*) FROM blood_requests as blr WHERE users.id=blr.manage_by) AS mcount')
            ->where('lastdonate <= ', $beforeday)
            ->orWhere('lastdonate', null)
            ->where('status', null)->findAll();

        return view('Admin/activedonors', [
            'users' => $getdonors,
        ]);
    }
}
