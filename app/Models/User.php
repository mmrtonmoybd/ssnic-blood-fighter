<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    private function getLogedid()
    {
        helper('auth');

        return user_id();
    }

    public function getSingleData($field, $value)
    {
        //$user = new User();

        return $this->where($field, $value)->find();
    }

    public function getName()
    {
        helper('auth');

        return trim(trim(user()->firstname) . ' ' . trim(user()->lastname));
    }

    public function getBGroup()
    {
        helper('auth');

        return user()->bgroup;
    }

    public function getEmail()
    {
        helper('auth');

        return user()->email;
    }

    public function getLastdonate()
    {
        helper('auth');
        $lastdon = user()->lastdonate;

        if ($lastdon !== '0000-00-00 00:00:00.000000') {
            return $lastdon;
        }
        echo 'Never donate yet';
    }

    public function getGender()
    {
        helper('auth');

        return user()->gender;
    }

    public function getNumber()
    {
        helper('auth');

        return user()->phonenumber;
    }
}
