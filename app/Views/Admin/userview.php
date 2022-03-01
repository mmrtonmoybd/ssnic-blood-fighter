<?= $this->extend('App\Views\App\admin') ?>
<?= $this->section('main') ?>
<div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Show user</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href=""><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item"><a href="<?= base_url() ?>">User show</a></li>
        </ul>
      </div>



 <div class="row">
 <div class="col-md-12">
                              <br>
                              <?php

function getLastdonate($lastdon)
{
    //$lastdon = $user->lastdonate;

    if (null !== $lastdon) {
        return $lastdon;
    }
    echo 'Never donate yet';
}

                              ?>
                              <div class="tile">
            <div class="tile-body">
                Profile pic: <img class="app-sidebar__user-avatar" src="<?= empty($user->pphoto) ? base_url('photos/default_male.png') : base_url($user->pphoto) ?>" alt="User Image" width="100" height="100">
                <br>
                <br>
                 নামঃ <?= esc(trim(trim($user->firstname) . ' ' . trim($user->lastname))) ?><br>
                              ইমেইলঃ <?= esc($user->email) ?> <br>
                              Username:  <?= esc($user->username) ?> <br>
                              ফোন নাম্বারঃ <?= esc($user->phonenumber) ?> <br>
                              বাসার ঠিকানা: <?= esc($user->haddress) ?> <br>
                              শিক্ষা প্রতিষ্ঠান: <?= esc($user->institute) ?> <br>
                              ব্যাচ: <?= esc($user->batch) ?> <br>
                              রক্তের গ্রুপঃ <?= esc($user->bgroup) ?> <br>
                              <!----
                                 <a style="color:blue;"> </a>
                                 -->
                              সর্বশেষ রক্তদানের তারিখঃ  <?= esc(getLastdonate($user->lastdonate)) ?> <br>
                              লিঙ্গগত বৈশিষ্টঃ   <?= esc($user->gender) ?><br>
            </div>
          </div>

                           </div>
 </div>
 <?= $this->endSection() ?>