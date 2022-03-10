<nav class="mb-1 navbar navbar-expand-lg navbar-dark danger-color">
    <?php
$model = new App\Models\Setting();
$info  = $model->first();
?>
    <a class="navbar-brand" href="#"><?= esc($info->siteName) ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/') ?>">Home</a>
            </li>
            <?php $authenticate = service('authentication');
      $authorization            = service('authorization');
            ?>
            <?php if (service('authentication')->check()) { ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= route_to('dashboard') ?>">Dashboard</a>
            </li>
            <?php if ($authorization->inGroup('admin', $authenticate->id()) || $authorization->inGroup('sadmin', $authenticate->id())) { ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= route_to('admin.dashboard') ?>">Admin Panel</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= route_to('bloodrequest') ?>">Add blood req</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= route_to('BloodManage') ?>">Blood managed</a>
            </li>
            <?php } elseif ($authorization->inGroup('contributor', $authenticate->id())) { ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= route_to('bloodrequest') ?>">Add blood req</a>
            </li>
             <li class="nav-item">
                <a class="nav-link" href="<?= route_to('BloodManage') ?>">Blood managed</a>
            </li>
            <?php } ?>
             <li class="nav-item">
                <a class="nav-link" href="<?= route_to('BloodDonate') ?>">Blood donated</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('logout') ?>">Logout</a>
            </li>
            <?php } else { ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('register') ?>">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('login') ?>">Login</a>
            </li>
                <?php } ?>

            <li class="nav-item">
                <a class="nav-link" href="<?= route_to('page', 1) ?>">About us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= route_to('page', 2) ?>">Contact us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= route_to('page', 3) ?>">Why donate blood</a>
            </li>
        </ul>
    </div>
</nav>
