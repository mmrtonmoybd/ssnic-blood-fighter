<?= $this->extend($config->viewLayout) ?>
<?= $this->section('pageSeo') ?>
<?= view('frontend/mseo') ?>
<?php
$model = new App\Models\Seo();
$seo   = $model->where('sslug', 'login')->first();
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
				<h2 class="card-header"><?=lang('Auth.loginTitle')?></h2>
				<div class="card-body">

					<?= view('App\Auth\_message_block') ?>

					<form action="<?= route_to('login') ?>" method="post">
						<?= csrf_field() ?>

<?php if ($config->validFields === ['email']): ?>
						<div class="form-group">
							<label for="login"><?=lang('Auth.email')?></label>
							<input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
								   name="login" placeholder="<?=lang('Auth.email')?>">
							<div class="invalid-feedback">
								<?= session('errors.login') ?>
							</div>
						</div>
<?php else: ?>
						<div class="form-group">
							<label for="login"><?=lang('Auth.emailOrUsername')?></label>
							<input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
								   name="login" placeholder="<?=lang('Auth.emailOrUsername')?>">
							<div class="invalid-feedback">
								<?= session('errors.login') ?>
							</div>
						</div>
<?php endif; ?>

						<div class="form-group">
							<label for="password"><?=lang('Auth.password')?></label>
							<input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>">
							<div class="invalid-feedback">
								<?= session('errors.password') ?>
							</div>
						</div>

<?php if ($config->allowRemembering): ?>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
								<?=lang('Auth.rememberMe')?>
							</label>
						</div>
<?php endif; ?>

						<br>

						<button type="submit" style="color: white;" class="btn btn-block danger-color"><?=lang('Auth.loginAction')?></button>
					</form>

					<hr>

<?php if ($config->allowRegistration) : ?>
					<p><a href="<?= route_to('register') ?>"><?=lang('Auth.needAnAccount')?></a></p>
<?php endif; ?>
<?php if ($config->activeResetter): ?>
					<p><a href="<?= route_to('forgot') ?>"><?=lang('Auth.forgotYourPassword')?></a></p>
<?php endif; ?>
				</div>
			</div>

		</div>
	</div>
</div>

<?= $this->endSection() ?>
