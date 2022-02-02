<nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #bb0a1e;">
    <a class="navbar-brand" href="#">SSNIC</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/') ?>">Home</a>
            </li>
            <?php if (service('authentication')->check()) { ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= route_to('dashboard') ?>">Profile</a>
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
        </ul>
    </div>
</nav>
