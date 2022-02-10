<?= $this->extend("App\Views\App\layout") ?>
<?= $this->section('main') ?>
         <div  class="container container" style="padding-top:100px;">
            <div class="content-sidebar row justify-content-between">
               <?= view("App\Views\Frontend\sidebar") ?>

               <!-- ./sidebar -->
               <div class="content-area col-md-8">
                  <div class="tab-content" id="profileInfoTabsContent">
                     <div class="tab-pane fade show active" id="worker" role="tabpanel" aria-labelledby="worker-tab">
                     </div>
                     <div class="card card-with-shadow-sm mb-3">
                        <div class="card-body">
                           <?= view('Auth/_message_block') ?>
                           <div class="d-flex align-items-center justify-content-between mb-3">
                              <h4 class="text-gray-400 m-0"><b>আমার প্রোফাইল </b> </h4>
                              <a href="<?= route_to('profileupdate') ?>" style="text-align:right; font-size:13px; text-decoration:none;"><b>পরিবর্তন করুন </b> </a>
                           </div>
                           <hr>
                           <div style=" color:red;">
                              অনুগ্রহপূর্বক সর্বশেষ রক্তদানের তথ্য যুক্ত করুন। যুক্ত করতে <a href="<?= route_to('lastDonup') ?>"> এখানে </a> চাপ দিন
                           </div>
                           <div class="row" style="padding:20px; line-height:2;">
                              <br>
                              <?php

function getLastdonate()
{
    $lastdon = user()->lastdonate;

    if (null !== $lastdon) {
        return $lastdon;
    }
    echo 'Never donate yet';
}

                              ?>
                              নামঃ <?= esc(trim(trim(user()->firstname) . ' ' . trim(user()->lastname))) ?><br>
                              ইমেইলঃ <?= esc(user()->email) ?> <br>
                              Username:  <?= esc(user()->username) ?> <br>
                              ফোন নাম্বারঃ <?= esc(user()->phonenumber) ?> <br>
                              বাসার ঠিকানা: <?= esc(user()->haddress) ?> <br>
                              শিক্ষা প্রতিষ্ঠান: <?= esc(user()->institute) ?> <br>
                              ব্যাচ: <?= esc(user()->batch) ?> <br>
                              রক্তের গ্রুপঃ <?= esc(user()->bgroup) ?> <br>
                              <!----
                                 <a style="color:blue;"> </a>
                                 -->
                              সর্বশেষ রক্তদানের তারিখঃ  <?= esc(getLastdonate()) ?> <br>
                              লিঙ্গগত বৈশিষ্টঃ   <?= esc(user()->gender) ?><br>
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