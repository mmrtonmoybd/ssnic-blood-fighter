<?= view('frontend/sidebarstyle') ?>
<aside  class="mob-hide sidebar col-md-4">
                  <div style="border:1px solid #DDD; border-top-left-radius: calc(0.25rem - 1px); box-shadow: 0 1px 12px 0 rgba(97, 44, 21, 0.14);
                     border-top-right-radius: calc(0.25rem - 1px); background:#fff;
                     ">
                     <img class="card-img-top" src="<?= base_url('photos/orange_background.webp') ?>" alt="LanceBN">
                     <div class="card-body text-center">
                        <img class="avatarx rounded-circle" src="<?= empty(user()->pphoto) ? base_url('photos/default_male.png') : base_url(user()->pphoto) ?>" alt="LanceBN">
                        <h4 class="card-title" style="font-size:1.2rem;"><?= esc(trim(trim(user()->firstname) . ' ' . trim(user()->lastname))) ?> (<font color="red"><b><?= $role ?></b></font>)</h4>
                        <p class="card-text"></p>
                        <div class="sidenavdiv"><a style="text-decoration:none;" class="list-group-item  sidenavlink" href="<?= route_to('dashboard') ?>"> <i class="fa fa-user"></i> আমার প্রোফাইল</a></div>
                        <div class="sidenavdiv"><a style="text-decoration:none;" class="list-group-item  sidenavlink" href="<?= route_to('profileupdate') ?>"> <i class="fa fa-edit"></i> ইডিট প্রোফাইল </a></div>
                        <div class="sidenavdiv"><a style="text-decoration:none;" class="list-group-item  sidenavlink" href="<?= route_to('lastDonup') ?>"> <i class="fa fa-edit"></i> ইডিট সর্বশেষ রক্তদান </a></div>
                        <div class="sidenavdiv"><a style="text-decoration:none;" class="list-group-item  sidenavlink" href="<?= route_to('passwordChange') ?>"> <i class="fa fa-edit"></i> পাসওয়ার্ড পরিবর্তন </a></div>
                        <?php if ($role === 'Admin' || $role === 'Super Admin') {
    ?>
                        <div class="sidenavdiv"><a style="text-decoration:none;" class="list-group-item  sidenavlink" href="<?= route_to('admin.dashboard') ?>"> <i class="fa fa-sign-out"></i> Admin Panel </a></div>
                        <?php
} ?>

                        <?php if ($role === 'Admin' || $role === 'Contributor' || $role === 'Super Admin') {
        ?>
                        <div class="sidenavdiv"><a style="text-decoration:none;" class="list-group-item  sidenavlink" href="<?= route_to('bloodrequest') ?>"> <i class="fa fa-sign-out"></i> Blood request </a></div>
                         <div class="sidenavdiv"><a style="text-decoration:none;" class="list-group-item  sidenavlink" href="<?= route_to('BloodManage') ?>"> <i class="fa fa-sign-out"></i> Blood managed </a></div>

                        <?php
    } ?>
                        <div class="sidenavdiv"><a style="text-decoration:none;" class="list-group-item  sidenavlink" href="<?= route_to('BloodDonate') ?>"> <i class="fa fa-sign-out"></i> Blood donate </a></div>
                        <div class="sidenavdiv"><a style="text-decoration:none;" class="list-group-item  sidenavlink" href="<?= base_url('logout') ?>"> <i class="fa fa-sign-out"></i> লগ আউট </a></div>
                     </div>
                  </div>
</aside>