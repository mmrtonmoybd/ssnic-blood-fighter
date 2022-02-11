<?= view('App\Admin\Main\_header') ?>
<?= view('App\Admin\Main\_sidebar') ?>

<main class="app-content">
    <?= $this->renderSection('main') ?>
</main>

<?= view('App\Admin\Main\_footer') ?>