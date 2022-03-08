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

                <form action="<?= base_url(route_to('admin.setting.index')) ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <h3 class="tile-title">General settings</h3>
                        <div class="form-group">
                            <label for="phonenumber">Site name</label>
                            <input type="text" class="form-control <?php if (session('errors.siteName')) : ?>is-invalid<?php endif ?>" placeholder="Site name" value="<?= old('siteName') ?: esc($setting->siteName) ?>" name="siteName">

                        </div>
                        <div class="form-group">
                            <label for="phonenumber">Site email </label>
                            <input type="text" class="form-control <?php if (session('errors.siteEmail')) : ?>is-invalid<?php endif ?>" placeholder="Site email" value="<?= old('siteEmail') ?: esc($setting->siteEmail) ?>" name="siteEmail">

                        </div>
                        <div class="form-group">
                            <label for="phonenumber">Site phone </label>
                            <input type="text" class="form-control <?php if (session('errors.sitePhone')) : ?>is-invalid<?php endif ?>" placeholder="Site phone" value="<?= old('sitePhone') ?: esc($setting->sitePhone) ?>" name="sitePhone">

                        </div>
                        <div class="form-group">
                            <label for="phonenumber">Site address</label>
                            <input type="text" class="form-control <?php if (session('errors.siteAddress')) : ?>is-invalid<?php endif ?>" placeholder="Site address" value="<?= old('siteAddress') ?: esc($setting->siteAddress) ?>" name="siteAddress">

                        </div>
                        <div class="form-group">
                          <?= empty($setting->siteCover) ? '' : '<img src="' . base_url($setting->siteCover) . '" width="600" height="330">' ?>
                            <label for="phonenumber">Site cover photo</label>
                            <input type="file" class="form-control <?php if (session('errors.photo')) : ?>is-invalid<?php endif ?>" name="photo" placeholder="Site cover photo">

                        </div>
                        <h3 class="tile-title">Social settings</h3>
                        <div class="form-group">
                            <label for="phonenumber">Site FB </label>
                            <input type="text" class="form-control <?php if (session('errors.siteFB')) : ?>is-invalid<?php endif ?>" placeholder="Facebook url" value="<?= old('siteFB') ?: esc($setting->siteFB) ?>" name="siteFB">

                        </div>
                        <div class="form-group">
                            <label for="phonenumber">Site twitter </label>
                            <input type="text" class="form-control <?php if (session('errors.siteTwitter')) : ?>is-invalid<?php endif ?>" placeholder="Site twitter" value="<?= old('siteTwitter') ?: esc($setting->siteTwitter) ?>" name="siteTwitter">

                        </div>
                        <div class="form-group">
                            <label for="phonenumber">Site linkin </label>
                            <input type="text" class="form-control <?php if (session('errors.siteLinkIn')) : ?>is-invalid<?php endif ?>" placeholder="Site linkin" value="<?= old('siteLinkIn') ?: esc($setting->siteLinkIn) ?>" name="siteLinkIn">

                        </div>
                        <div class="form-group">
                            <label for="phonenumber">Site youtube </label>
                            <input type="text" class="form-control <?php if (session('errors.siteYT')) : ?>is-invalid<?php endif ?>" placeholder="Site youtube" value="<?= old('siteYT') ?: esc($setting->siteYT) ?>" name="siteYT">

                        </div>
                        <div class="form-group">
                            <label for="phonenumber">Site instagram </label>
                            <input type="text" class="form-control <?php if (session('errors.siteInsta')) : ?>is-invalid<?php endif ?>" placeholder="Site instagram" value="<?= old('siteInsta') ?: esc($setting->siteInsta) ?>" name="siteInsta">

                        </div>
                        <h3 class="tile-title">Site about(255 max)</h3>
                        <div class="form-group">
                            <label for="haddress">Site Decription</label>
                            <textarea type="text" class="form-control <?php if (session('errors.siteAus')) : ?>is-invalid<?php endif ?>"  placeholder="Site details" name="siteAus"><?= old('siteAus') ?: esc($setting->siteAus) ?></textarea>
                        </div>
                        <h3 class="tile-title">Seo meta key settings</h3>
                        <div class="form-group">
                            <label for="phonenumber">Google meta key </label>
                            <input type="text" class="form-control <?php if (session('errors.siteGkey')) : ?>is-invalid<?php endif ?>" placeholder="Google meta key" value="<?= old('siteGkey') ?: esc($setting->siteGkey) ?>" name="siteGkey">

                        </div>
                        <div class="form-group">
                            <label for="phonenumber">Bing meta key </label>
                            <input type="text" class="form-control <?php if (session('errors.siteBkey')) : ?>is-invalid<?php endif ?>" placeholder="Bing meta key" value="<?= old('siteBkey') ?: esc($setting->siteBkey) ?>" name="siteBkey">

                        </div>
                        <div class="form-group">
                            <label for="phonenumber">Facebook app id </label>
                            <input type="text" class="form-control <?php if (session('errors.siteFkey')) : ?>is-invalid<?php endif ?>" placeholder="Facebook app id" value="<?= old('siteFkey') ?: esc($setting->siteFkey) ?>" name="siteFkey">

                        </div>
                        <div class="form-group">
                            <label for="phonenumber">Google analizer id </label>
                            <input type="text" class="form-control <?php if (session('errors.siteGAKet')) : ?>is-invalid<?php endif ?>" placeholder="Google analizer id" value="<?= old('siteGAKet') ?: esc($setting->siteGAKet) ?>" name="siteGAKet">

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