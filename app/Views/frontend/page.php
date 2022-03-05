<?= $this->extend('App\Views\App\layout') ?>
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