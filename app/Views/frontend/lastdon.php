<?= $this->extend('App\Views\App\layout') ?>
<?= $this->section('main') ?>
         <div  class="container container" style="padding-top:100px;">
            <div class="content-sidebar row justify-content-between">
               <?= view('App\Views\Frontend\sidebar') ?>
               <!-- ./sidebar -->
               <div class="content-area col-md-8">
                  <div class="tab-content" id="profileInfoTabsContent">
                     <div class="tab-pane fade show active" id="worker" role="tabpanel" aria-labelledby="worker-tab">
                     </div>
                     <div class="card card-with-shadow-sm mb-3">
                         <h2 class="card-header">Last blood donation update</h2>
                        <div class="card-body">
                           <?= view('App\Auth\_message_block') ?>
                           <div class="d-flex align-items-center justify-content-between mb-3">


                              <!--- New Post area-->
                              <form method="post" action="<?= route_to('lastDonup') ?>" style="min-width:100%;" enctype="multipart/form-data">
                              <?= csrf_field() ?>
                        <div class="form-group">
                            <label for="password">Last blood donation date</label>
                            <input type="date" name="lastdon" class="form-control <?php if (session('errors.lastdon')) : ?>is-invalid<?php endif ?>" placeholder="Last blood donation date" value="<?= old('lastdon') ?: user()->lastdonate ?>" required>
                        </div>

                        <br>

                        <button type="submit" style="background-color: #bb0a1e; color: white;" class="btn btn-block">Last blood donation update</button>
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