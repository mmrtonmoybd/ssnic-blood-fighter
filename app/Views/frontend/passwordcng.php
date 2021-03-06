<?= $this->extend('App\Views\App\layout') ?>
<?= $this->section('pageSeo') ?>
<title>Password change</title>
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
                         <h2 class="card-header">Password change</h2>
                        <div class="card-body">
                           <?= view('App\Auth\_message_block') ?>
                           <div class="d-flex align-items-center justify-content-between mb-3">


                              <!--- New Post area-->
                              <form method="post" action="<?= route_to('passwordChange') ?>" style="min-width:100%;">
                              <?= csrf_field() ?>
                        <div class="form-group">
                            <label for="password"><?=lang('Auth.password')?></label>
                            <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="pass_confirm"><?=lang('Auth.repeatPassword')?></label>
                            <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
                        </div>

                        <br>

                        <button type="submit" style="color: white;" class="btn btn-block danger-color">Password Change</button>
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