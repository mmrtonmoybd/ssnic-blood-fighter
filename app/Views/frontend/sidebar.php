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
               <aside  class="mob-hide sidebar col-md-4">
                  <div style="border:1px solid #DDD; border-top-left-radius: calc(0.25rem - 1px); box-shadow: 0 1px 12px 0 rgba(97, 44, 21, 0.14);
                     border-top-right-radius: calc(0.25rem - 1px); background:#fff;
                     ">
                     <img class="card-img-top" src="<?= base_url('photos/orange_background.webp') ?>" alt="LanceBN">
                     <div class="card-body text-center">
                        <img class="avatarx rounded-circle" src="<?= empty(user()->pphoto) ? base_url('photos/default_male.png') : base_url(user()->pphoto) ?>" alt="LanceBN">
                        <h4 class="card-title" style="font-size:1.2rem;"><?= esc(trim(trim(user()->firstname) . ' ' . trim(user()->lastname))) ?> (<font color="red"><b><?= $role ?></b></font>)</h4>
                        <p class="card-text"></p>
                        <div class="sidenavdiv"><a style="text-decoration:none;" class="list-group-item  sidenavlink" href="<?= route_to('dashboard') ?>"> <i class="fa fa-user"></i> আমার প্রোফাইল</a></div>
                        <div class="sidenavdiv"><a style="text-decoration:none;" class="list-group-item  sidenavlink" href="<?= route_to('profileupdate') ?>"> <i class="fa fa-edit"></i> ইডিট প্রোফাইল </a></div>
                        <div class="sidenavdiv"><a style="text-decoration:none;" class="list-group-item  sidenavlink" href="<?= route_to('lastDonup') ?>"> <i class="fa fa-edit"></i> ইডিট সর্বশেষ রক্তদান </a></div>
                        <div class="sidenavdiv"><a style="text-decoration:none;" class="list-group-item  sidenavlink" href="<?= route_to('passwordChange') ?>"> <i class="fa fa-edit"></i> পাসওয়ার্ড পরিবর্তন </a></div>
                        <div class="sidenavdiv"><a style="text-decoration:none;" class="list-group-item  sidenavlink" href="<?= base_url('logout') ?>"> <i class="fa fa-sign-out"></i> লগ আউট </a></div>
                     </div>
                  </div>
               </aside>