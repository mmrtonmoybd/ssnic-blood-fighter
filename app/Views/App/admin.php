<?= view('App\Admin\_header') ?>
<?= view('App\Admin\_sidebar') ?>

<main class="app-content">
    <?= $this->renderSection('main') ?>
</main>

<?= view('App\Admin\_footer') ?>