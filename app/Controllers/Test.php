<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;

class Test extends BaseController
{
    public function index()
    {
        $time = Time::parse('90 days ago');
        echo $time->toDateString();

    }
}
