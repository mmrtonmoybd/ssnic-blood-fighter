<?= $this->extend($config->viewLayout) ?>
<?= $this->section('pageSeo') ?>
<?= view('frontend/mseo') ?>
<?php
$model = new App\Models\Seo();
$seo = $model->where('sslug', 'reset')->first();
?>
<title><?= esc($seo->stitle) ?></title>
<meta name="description" content="<?= esc($seo->sdetails) ?>" />
<meta name="keywords" content="<?= esc($seo->skey) ?>" />

<meta property="og:title" content="<?= esc($seo->stitle) ?>" />
<meta property="og:description" content="<?= esc($seo->sdetails) ?>" />
<?= $this->endSection() ?>
<?= $this->section('main') ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            <div class="card">
                <h2 class="card-header"><?=lang('Auth.resetYourPassword')?></h2>
                <div class="card-body">

                    <?= view('App\Auth\_message_block') ?>

                    <p><?=lang('Auth.enterCodeEmailPassword')?></p>

                    <form action="<?= route_to('reset-password') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="form-group">
                            <label for="token"><?=lang('Auth.token')?></label>
                            <input type="text" class="form-control <?php if (session('errors.token')) : ?>is-invalid<?php endif ?>"
                                   name="token" placeholder="<?=lang('Auth.token')?>" value="<?= old('token', $token ?? '') ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.token') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email"><?=lang('Auth.email')?></label>
                            <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                                   name="email" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.email') ?>
                            </div>
                        </div>

                        <br>

                        <div class="form-group">
                            <label for="password"><?=lang('Auth.newPassword')?></label>
                            <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                                   name="password">
                            <div class="invalid-feedback">
                                <?= session('errors.password') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pass_confirm"><?=lang('Auth.newPasswordRepeat')?></label>
                            <input type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>"
                                   name="pass_confirm">
                            <div class="invalid-feedback">
                                <?= session('errors.pass_confirm') ?>
                            </div>
                        </div>

                        <br>

                        <button type="submit" style="color: white;" class="btn btn-block danger-color"><?=lang('Auth.resetPassword')?></button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>
