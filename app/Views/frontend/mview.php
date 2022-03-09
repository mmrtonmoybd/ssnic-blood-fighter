<?= $this->extend('App\Views\App\layout') ?>
<?= $this->section('pageSeo') ?>
<title>Blood manage info</title>
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
                        <div class="card-body">
                           <hr>
                           <div class="row" style="padding:20px; line-height:2;">
                              <br>
                              <?php

                              function getLastdonhuman($date)
                              {
                                  $human = $date;
                                  if (null !== $date) {
                                      // use Time;
                                      //$time = \CodeIgniter\I18n\Time();
                                      $get = \CodeIgniter\I18n\Time::parse($date);

                                      return $get->humanize();
                                  }
                              }

                              ?>
                             Blood group: <?= esc($data->bgroup) ?> <br>
                              Donate place:  <?= esc($data->donateplace) ?> <br>
                              Referance: <?= esc($data->refarence) ?> <br>
                              Donor: <?= esc(trim(trim(user()->firstname) . ' ' . trim(user()->lastname))) ?> <br>
                              Manager: <?= esc($data->donor) ?><br>
                              Date: <?= getLastdonhuman($data->created_at) ?> <br>
                               Details:
                              <?php

                              use League\CommonMark\CommonMarkConverter;

$converter = new CommonMarkConverter([
    'html_input'         => 'strip',
    'allow_unsafe_links' => false,
]);

echo $converter->convert($data->details);
?>
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