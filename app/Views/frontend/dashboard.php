<?= $this->extend('App\Views\Auth\layout') ?>
<?= $this->section('main') ?>
         <div  class="container container" style="padding-top:100px;">
            <div class="content-sidebar row justify-content-between">
               <style>
                  .avatarx {
                  border: 4px solid rgba(255, 255, 255, 0.6);
                  margin-top: -6rem;
                  margin-bottom: 1.4rem;
                  width: 7rem;
                  height: 7rem;
                  }
                  .sidenavlink{
                  text-decoration:none;
                  color:#606975;
                  padding:13px 5px 13px 5px;
                  border:0px;
                  border-bottom:1px solid #DDD;
                  text-align:left;
                  font-size:14px ;
                  width:100%;
                  }
                  .sidenavlink2{
                  text-decoration:none;
                  color:#606975;
                  padding:13px 5px 13px 5px;
                  border:0px;
                  border-bottom:1px solid #DDD;
                  text-align:left;
                  font-size:14px ;
                  width:100%;
                  }
                  .sidenavlink:hover{
                  text-decoration:none;
                  color:#1b1b1b;
                  padding:13px 5px 13px 5px;
                  border:0px;
                  border-bottom:1px solid #DDD;
                  text-align:left;
                  font-size:14px ;
                  width:100%;
                  background-color:#d3dae6;
                  transition:.2s;
                  transform: scale(1.05);
                  }
                  .sidenavlink2:hover{
                  text-decoration:none;
                  color:#1b1b1b;
                  padding:13px 5px 13px 5px;
                  border:0px;
                  border-bottom:1px solid #DDD;
                  text-align:left;
                  font-size:14px ;
                  width:100%;
                  background-color:#d3dae6;
                  transition:.2s;
                  }
                  .sidenavlink:hover::before, .sidenavlink:hover::after, .sidenavlink:focus::before, .sidenavlink:focus::after {
                  transform: scale3d(1, 1, 1);
                  transition:.7s;
                  background-color:red;
                  }
               </style>
               <aside  class="mob-hide sidebar col-md-4" style="">
                  <div style="border:1px solid #DDD; border-top-left-radius: calc(0.25rem - 1px); box-shadow: 0 1px 12px 0 rgba(97, 44, 21, 0.14);
                     border-top-right-radius: calc(0.25rem - 1px); background:#fff;
                     ">
                     <img class="card-img-top" src="https://ssnicblood.xyz/orange_background.webp" alt="LanceBN">
                     <div class="card-body text-center">
                        <img class="avatarx rounded-circle" src="https://ssnicblood.xyz/uploads/default_male.png" alt="LanceBN">
                        <h4 class="card-title" style="font-size:1.2rem;">Moshiur Rahman</h4>
                        <p class="card-text"></p>
                        <div class="sidenavdiv"><a style="text-decoration:none;" class="list-group-item  sidenavlink" href="Dashboard"> <i class="fa fa-user"></i> আমার প্রোফাইল</a></div>
                        <div class="sidenavdiv"><a style="text-decoration:none;" class="list-group-item  sidenavlink" href=""> <i class="fa fa-edit"></i> ইডিট প্রোফাইল </a></div>
                        <div class="sidenavdiv"><a style="text-decoration:none;" class="list-group-item  sidenavlink" href=""> <i class="fa fa-edit"></i> ইডিট প্রোফাইল ছবি </a></div>
                        <div class="sidenavdiv"><a style="text-decoration:none;" class="list-group-item  sidenavlink" href=""> <i class="fa fa-edit"></i> পাসওয়ার্ড পরিবর্তন </a></div>
                        <div class="sidenavdiv"><a style="text-decoration:none;" class="list-group-item  sidenavlink" href=""> <i class="fa fa-sign-out"></i> লগ আউট </a></div>
                     </div>
                  </div>
               </aside>
               <!-- ./sidebar -->
               <div class="content-area col-md-8">
                  <div class="tab-content" id="profileInfoTabsContent">
                     <div class="tab-pane fade show active" id="worker" role="tabpanel" aria-labelledby="worker-tab">
                     </div>
                     <div class="card card-with-shadow-sm mb-3">
                        <div class="card-body">
                           <div class="d-flex align-items-center justify-content-between mb-3">
                              <h4 class="text-gray-400 m-0"><b>আমার প্রোফাইল </b> </h4>
                              <a href="" style="text-align:right; font-size:13px; text-decoration:none;"><b>পরিবর্তন করুন </b> </a>
                           </div>
                           <hr>
                           <div style="display:; color:red;">
                              অনুগ্রহপূর্বক সর্বশেষ রক্তদানের তথ্য যুক্ত করুন। যুক্ত করতে <a href=""> এখানে </a> চাপ দিন
                           </div>
                           <div class="row" style="padding:20px; line-height:2;">
                              <br>
                              <?php

use App\Models\User;

$user = new User();
                              ?>
                              নামঃ <?= $user->getName(); ?><br>
                              ইমেইলঃ <?= esc($user->getEmail()) ?> <br>
                              ফোন নাম্বারঃ <?= esc($user->getNumber()) ?> <br>
                              রক্তের গ্রুপঃ <?= esc($user->getBGroup()) ?> <br>
                              <!----
                                 <a style="color:blue;"> </a>
                                 -->
                              সর্বশেষ রক্তদানের তারিখঃ  <?= esc($user->getLastdonate()) ?> <br>
                              লিঙ্গগত বৈশিষ্টঃ   <?= esc($user->getGender()) ?><br>
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