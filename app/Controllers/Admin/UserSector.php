<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Myth\Auth\Exceptions\UserNotFoundException;
use App\Exceptions\CurrentUserIsAdmin;
use Config\Database;

class UserSector extends BaseController
{
    public function index()
    {
        $users = new UserModel();

        return view('Admin/users', [
            'users' => $users->findAll(),
        ]);
    }

    public function updateShow($id)
    {
        $model = new UserModel();
        $user = $model->find($id);

        $authorize = service('authorization');
//var_dump($id);
        if (!$user) {
           // throw UserNotFoundException::forUserID($id);
        } elseif (user()->id == $id) {
           // throw CurrentUserIsAdmin::forAdmin();
        }

        return view('Admin/userupdate', [
            'user' => $user,
            'authorize' => $authorize,
        ]);
    }

    public function update($id)
    {
        $model = new UserModel();
        $user = $model->find($id);
        $authorize = service('authorization');

        if (!$user) {
            throw UserNotFoundException::forUserID($id);
        } elseif (user()->id == $id) {
            throw CurrentUserIsAdmin::forAdmin();
        }

        $rules = [
            'firstname' => 'required|alpha|max_length[255]',
            'lastname' => 'required|alpha|max_length[255]', 
            'status' => 'required|in_list[banned,unbanned]',
            'role' => 'required|in_list[donor,contributor,admin]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $status = ($this->request->getPost('status') === 'banned') ? 'banned' : '';

        $data = [
            'firstname' => $this->request->getPost('firstname'),
            'lastname' => $this->request->getPost('lastname'),
            'status' => $status,
        ];

        if (!$authorize->inGroup($this->request->getPost('role'), $user->id)) {
            $db = Database::connect();
            $db->table('auth_groups_users')->where('user_id', $user->id)->delete();
            
            $authorize->addUserToGroup($user->id, $this->request->getPost('role'));
        
            
        }

        if (!$model->update($id, $data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->route('admin.users')->with('message', 'User update successfull');
    }

    public function delete($id)
    {
        $model = new UserModel();
        $user = $model->find($id);

        if (!$user) {
            throw UserNotFoundException::forUserID($id);
        } elseif (user()->id == $id) {
            throw CurrentUserIsAdmin::forAdmin();
        }

        if ($model->delete($id)) {
            return redirect()->route('admin.users')->with('message', 'User delete successfull');
        }

        return redirect()->route('admin.users')->with('error', 'User delete unsuccessfull');
    }

    public function viewUser($id)
    {
        $model = new UserModel();
        $user = $model->find($id);

        if (!$user) {
            throw UserNotFoundException::forUserID($id);
        } elseif (user()->id == $id) {
            throw CurrentUserIsAdmin::forAdmin();
        }

        return view('Admin/userview', [
            'user' => $user,
        ]);
    }
}
