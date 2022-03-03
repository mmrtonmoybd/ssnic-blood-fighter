<?= $this->extend('App\Views\App\admin') ?>
<?= $this->section('pageStyles') ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
<?= $this->endSection() ?>
<?= $this->section('main') ?>
<div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Update blood request</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href=""><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item">Blood request</li>
          <li class="breadcrumb-item"><a href="<?= base_url(route_to('admin.blood.request.update', $bloodreq->id)) ?>">Update blood request</a></li>
        </ul>
      </div>

	  <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-12">
              <?= view('App\Admin\Main\_message') ?>

                <form action="<?= base_url(route_to('admin.blood.request.update', $bloodreq->id)) ?>" method="POST">
                <?= csrf_field() ?>
				        <div class="form-group">
                            <label for="firstname">Blood group</label>
                                   <select name="bgroup"  class="form-control <?php

 if (session('errors.bgroup')) : ?>is-invalid<?php endif ?>" required>
                                       <option>Blood Group</option>
                                       <option  value="A+" <?php if (old('bgroup') === 'A+' || $bloodreq->bgroup === 'A+') {
     echo 'selected';
 } ?>>A+</option>
                                       <option  value="B+" <?php if (old('bgroup') === 'B+' || $bloodreq->bgroup === 'B+') {
     echo 'selected';
 } ?>>B+</option>
                                       <option  value="AB+" <?php if (old('bgroup') === 'AB+' || $bloodreq->bgroup === 'AB+') {
     echo 'selected';
 } ?>>AB+</option>
                                       <option  value="O+" <?php if (old('bgroup') === 'O+' || $bloodreq->bgroup === 'O+') {
     echo 'selected';
 } ?>>O+</option>
                                       <option  value="O-" <?php if (old('bgroup') === 'O-' || $bloodreq->bgroup === 'O-') {
     echo 'selected';
 } ?>>O-</option>
                                       <option  value="A-" <?php if (old('bgroup') === 'A-' || $bloodreq->bgroup === 'A-') {
     echo 'selected';
 } ?>>A-</option>
                                       <option  value="B-"<?php if (old('bgroup') === 'B-' || $bloodreq->bgroup === 'B-') {
     echo 'selected';
 } ?>>B-</option>
                                       <option  value="AB-" <?php if (old('bgroup') === 'AB-' || $bloodreq->bgroup === 'AB-') {
     echo 'selected';
 } ?>>AB-</option>
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="lastname">Blood donation place</label>
                            <input type="text" class="form-control <?php if (session('errors.donateplace')) : ?>is-invalid<?php endif ?>"
                                   name="donateplace" aria-describedby="lastnameHelp" placeholder="Blood donation place" value="<?= old('donateplace') ?: esc($bloodreq->donateplace) ?>" required>

                        </div>

                        <div class="form-group">
                            <label for="lastname">Refarence</label>
                            <input type="text" name="refarence" class="form-control  <?php if (session('errors.refarence')) : ?>is-invalid<?php endif ?>" aria-describedby="emailHelp" placeholder="Refarence" value="<?= old('refarence') ?: esc($bloodreq->refarence) ?>">

                        </div>

                      <div class="form-group">
                            <label for="email">Donor</label>
                            <select name="donor"  class="form-control <?php if (session('errors.donor')) : ?>is-invalid<?php endif ?>" required>
                                <option  value="NULL" <?php (old('donor') === null) ? print('selected') : '' ?>>None</option>
                                <?php foreach ($users as $user1) {
     ?>
                                       <option  value="<?= $user1->id ?>" <?php (($bloodreq->donor === $user1->id)) ? print('selected') : '' ?>><?= $user1->fullname ?></option>
                                       <?php
 } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Managed by</label>
                            <select name="manage"  class="form-control <?php if (session('errors.manage')) : ?>is-invalid<?php endif ?>" required>
                                <option  value="NULL" <?php (old('manage') === null) ? print('selected') : '' ?>>None</option>
                                <?php foreach ($cusers as $user2) {
     ?>
                                       <option  value="<?= $user2->id ?>" <?php (($bloodreq->manage_by === $user2->id)) ? print('selected') : '' ?>><?= $user2->fullname ?></option>
                                       <?php
 } ?>
                            </select>
                        </div>
                    <div class="form-group">
                            <label for="haddress">Details</label>
                            <textarea type="text" class="form-control" id="summernote" rows="5" placeholder="Blood donation details" name="details"><?= esc($bloodreq->details) ?></textarea>
                             <script>
               new SimpleMDE({
		element: document.getElementById("summernote"),
		spellChecker: false,
	});
</script>
                        </div>

                        <div class="form-group">
                            <label for="email">Status</label>
                            <select name="status"  class="form-control <?php if (session('errors.status')) : ?>is-invalid<?php endif ?>" required>
                              <option  value="false" <?php ($bloodreq->status === false) ? print('selected') : '' ?>>Not managed</option>
                                       <option  value="true" <?php ($bloodreq->status === true) ? print('selected') : '' ?>>Managed</option>

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