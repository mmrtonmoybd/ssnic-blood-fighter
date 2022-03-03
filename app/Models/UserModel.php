<?php

namespace App\Models;

use CodeIgniter\HTTP\Request;
use CodeIgniter\Model;
use Myth\Auth\Authorization\GroupModel;
use Myth\Auth\Entities\User;

class UserModel extends Model
{
    protected $table          = 'users';
    protected $primaryKey     = 'id';
    protected $returnType     = User::class;
    protected $useSoftDeletes = false;
    protected $allowedFields  = [
        'email', 'username', 'password_hash', 'reset_hash', 'reset_at', 'reset_expires', 'activate_hash',
        'status', 'status_message', 'active', 'force_pass_reset', 'permissions', 'deleted_at',
        'firstname', 'lastname', 'phonenumber', 'gender', 'institute', 'batch', 'bgroup', 'haddress', 'lastdonate', 'pphoto', 'city',
    ];
    protected $useTimestamps   = true;
    protected $validationRules = [
        'email'         => 'required|valid_email|is_unique[users.email,id,{id}]',
        'username'      => 'required|alpha_numeric_punct|min_length[3]|max_length[30]|is_unique[users.username,id,{id}]',
        'password_hash' => 'required',
        'firstname'     => 'required|alpha|max_length[255]',
        'lastname'      => 'required|alpha|max_length[255]',
        'phonenumber'   => 'required|max_length[15]|numeric',
        'gender'        => 'required|in_list[Male,Female]',
        'institute'     => 'required|alpha_space|max_length[255]',
        'batch'         => 'required|max_length[70]|alpha_numeric_punct',
        'bgroup'        => 'required|in_list[A+,B+,AB+,O+,O-,A-,B-,AB-]',
        'haddress'      => 'required|string|max_length[255]',
        'city' => 'required|in_list[Bagerhat,Bandarban,Barguna,Barisal,Bhola,Bogura,Brahmanbaria,Chandpur,Chattogram,Chuadanga,Coxs Bazar,Cumilla,Dhaka,Dinajpur,Faridpur,Feni,Gaibandha,Gazipur,Gopalganj,Habiganj,Jamalpur,Jashore,Jhalokati,Jhenaidah,Joypurhat,Khagrachhari,Khulna,Kishoreganj,Kurigram,Kushtia,Lakshmipur,Lalmonirhat,Madaripur,Magura,Manikganj,Meherpur,Moulvibazar,Munshiganj,Mymensingh,Naogaon,Narail,Narayanganj,Narsingdi,Natore,Nawabganj,Netrakona,Netrakona,Noakhali,Pabna,Panchagarh,Patuakhali,Pirojpur,Rajbari,Rajshahi,Rangamati,Rangpur,Satkhira,Shariatpur,Sherpur,Sirajganj,Sunamganj,Sylhet,Tangail,Thakurgaon]',
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    protected $afterInsert        = ['addToGroup'];
    //protected $beforeInsert       = ['LasdateCon'];

    /**
     * The id of a group to assign.
     * Set internally by withGroup.
     *
     * @var int|null
     */
    protected $assignGroup;

    /**
     * Logs a password reset attempt for posterity sake.
     */
    public function logResetAttempt(string $email, ?string $token = null, ?string $ipAddress = null, ?string $userAgent = null)
    {
        $this->db->table('auth_reset_attempts')->insert([
            'email'      => $email,
            'ip_address' => $ipAddress,
            'user_agent' => $userAgent,
            'token'      => $token,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }

    /**
     * Logs an activation attempt for posterity sake.
     */
    public function logActivationAttempt(?string $token = null, ?string $ipAddress = null, ?string $userAgent = null)
    {
        $this->db->table('auth_activation_attempts')->insert([
            'ip_address' => $ipAddress,
            'user_agent' => $userAgent,
            'token'      => $token,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }

    /**
     * Sets the group to assign any users created.
     *
     * @return $this
     */
    public function withGroup(string $groupName)
    {
        $group = $this->db->table('auth_groups')->where('name', $groupName)->get()->getFirstRow();

        $this->assignGroup = $group->id;

        return $this;
    }

    /**
     * Clears the group to assign to newly created users.
     *
     * @return $this
     */
    public function clearGroup()
    {
        $this->assignGroup = null;

        return $this;
    }

    /**
     * If a default role is assigned in Config\Auth, will
     * add this user to that group. Will do nothing
     * if the group cannot be found.
     *
     * @param mixed $data
     *
     * @return mixed
     */
    protected function addToGroup($data)
    {
        if (is_numeric($this->assignGroup)) {
            $groupModel = model(GroupModel::class);
            $groupModel->addUserToGroup($data['id'], $this->assignGroup);
        }

        return $data;
    }

    public function userUpdate(Request $request)
    {
        $data = [
            'firstname'   => $request->getPost('firstname'),
            'lastname'    => $request->getPost('lastname'),
            'phonenumber' => $request->getPost('phonenumber'),
            'gender'      => $request->getPost('gender'),
            'institute'   => $request->getPost('institute'),
            'batch'       => $request->getPost('batch'),
            'bgroup'      => $request->getPost('bgroup'),
            'haddress'    => $request->getPost('haddress'),
            'city' => $request->getPost('city'),
        ];
        $photo = $request->getFile('photo');
        if ($request->getFile('photo')->isValid() && ! $photo->hasMoved()) {
            $randomName = $photo->getRandomName();
            if ($photo->move(FCPATH . 'photos', $randomName)) {
                $data['pphoto'] = 'photos/' . $randomName;
            }
        }

        return $this->update(user_id(), $data);
    }
}
