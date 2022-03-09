<?= $this->extend('App\Views\App\layout') ?>
<?= $this->section('pageSeo') ?>
<title>Blood request add</title>
<?= $this->endSection() ?>
<?= $this->section('main') ?>
         <div  class="container container" style="padding-top:100px;">
            <div class="content-sidebar row justify-content-between">
               <?= view('frontend/sidebar') ?>
               <!-- ./sidebar -->
               <div class="content-area col-md-8">
                  <div class="tab-content" id="profileInfoTabsContent">
                     <div class="tab-pane fade show active" id="worker" role="tabpanel" aria-labelledby="worker-tab">
                     </div>
                     <div class="card card-with-shadow-sm mb-3">
                         <h2 class="card-header">Add blood request</h2>
                        <div class="card-body">
                           <?= view('App\Auth\_message_block') ?>
                           <div class="d-flex align-items-center justify-content-between mb-3">


                              <!--- New Post area-->
                              <form method="post" action="<?= base_url(route_to('bloodrequest')) ?>" style="min-width:100%;">
                              <?= csrf_field() ?>
                        <div class="form-group">
                            <label for="email">Blood Group</label>
                            <select name="bgroup"  class="form-control <?php if (session('errors.bgroup')) : ?>is-invalid<?php endif ?>" required>
                                       <option>Blood Group</option>
                                       <option  value="A+" <?php (old('bgroup') === 'A+') ? print('selected') : '' ?>>A+</option>
                                       <option  value="B+" <?php (old('bgroup') === 'B+') ? print('selected') : '' ?>>B+</option>
                                       <option  value="AB+" <?php (old('bgroup') === 'AB+') ? print('selected') : '' ?>>AB+</option>
                                       <option  value="O+" <?php (old('bgroup') === 'O+') ? print('selected') : '' ?>>O+</option>
                                       <option  value="O-" <?php (old('bgroup') === 'O-') ? print('selected') : '' ?>>O-</option>
                                       <option  value="A-" <?php (old('bgroup') === 'A-') ? print('selected') : '' ?>>A-</option>
                                       <option  value="B-" <?php (old('bgroup') === 'B-') ? print('selected') : '' ?>>B-</option>
                                       <option  value="AB-" <?php (old('bgroup') === 'AB-') ? print('selected') : '' ?>>AB-</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="donateplace">Blood donation place</label>
                            <input type="text" name="donateplace" class="form-control <?php if (session('errors.donateplace')) : ?>is-invalid<?php endif ?>" placeholder="Blood donation place" required>
                        </div>

                        <div class="form-group">
                            <label for="refarence">Referance</label>
                            <input type="text" name="refarence" class="form-control <?php if (session('errors.refarence')) : ?>is-invalid<?php endif ?>" placeholder="Refarence" required>
                        </div>

                        <div class="form-group">
                            <label for="details">Details</label>
                            <textarea type="text" name="details" id="summernote" rows="5" class="form-control <?php if (session('errors.details')) : ?>is-invalid<?php endif ?>"  placeholder="Details" required><?= old('details') ?></textarea>
                             
                        </div>

                        <br>

                        <button type="submit" style="color: white;" class="btn btn-block danger-color">Blood request add</button>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
      <!-- ./content-area -->
      </div>
      </div>
<?= $this->endSection() ?>