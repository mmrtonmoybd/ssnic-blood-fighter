<?= $this->extend('App\Views\App\layout') ?>
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
                                   name="firstname" aria-describedby="firstnameHelp" placeholder="First Name" value="<?= old('firstname') ?: esc(user()->firstname) ?>" required>

                        </div>

                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control <?php if (session('errors.lastname')) : ?>is-invalid<?php endif ?>"
                                   name="lastname" aria-describedby="lastnameHelp" placeholder="Last Name" value="<?= old('lastname') ?: esc(user()->lastname) ?>" required>

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
                            <input type="text" class="form-control <?php if (session('errors.phonenumber')) : ?>is-invalid<?php endif ?>" name="phonenumber" placeholder="Phone Number" value="<?= old('phonenumber') ?: esc(user()->phonenumber) ?>" required>
                                <small id="emailHelp" class="form-text text-muted">We'll never share your phone number with anyone else.</small>
                        </div>

                         <div class="form-group">
                            <label for="haddress">Home Address</label>
                            <textarea type="text" name="haddress" class="form-control <?php if (session('errors.haddress')) : ?>is-invalid<?php endif ?>"  placeholder="Home Address" required><?= old('haddress') ?: esc(user()->haddress) ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="email">Home city</label>
                            <select name="city"  class="form-control <?php if (session('errors.bgroup')) : ?>is-invalid<?php endif ?>" required>
                                       <option>Home city</option>
                                       <?php
                                       $city = user()->city;
                                       ?>
                                       <option <?php if (old('city') === 'Bagerhat' || $city === 'Bagerhat') {
                                           echo 'selected';
                                       } ?>  value="Bagerhat" >Bagerhat</option>
<option <?php if (old('city') === 'Bandarban' || $city === 'Bandarban') {
                                           echo 'selected';
                                       } ?>  value="Bandarban" >Bandarban</option>
<option <?php if (old('city') === 'Barguna' || $city === 'Barguna') {
                                           echo 'selected';
                                       } ?>  value="Barguna" >Barguna</option>
<option <?php if (old('city') === 'Barisal' || $city === 'Barisal') {
                                           echo 'selected';
                                       } ?>  value="Barishal" >Barisal</option>
<option <?php if (old('city') === 'Bhola' || $city === 'Bhola') {
                                           echo 'selected';
                                       } ?>  value="Bhola" >Bhola</option>
<option <?php if (old('city') === 'Bogura' || $city === 'Bogura') {
                                           echo 'selected';
                                       } ?>  value="Bogura" >Bogura</option>
<option <?php if (old('city') === 'Brahmanbaria' || $city === 'Brahmanbaria') {
                                           echo 'selected';
                                       } ?>  value="Brahmanbaria" >Brahmanbaria</option>
<option <?php if (old('city') === 'Chandpur' || $city === 'Chandpur') {
                                           echo 'selected';
                                       } ?>  value="Chandpur" >Chandpur</option>
<option <?php if (old('city') === 'Chattogram' || $city === 'Chattogram') {
                                           echo 'selected';
                                       } ?>  value="Chattogram" >Chattogram</option>
<option <?php if (old('city') === 'Chuadanga' || $city === 'Chuadanga') {
                                           echo 'selected';
                                       } ?>  value="Chuadanga" >Chuadanga</option>
<option <?php if (old('city') === 'Coxs Bazar' || $city === 'Coxs Bazar') {
                                           echo 'selected';
                                       } ?>  value="Coxs Bazar" >Coxs Bazar</option>
<option <?php if (old('city') === 'Cumilla' || $city === 'Cumilla') {
                                           echo 'selected';
                                       } ?>  value="Cumilla" >Cumilla</option>
<option <?php if (old('city') === 'Dhaka' || $city === 'Dhaka') {
                                           echo 'selected';
                                       } ?>  value="Dhaka" >Dhaka</option>
<option <?php if (old('city') === 'Dinajpur' || $city === 'Dinajpur') {
                                           echo 'selected';
                                       } ?>  value="Dinajpur" >Dinajpur</option>
<option <?php if (old('city') === 'Faridpur' || $city === 'Faridpur') {
                                           echo 'selected';
                                       } ?>  value="Faridpur" >Faridpur </option>
<option <?php if (old('city') === 'Feni' || $city === 'Feni') {
                                           echo 'selected';
                                       } ?>  value="Feni" >Feni</option>
<option <?php if (old('city') === 'Gaibandha' || $city === 'Gaibandha') {
                                           echo 'selected';
                                       } ?>  value="Gaibandha" >Gaibandha</option>
<option <?php if (old('city') === 'Gazipur' || $city === 'Gazipur') {
                                           echo 'selected';
                                       } ?>  value="Gazipur" >Gazipur</option>
