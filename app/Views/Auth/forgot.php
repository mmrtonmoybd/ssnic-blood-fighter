<?= $this->extend($config->viewLayout) ?>
<?= $this->section('pageSeo') ?>
<?= view('frontend/mseo') ?>
<?php
$model = new App\Models\Seo();
$seo = $model->where('sslug', 'forget')->first();
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
                <h2 class="card-header"><?=lang('Auth.forgotPassword')?></h2>
                <div class="card-body">

                    <?= view('App\Auth\_message_block') ?>

                    <p><?=lang('Auth.enterEmailForInstructions')?></p>

                    <form action="<?= route_to('forgot') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="form-group">
                            <label for="email"><?=lang('Auth.emailAddress')?></label>
                            <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                                   name="email" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>">
                            <div class="invalid-feedback">
                                <?= session('errors.email') ?>
                            </div>
                        </div>

                        <br>

                        <button type="submit" style="color: white;" class="btn btn-block danger-color"><?=lang('Auth.sendInstructions')?></button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>
