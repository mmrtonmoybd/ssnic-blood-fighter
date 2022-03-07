<?= $this->extend('App\Views\App\admin') ?>
<?= $this->section('main') ?>
<div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> <?= $page->sslug ?> Update seo</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href=""><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item">Seo</li>
          <li class="breadcrumb-item"><a href="<?= base_url(route_to('admin.seo.update', $page->id)) ?>">Update <?= $page->sslug ?> seo</a></li>
        </ul>
      </div>

	  <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-12">
              <?= view('App\Admin\Main\_message') ?>

                <form action="<?= base_url(route_to('admin.seo.update', $page->id)) ?>" method="POST">
                <?= csrf_field() ?>
                        <div class="form-group">
                            <label for="phonenumber"><?= $page->sslug ?> seo title</label>
                            <input type="text" class="form-control " placeholder="Page title" value="<?= old('seot') ?: esc($page->stitle) ?>" name="seot">

                        </div>
                         <div class="form-group">
                            <label for="haddress"><?= $page->sslug ?> seo Decription</label>
                            <textarea type="text" class="form-control"  placeholder="Page seo title" name="seod"><?= old('seod') ?: esc($page->sdetails) ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="phonenumber"><?= $page->sslug ?> seo keyword</label>
                            <input type="text" class="form-control " placeholder="Page keyword" name="seok" value="<?= old('seok') ?: esc($page->skey) ?>">

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