<option <?php if (old('city') === 'Gopalganj' || $city === 'Gopalganj') {
                                           echo 'selected';
                                       } ?>  value="Gopalganj" >Gopalganj</option>
<option <?php if (old('city') === 'Habiganj' || $city === 'Habiganj') {
                                           echo 'selected';
                                       } ?>  value="Habiganj" >Habiganj</option>
<option <?php if (old('city') === 'Jamalpur' || $city === 'Jamalpur') {
                                           echo 'selected';
                                       } ?>  value="Jamalpur" >Jamalpur</option>
<option <?php if (old('city') === 'Jashore' || $city === 'Jashore') {
                                           echo 'selected';
                                       } ?>  value="Jashore" >Jashore</option>
<option <?php if (old('city') === 'Jhalokati' || $city === 'Jhalokati') {
                                           echo 'selected';
                                       } ?>  value="Jhalokati" >Jhalokati</option>
<option <?php if (old('city') === 'Jhenaidah' || $city === 'Jhenaidah') {
                                           echo 'selected';
                                       } ?>  value="Jhenaidah" >Jhenaidah</option>
<option <?php if (old('city') === 'Joypurhat' || $city === 'Joypurhat') {
                                           echo 'selected';
                                       } ?>  value="Joypurhat" >Joypurhat</option>
<option <?php if (old('city') === 'Khagrachhari' || $city === 'Khagrachhari') {
                                           echo 'selected';
                                       } ?>  value="Khagrachhari" >Khagrachhari</option>
<option <?php if (old('city') === 'Khulna' || $city === 'Khulna') {
                                           echo 'selected';
                                       } ?>  value="Khulna" >Khulna</option>
<option <?php if (old('city') === 'Kishoreganj' || $city === 'Kishoreganj') {
                                           echo 'selected';
                                       } ?>  value="Kishoreganj" >Kishoreganj</option>
<option <?php if (old('city') === 'Kurigram' || $city === 'Kurigram') {
                                           echo 'selected';
                                       } ?>  value="Kurigram" >Kurigram</option>
<option <?php if (old('city') === 'Kushtia' || $city === 'Kushtia') {
                                           echo 'selected';
                                       } ?>  value="Kushtia" >Kushtia</option>
<option <?php if (old('city') === 'Lakshmipur' || $city === 'Lakshmipur') {
                                           echo 'selected';
                                       } ?>  value="Lakshmipur" >Lakshmipur</option>
<option <?php if (old('city') === 'Lalmonirhat' || $city === 'Lalmonirhat') {
                                           echo 'selected';
                                       } ?>  value="Lalmonirhat" >Lalmonirhat</option>
<option <?php if (old('city') === 'Madaripur' || $city === 'Madaripur') {
                                           echo 'selected';
                                       } ?>  value="Madaripur" >Madaripur</option>
<option <?php if (old('city') === 'Magura' || $city === 'Magura') {
                                           echo 'selected';
                                       } ?>  value="Magura" >Magura</option>
<option <?php if (old('city') === 'Manikganj' || $city === 'Manikganj') {
                                           echo 'selected';
                                       } ?>  value="Manikganj" >Manikganj </option>
<option <?php if (old('city') === 'Meherpur' || $city === 'Meherpur') {
                                           echo 'selected';
                                       } ?>  value="Meherpur" >Meherpur</option>
<option <?php if (old('city') === 'Moulvibazar' || $city === 'Moulvibazar') {
                                           echo 'selected';
                                       } ?>  value="Moulvibazar" >Moulvibazar</option>
<option <?php if (old('city') === 'Munshiganj' || $city === 'Munshiganj') {
                                           echo 'selected';
                                       } ?>  value="Munshiganj" >Munshiganj</option>
<option <?php if (old('city') === 'Mymensingh' || $city === 'Mymensingh') {
                                           echo 'selected';
                                       } ?>  value="Mymensingh" >Mymensingh</option>
<option <?php if (old('city') === 'Naogaon' || $city === 'Naogaon') {
                                           echo 'selected';
                                       } ?>  value="Naogaon" >Naogaon</option>
<option <?php if (old('city') === 'Narail' || $city === 'Narail') {
                                           echo 'selected';
                                       } ?>  value="Narail" >Narail</option>
<option <?php if (old('city') === 'Narayanganj' || $city === 'Narayanganj') {
                                           echo 'selected';
                                       } ?>  value="Narayanganj" >Narayanganj</option>
<option <?php if (old('city') === 'Narsingdi' || $city === 'Narsingdi') {
                                           echo 'selected';
                                       } ?>  value="Narsingdi" >Narsingdi</option>
<option <?php if (old('city') === 'Natore' || $city === 'Natore') {
                                           echo 'selected';
                                       } ?>  value="Natore" >Natore</option>
