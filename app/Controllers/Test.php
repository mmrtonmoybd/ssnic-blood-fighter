<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

/**
 * @internal
 */
final class Test extends BaseController
{
    public function index()
    {
        $time = Time::parse('90 days ago');
        echo $time->toDateString();
    }
}
