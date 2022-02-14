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
                      function getRole(int $id)
                      {
                          $authorize = service('authorization');
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
                      ?>
                      <?php foreach ($users as $user) { ?>
                      <tr>
                      <td><?= $user->id ?></td>
                      <td><?= esc(trim(trim($user->firstname) . ' ' . trim($user->lastname))) ?></td>
                      <td><?= esc($user->bgroup) ?></td>
                      <td><?= esc($user->email) ?></td>
                      <td><?= esc(getLastdonhuman($user->lastdonate)) ?></td>
                      <td><?= esc($user->phonenumber) ?></td>
                      <td><?= esc($user->haddress) ?></td>
                      <td><?= getRole($user->id) ?></td>
                      <td><?= isBanned($user) ?></td>
                      <td><?= $user->created_at ?></td>
                      <td>
                      <?php if (user()->id !== $user->id) { ?>
                        <div class="btn-group">
                        <a class="btn btn-primary" href="<?= base_url(route_to('admin.users.view', $user->id)) ?>"><i class="fa fa-lg fa-eye"></i></a>
                        <a class="btn btn-primary" href="<?= base_url(route_to('admin.users.update', $user->id)) ?>"><i class="fa fa-lg fa-edit"></i></a>
                        <a class="btn btn-primary" href="<?= base_url(route_to('admin.users.delete', $user->id)) ?>"><i class="fa fa-lg fa-trash"></i></a>
                      </div>
                      <?php } ?>
                    </td>
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