<option <?php if (old('city') === 'Nawabganj' || $city === 'Nawabganj') {
                                           echo 'selected';
                                       } ?>  value="Nawabganj" >Nawabganj</option>
<option <?php if (old('city') === 'Netrakona' || $city === 'Netrakona') {
                                           echo 'selected';
                                       } ?>  value="Netrakona" >Netrakona</option>
<option <?php if (old('city') === 'Netrakona' || $city === 'Netrakona') {
                                           echo 'selected';
                                       } ?>  value="Nilphamari" >Nilphamari</option>
<option <?php if (old('city') === 'Noakhali' || $city === 'Noakhali') {
                                           echo 'selected';
                                       } ?>  value="Noakhali" >Noakhali</option>
<option <?php if (old('city') === 'Pabna' || $city === 'Pabna') {
                                           echo 'selected';
                                       } ?>  value="Pabna" >Pabna</option>
<option <?php if (old('city') === 'Panchagarh' || $city === 'Panchagarh') {
                                           echo 'selected';
                                       } ?>  value="Panchagarh" >Panchagarh</option>
<option <?php if (old('city') === 'Patuakhali' || $city === 'Patuakhali') {
                                           echo 'selected';
                                       } ?>  value="Patuakhali" >Patuakhali</option>
<option <?php if (old('city') === 'Pirojpur' || $city === 'Pirojpur') {
                                           echo 'selected';
                                       } ?>  value="Pirojpur" >Pirojpur</option>
<option <?php if (old('city') === 'Rajbari' || $city === 'Rajbari') {
                                           echo 'selected';
                                       } ?>  value="Rajbari" >Rajbari</option>
<option <?php if (old('city') === 'Rajshahi' || $city === 'Rajshahi') {
                                           echo 'selected';
                                       } ?>  value="Rajshahi" >Rajshahi</option>
<option <?php if (old('city') === 'Rangamati' || $city === 'Rangamati') {
                                           echo 'selected';
                                       } ?>  value="Rangamati" >Rangamati</option>
<option <?php if (old('city') === 'Rangpur' || $city === 'Rangpur') {
                                           echo 'selected';
                                       } ?>  value="Rangpur" >Rangpur</option>
<option <?php if (old('city') === 'Satkhira' || $city === 'Satkhira') {
                                           echo 'selected';
                                       } ?>  value="Satkhira" >Satkhira</option>
<option <?php if (old('city') === 'Shariatpur' || $city === 'Shariatpur') {
                                           echo 'selected';
                                       } ?>  value="Shariatpur" >Shariatpur</option>
<option <?php if (old('city') === 'Sherpur' || $city === 'Sherpur') {
                                           echo 'selected';
                                       } ?>  value="Sherpur" >Sherpur</option>
<option <?php if (old('city') === 'Sirajganj' || $city === 'Sirajganj') {
                                           echo 'selected';
                                       } ?>  value="Sirajganj" >Sirajganj</option>
<option <?php if (old('city') === 'Sunamganj' || $city === 'Sunamganj') {
                                           echo 'selected';
                                       } ?>  value="Sunamganj" >Sunamganj</option>
<option <?php if (old('city') === 'Sylhet' || $city === 'Sylhet') {
                                           echo 'selected';
                                       } ?>  value="Sylhet" >Sylhet</option>
<option <?php if (old('city') === 'Tangail' || $city === 'Tangail') {
                                           echo 'selected';
                                       } ?>  value="Tangail" >Tangail</option>
<option <?php if (old('city') === 'Thakurgaon' || $city === 'Thakurgaon') {
                                           echo 'selected';
                                       } ?>  value="Thakurgaon" >Thakurgaon</option>
                         </select>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="institute">Educational Institute</label>
                            <input type="text" class="form-control <?php if (session('errors.institute')) : ?>is-invalid<?php endif ?>" name="institute" placeholder="Educational Intitute" value="<?= old('institute') ?: esc(user()->institute) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="batch">Batch</label>
                            <input type="text" class="form-control <?php if (session('errors.batch')) : ?>is-invalid<?php endif ?>" name="batch" placeholder="Batch-21" value="<?= old('batch') ?: esc(user()->batch) ?>" required>
                        </div>
<?= ! empty(user()->pphoto) ? '<br><br><br><br><br>' : '' ?>
                        <div class="form-group">
                           <?= empty(user()->pphoto) ? '' : '<img class="avatarx rounded-circle" src="' . base_url(user()->pphoto) . '" alt="LanceBN">' ?>
                            <label for="batch">Profile photo</label>
                            <input type="file" class="form-control <?php if (session('errors.photo')) : ?>is-invalid<?php endif ?>" name="photo" placeholder="Profile Photo">
                        </div>

                        <br>

                        <button type="submit" style="color: white;" class="btn btn-block danger-color">Profile Update</button>
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