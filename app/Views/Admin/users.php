<?= $this->extend('App\Views\App\admin') ?>
<?= $this->section('main') ?>
<div class="app-title">
        <div>
          <h1><i class="fa fa-newspaper-o"></i> All users</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item active">All users</li>
        </ul>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="tile">
             <div class="tile-title-w-btn">
              <h3 class="title">All users</h3>
            </div>
            <div class="tile-body">
              <?= view('App\Admin\Main\_message') ?>

              <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped" id="usersTable">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Full name</th>
                      <th>Blood Group</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Last donation</th>
                      <th>Phone number</th>
                      <th>Home address</th>
                      <th>Role</th>
                      <th>Status</th>
                      <th>Created At</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                      <?php
                      function getGroup($name, $id)
                      {
                          $db  = \Config\Database::connect();
                          $get = $db->table('auth_groups') - where('name', $name)->get();

                          return $db->table('auth_groups') - where('name', $name)->get();
                      }
                      function getRole(int $id)
                      {
                          if ($authorize->inGroup('admin', $id)) {
                              return '<p class="btn btn-danger">Admin</p>';
                          }
                          if ($authorize->inGroup('contributor', $id)) {
                              return '<p class="btn btn-warning">Contributor</p>';
                          }

                          return '<p class="btn btn-info">Donor</p>';
                      }

                      function isBanned($user)
                      {
                          if (isset($user->status) && $user->status === 'banned') {
                              return '<p class="btn btn-danger">Ban</p>';
                          }

                          return '<p class="btn btn-success">Unban</p>';
                      }
                      ?>
                      <?php foreach ($users as $user) { ?>
                      <tr>
                      <td><?= $user->id ?></td>
                      <td><?= esc(trim(trim($user->firstname) . ' ' . trim($user->lastname))) ?></td>
                      <td><?= $user->bgroup ?></td>
                      <td><?= $user->username ?></td>
                      <td><?= $user->email ?></td>
                      <td><?= (null !== $user->lastdonate) ? $user->lastdonate : 'Never donate yet' ?></td>
                      <td><?= $user->phonenumber ?></td>
                      <td><?= $user->haddress ?></td>
                      <td></td>
                      <td><?= isBanned($user) ?></td>
                      <td><?= $user->created_at ?></td>
                      <td><div class="btn-group"><a class="btn btn-primary" href=''><i class="fa fa-lg fa-eye"></i></a><a class="btn btn-primary" href=""><i class="fa fa-lg fa-edit"></i></a><a class="btn btn-primary" href=""><i class="fa fa-lg fa-trash"></i></a></div></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
<?= $this->endSection() ?>
<?= $this->section('pageScripts') ?>
<!-- Data table plugin-->
    <script type="text/javascript" src="<?= base_url('backend/js/plugins/jquery.dataTables.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('backend/js/plugins/dataTables.bootstrap.min.js') ?>"></script>
    <script type="text/javascript">$('#usersTable').DataTable();</script>
<?= $this->endSection() ?>