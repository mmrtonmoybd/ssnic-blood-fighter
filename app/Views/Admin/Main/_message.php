<?php if (session()->has('message')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session('message') ?>
    </div>

<?php endif ?>

<?php if (session()->has('error')) : ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session('error') ?>
    </div>
<?php endif ?>

<?php if (session()->has('errors')) : ?>
	<ul class="alert alert-danger alert-dismissible fade show">
	<?php foreach (session('errors') as $error) : ?>
		<li><?= $error ?></li>
	<?php endforeach ?>
	</ul>
<?php endif ?>