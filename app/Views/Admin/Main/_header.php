<!DOCTYPE html>
<html lang="en">
  <head>
    <?= csrf_meta() ?>
    <?= $this->renderSection('pageSeo') ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('backend/css/main.css') ?>">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <?= $this->renderSection('pageStyles') ?>
  </head>

<body class="app sidebar-mini">
  <header class="app-header"><a class="app-header__logo" href="<?= route_to('admin.dashboard') ?>">
  <?php
$model = new App\Models\Setting();
$info = $model->first();
echo esc($info->siteName);
?></a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <?php
                                       $authorize = service('authorization');
                                       if ($authorize->inGroup('sadmin', user()->id)) {
                                           ?>
            <li><a class="dropdown-item" href="<?= base_url(route_to('admin.setting.index')) ?>"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
            <?php
                                       } ?>
            <li><a class="dropdown-item" href="<?= route_to('dashboard') ?>"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li><a class="dropdown-item" href="<?= base_url('logout') ?>"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>