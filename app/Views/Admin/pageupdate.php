<?= $this->extend('App\Views\App\admin') ?>
<?= $this->section('pageStyles') ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
<?= $this->endSection() ?>
<?= $this->section('main') ?>
<div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Update page</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href=""><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item">Page</li>
          <li class="breadcrumb-item"><a href="<?= base_url(route_to('admin.page.update', $page->id)) ?>">Update page</a></li>
        </ul>
      </div>

	  <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-12">
              <?= view('App\Admin\Main\_message') ?>

                <form action="<?= base_url(route_to('admin.page.update', $page->id)) ?>" method="POST">
                <?= csrf_field() ?>
                <div class="form-group">
                            <label for="phonenumber">Slug</label>
                            <input type="text" class="form-control " placeholder="page-name" value="<?= esc($page->slug) ?>" name="slug">

                        </div>
                        <div class="form-group">
                            <label for="phonenumber">Page name</label>
                            <input type="text" class="form-control " placeholder="Page name" value="<?= esc($page->pname) ?>" name="pname">

                        </div>
                        <div class="form-group">
                            <label for="phonenumber">Page seo title</label>
                            <input type="text" class="form-control " placeholder="Page title" value="<?= esc($page->seot) ?>" name="seot">

                        </div>
                         <div class="form-group">
                            <label for="haddress">Page seo Decription</label>
                            <textarea type="text" class="form-control"  placeholder="Page seo title" name="seod"><?= esc($page->seod) ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="phonenumber">Page seo keyword</label>
                            <input type="text" class="form-control " placeholder="Page keyword" name="seok" value="<?= esc($page->seok) ?>">

                        </div>

                    <div class="form-group">
                            <label for="haddress">Page content</label>
                            <textarea type="text" class="form-control" id="summernote" rows="5" placeholder="Blood donation details" name="pcontent"><?= esc($page->pcontent) ?></textarea>
                             <script>
               new SimpleMDE({
		element: document.getElementById("summernote"),
		spellChecker: false,
	});
</script>
                        </div>

					  <div class="tile-footer">
              <button class="btn btn-primary" type="submit">Save</button>
            </div>
                </form>
              </div>
            </div>


          </div>
        </div>
      </div>
<?= $this->endSection() ?>