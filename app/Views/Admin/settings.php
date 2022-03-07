<?= $this->extend('App\Views\App\admin') ?>
<?= $this->section('main') ?>
<div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Settings Update</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href=""><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item">Seetngs</li>
          <li class="breadcrumb-item"><a href="#">Settings Update</a></li>
        </ul>
      </div>

	  <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-12">
              <?= view('App\Admin\Main\_message') ?>

                <form action="<?= base_url() ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                        <div class="form-group">
                            <label for="phonenumber">Site name</label>
                            <input type="text" class="form-control " placeholder="Site name" value="<?= old('siteName') ?: esc($setting->siteName) ?>" name="siteName">

                        </div>
                        <div class="form-group">
                            <label for="phonenumber">Site email </label>
                            <input type="text" class="form-control " placeholder="Site email" value="<?= old('siteEmail') ?: esc($setting->siteEmail) ?>" name="siteEmail">

                        </div>
                        <div class="form-group">
                            <label for="phonenumber">Site phone </label>
                            <input type="text" class="form-control " placeholder="Site phone" value="<?= old('sitePhone') ?: esc($setting->sitePhone) ?>" name="sitePhone">

                        </div>
                        <div class="form-group">
                            <label for="phonenumber"><?= $page->sslug ?> </label>
                            <input type="text" class="form-control " placeholder="Page title" value="<?= old('seot') ?: esc($setting->stitle) ?>" name="seot">

                        </div>
                        <div class="form-group">
                            <label for="phonenumber"><?= $page->sslug ?> </label>
                            <input type="text" class="form-control " placeholder="Page title" value="<?= old('seot') ?: esc($setting->stitle) ?>" name="seot">

                        </div>
                        <div class="form-group">
                            <label for="phonenumber"><?= $page->sslug ?> </label>
                            <input type="text" class="form-control " placeholder="Page title" value="<?= old('seot') ?: esc($setting->stitle) ?>" name="seot">

                        </div>
                        <div class="form-group">
                            <label for="phonenumber"><?= $page->sslug ?> </label>
                            <input type="text" class="form-control " placeholder="Page title" value="<?= old('seot') ?: esc($setting->stitle) ?>" name="seot">

                        </div>
                        <div class="form-group">
                            <label for="phonenumber"><?= $page->sslug ?> </label>
                            <input type="text" class="form-control " placeholder="Page title" value="<?= old('seot') ?: esc($setting->stitle) ?>" name="seot">

                        </div>
                        <div class="form-group">
                            <label for="phonenumber"><?= $page->sslug ?> </label>
                            <input type="text" class="form-control " placeholder="Page title" value="<?= old('seot') ?: esc($setting->stitle) ?>" name="seot">

                        </div>
                        <div class="form-group">
                            <label for="phonenumber"><?= $page->sslug ?> </label>
                            <input type="text" class="form-control " placeholder="Page title" value="<?= old('seot') ?: esc($setting->stitle) ?>" name="seot">

                        </div>
                         <div class="form-group">
                            <label for="haddress"><?= $page->sslug ?> seo Decription</label>
                            <textarea type="text" class="form-control"  placeholder="Page seo title" name="seod"><?= old('seod') ?: esc($page->sdetails) ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="phonenumber"><?= $page->sslug ?> </label>
                            <input type="text" class="form-control " placeholder="Page title" value="<?= old('seot') ?: esc($setting->stitle) ?>" name="seot">

                        </div>
                        <div class="form-group">
                            <label for="phonenumber"><?= $page->sslug ?> </label>
                            <input type="text" class="form-control " placeholder="Page title" value="<?= old('seot') ?: esc($setting->stitle) ?>" name="seot">

                        </div>
                        <div class="form-group">
                            <label for="phonenumber"><?= $page->sslug ?> </label>
                            <input type="text" class="form-control " placeholder="Page title" value="<?= old('seot') ?: esc($setting->stitle) ?>" name="seot">

                        </div>
                        <div class="form-group">
                            <label for="phonenumber"><?= $page->sslug ?> </label>
                            <input type="text" class="form-control " placeholder="Page title" value="<?= old('seot') ?: esc($setting->stitle) ?>" name="seot">

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