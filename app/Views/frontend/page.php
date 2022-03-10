<?= $this->extend('App\Views\App\layout') ?>
<?= $this->section('pageSeo') ?>
<?= view('frontend/mseo') ?>

<title><?= esc($pdata->seot) ?></title>
<meta name="description" content="<?= esc($pdata->seod) ?>" />
<meta name="keywords" content="<?= esc($pdata->seok) ?>" />

<meta property="og:title" content="<?= esc($pdata->seot) ?>" />
<meta property="og:description" content="<?= esc($pdata->seod) ?>" />
<?= $this->endSection() ?>
<?= $this->section('main') ?>
<div  class="container container">
    <center><h1 style="color:red;"><?= $pdata->pname ?></h1></center>

    <div style="padding:20px;">
<?php

                              use League\CommonMark\CommonMarkConverter;

$converter = new CommonMarkConverter([
    'html_input'         => 'strip',
    'allow_unsafe_links' => false,
]);

echo $converter->convert($pdata->pname);
?>
</div>
</div>

<?= $this->endSection() ?>