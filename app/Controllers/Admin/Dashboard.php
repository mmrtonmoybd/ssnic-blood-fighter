<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BloodRequest;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;

class Dashboard extends BaseController
{
    public function index()
    {
        $umodel  = new UserModel();
        $tucount = $umodel->countAllResults();

        $date      = Time::parse('90 days ago');
        $beforeday = $date->toDateString();
        $taucount  = $umodel->where('lastdonate <= ', $beforeday)
            ->orWhere('lastdonate', null)->countAllResults();

        $bmodel  = new BloodRequest();
        $tblreq  = $bmodel->countAllResults();
        $tablreq = $bmodel->where('status', false)->countAllResults();

        $blrmonthly = $bmodel->select('COUNT(id) as count, MONTHNAME(created_at) as monname')
            ->where("YEAR(created_at) = '" . date('Y') . "'")
            ->groupBy('MONTH(created_at)')->findAll();

        $uregmonthly = $umodel->select('COUNT(id) as count, MONTHNAME(created_at) as monname')
            ->where("YEAR(created_at) = '" . date('Y') . "'")
            ->groupBy('MONTH(created_at)')->findAll();

        $uregmonthly = $umodel->select("COUNT(id) as count, MONTHNAME(created_at) as monname")
                             ->where("YEAR(created_at) = '" . date('Y') . "'")
                             ->groupBy("MONTH(created_at)")->findAll();

        $bloodmday = $bmodel->where("WEEK(created_at) = '" . date('W') . "' AND YEAR(created_at) = '" . date('Y') . "'")->where('status', 'true')->countAllResults();
        $bloodunday = $bmodel->where("WEEK(created_at) = '" . date('W') . "' AND YEAR(created_at) = '" . date('Y') . "'")->where('status', 'false')->countAllResults();
        return view('Admin/dashboard', [
            'tucount'     => $tucount,
            'taucount'    => $taucount,
            'tblreq'      => $tblreq,
            'tablreq'     => $tablreq,
            'blrmonthly'  => $blrmonthly,
            'uregmonthly' => $uregmonthly,
            'bloodmday' => $bloodmday,
            'bloodunday' => $bloodunday,
        ]);
    }
}
