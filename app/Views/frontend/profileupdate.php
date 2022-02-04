<?= $this->extend('App\Views\Auth\layout') ?>
<?= $this->section('main') ?>
         <div  class="container container" style="padding-top:100px;">
            <div class="content-sidebar row justify-content-between">
               <?= view('App\Views\frontend\sidebar') ?>
               <!-- ./sidebar -->
               <div class="content-area col-md-8">
                  <div class="tab-content" id="profileInfoTabsContent">
                     <div class="tab-pane fade show active" id="worker" role="tabpanel" aria-labelledby="worker-tab">
                     </div>
                     <div class="card card-with-shadow-sm mb-3">
                         <h2 class="card-header">Profile update</h2>
                        <div class="card-body">
                           <?= view('App\Auth\_message_block') ?>
                           <div class="d-flex align-items-center justify-content-between mb-3">


                              <!--- New Post area-->
                              <form method="post" action="<?= route_to('profileupdate') ?>" style="min-width:100%;" enctype="multipart/form-data">
                              <?= csrf_field() ?>
                                  <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control <?php if (session('errors.firstname')) : ?>is-invalid<?php endif ?>"
                                   name="firstname" aria-describedby="firstnameHelp" placeholder="First Name" value="<?= old('firstname') ?: user()->firstname ?>" required>

                        </div>

                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control <?php if (session('errors.lastname')) : ?>is-invalid<?php endif ?>"
                                   name="lastname" aria-describedby="lastnameHelp" placeholder="Last Name" value="<?= old('lastname') ?: user()->lastname ?>" required>

                        </div>

                        <div class="form-group">
                            <label for="email">Blood Group</label>
                            <select name="bgroup"  class="form-control <?php if (session('errors.bgroup')) : ?>is-invalid<?php endif ?>" required>
                                       <option>Blood Group</option>
                                       <option  value="A+" <?php if (old('bgroup') === 'A+' || user()->bgroup === 'A+') {
    echo 'selected';
} ?>>A+</option>
                                       <option  value="B+" <?php if (old('bgroup') === 'B+' || user()->bgroup === 'B+') {
    echo 'selected';
} ?>>B+</option>
                                       <option  value="AB+" <?php if (old('bgroup') === 'AB+' || user()->bgroup === 'AB+') {
    echo 'selected';
} ?>>AB+</option>
                                       <option  value="O+" <?php if (old('bgroup') === 'O+' || user()->bgroup === 'O+') {
    echo 'selected';
} ?>>O+</option>
                                       <option  value="O-" <?php if (old('bgroup') === 'O-' || user()->bgroup === 'O-') {
    echo 'selected';
} ?>>O-</option>
                                       <option  value="A-" <?php if (old('bgroup') === 'A-' || user()->bgroup === 'A-') {
    echo 'selected';
} ?>>A-</option>
                                       <option  value="B-"<?php if (old('bgroup') === 'B-' || user()->bgroup === 'B-') {
    echo 'selected';
} ?>>B-</option>
                                       <option  value="AB-" <?php if (old('bgroup') === 'AB-' || user()->bgroup === 'AB-') {
    echo 'selected';
} ?>>AB-</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="email">Gender</label>
                            <select name="gender"  class="form-control <?php if (session('errors.gender')) : ?>is-invalid<?php endif ?>" required>
                                       <option>Gender</option>
                                       <option  value="Male" <?php (old('gender') === 'Male' || user()->gender === 'Male') ? print('selected') : '' ?>>Male</option>
                                       <option  value="Female" <?php (old('gender') === 'Female' || user()->gender === 'Female') ? print('selected') : '' ?>>Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="phonenumber">Phone Number</label>
                            <input type="text" class="form-control <?php if (session('errors.phonenumber')) : ?>is-invalid<?php endif ?>" name="phonenumber" placeholder="Phone Number" value="<?= old('phonenumber') ?: user()->phonenumber ?>" required>
                                <small id="emailHelp" class="form-text text-muted">We'll never share your phone number with anyone else.</small>
                        </div>

                         <div class="form-group">
                            <label for="haddress">Home Address</label>
                            <textarea type="text" name="haddress" class="form-control <?php if (session('errors.haddress')) : ?>is-invalid<?php endif ?>"  placeholder="Home Address" required><?= old('haddress') ?: user()->haddress ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="institute">Educational Institute</label>
                            <input type="text" class="form-control <?php if (session('errors.institute')) : ?>is-invalid<?php endif ?>" name="institute" placeholder="Educational Intitute" value="<?= old('institute') ?: user()->institute ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="batch">Batch</label>
                            <input type="text" class="form-control <?php if (session('errors.batch')) : ?>is-invalid<?php endif ?>" name="batch" placeholder="Batch-21" value="<?= old('batch') ?: user()->batch ?>" required>
                        </div>
<?= ! empty(user()->pphoto) ? '<br><br><br><br><br>' : '' ?>
                        <div class="form-group">
                           <?= empty(user()->pphoto) ? '' : '<img class="avatarx rounded-circle" src="' . base_url(user()->pphoto) . '" alt="LanceBN">' ?>
                            <label for="batch">Profile photo</label>
                            <input type="file" class="form-control <?php if (session('errors.photo')) : ?>is-invalid<?php endif ?>" name="photo" placeholder="Profile Photo">
                        </div>

                        <br>

                        <button type="submit" style="background-color: #bb0a1e; color: white;" class="btn btn-block">Profile Update</button>
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