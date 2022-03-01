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

                     <div class="tile">
             <div class="tile-title-w-btn">
              <h3 class="title">Blood donate by me</h3>
            </div>
            <div class="tile-body">
                     <table class="table table-hover table-bordered" id="usersTable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Blood group</th>
                      <th>Manage by</th>
                      <th>Donate place</th>
                      <th>Refarence</th>
                      <th>Created at</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
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

                          return $human;
                      }

                       foreach ($datas as $data) { ?>
                    <tr>
                      <td><?= $data->id ?></td>
                      <td><?= $data->bgroup ?></td>
                      <td><?= $data->mname ?></td>
                      <td><?= $data->donateplace ?></td>
                      <td><?= $data->refarence ?></td>
                      <td><?= getLastdonhuman($data->created_at) ?></td>
                      <td>View</td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
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
<?= $this->section('pageScripts') ?>
<!-- Data table plugin-->
    <script type="text/javascript" src="<?= base_url('backend/js/plugins/jquery.dataTables.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('backend/js/plugins/dataTables.bootstrap.min.js') ?>"></script>
    <script type="text/javascript">$('#usersTable').DataTable();</script>
<?= $this->endSection() ?>