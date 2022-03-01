<?= $this->extend('App\Views\App\admin') ?>
<?= $this->section('main') ?>
<div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Blood request add</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href=""><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item"><a href="<?= base_url(route_to('admin.blood.request.add')) ?>">Blood request add</a></li>
        </ul>
      </div>

	  <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-12">
              <?= view('App\Admin\Main\_message') ?>

                <form action="<?= base_url(route_to('admin.blood.request.add')) ?>" method="POST">
                <?= csrf_field() ?>
				        <div class="form-group">
                            <label for="firstname">Blood group</label>
                                   <select name="bgroup"  class="form-control <?php if (session('errors.bgroup')) : ?>is-invalid<?php endif ?>" required>
                                       <option>Blood Group</option>
                                       <option  value="A+" <?php if (old('bgroup') === 'A+') {
    echo 'selected';
} ?>>A+</option>
                                       <option  value="B+" <?php if (old('bgroup') === 'B+') {
    echo 'selected';
} ?>>B+</option>
                                       <option  value="AB+" <?php if (old('bgroup') === 'AB+') {
    echo 'selected';
} ?>>AB+</option>
                                       <option  value="O+" <?php if (old('bgroup') === 'O+') {
    echo 'selected';
} ?>>O+</option>
                                       <option  value="O-" <?php if (old('bgroup') === 'O-') {
    echo 'selected';
} ?>>O-</option>
                                       <option  value="A-" <?php if (old('bgroup') === 'A-') {
    echo 'selected';
} ?>>A-</option>
                                       <option  value="B-"<?php if (old('bgroup') === 'B-') {
    echo 'selected';
} ?>>B-</option>
                                       <option  value="AB-" <?php if (old('bgroup') === 'AB-') {
    echo 'selected';
} ?>>AB-</option>
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="lastname">Blood donation place</label>
                            <input type="text" class="form-control <?php if (session('errors.donateplace')) : ?>is-invalid<?php endif ?>"
                                   name="donateplace" aria-describedby="lastnameHelp" placeholder="Blood donation place" value="<?= old('donateplace') ?>" required>

                        </div>

                        <div class="form-group">
                            <label for="lastname">Refarence</label>
                            <input type="text" name="refarence" class="form-control  <?php if (session('errors.refarence')) : ?>is-invalid<?php endif ?>" aria-describedby="emailHelp" placeholder="Refarence" value="<?= old('refarence') ?>">

                        </div>

                      <div class="form-group">
                            <label for="email">Donor</label>
                            <select name="donor"  class="form-control <?php if (session('errors.donor')) : ?>is-invalid<?php endif ?>" required>
                                <option  value="NULL" <?php (old('donor') === 'NULL') ? print('selected') : '' ?>>None</option>
                                <?php foreach ($users as $user1) {
    ?>
                                       <option  value="<?= $user1->id ?>" <?php ((old('donor') === $user1->id)) ? print('selected') : '' ?>><?= $user1->fullname ?></option>
                                       <?php
} ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Managed by</label>
                            <select name="manage"  class="form-control <?php if (session('errors.manage')) : ?>is-invalid<?php endif ?>" required>
                                <option  value="NULL" <?php (old('manage') === 'NULL') ? print('selected') : '' ?>>None</option>
                                <?php foreach ($cusers as $user2) {
        ?>
                                       <option  value="<?= $user2->id ?>" <?php ((old('manage') === $user2->id)) ? print('selected') : '' ?>><?= $user2->fullname ?></option>
                                       <?php
    } ?>
                            </select>
                        </div>
                    <div class="form-group">
                            <label for="haddress">Details</label>
                            <textarea type="text" class="form-control"  placeholder="Blood donation details" name="details"><?= old('details') ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="email">Status</label>
                            <select name="status"  class="form-control <?php if (session('errors.status')) : ?>is-invalid<?php endif ?>" required>
                                <option  value="false" <?php (old('status') === 'false') ? print('selected') : '' ?>>Not managed</option>
                                       <option  value="true" <?php (old('status') === 'true') ? print('selected') : '' ?>>Managed</option>

                            </select>
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