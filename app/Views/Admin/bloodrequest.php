<?= $this->extend('App\Views\App\admin') ?>
<?= $this->section('pageSeo') ?>
<title>All blood request</title>
<?= $this->endSection() ?>
<?= $this->section('main') ?>
<div class="app-title">
        <div>
          <h1><i class="fa fa-newspaper-o"></i> All blood request</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item active">All blood request</li>
        </ul>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="tile">
             <div class="tile-title-w-btn">
              <h3 class="title">All blood request</h3>
              <p><a class="btn btn-primary icon-btn" href="<?= base_url(route_to('admin.blood.request.add')) ?>"><i class="fa fa-plus"></i> Add blood request</a></p>
            </div>
            <div class="tile-body">
              <?= view('App\Admin\Main\_message') ?>

              <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped" id="usersTable">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Request by</th>
                      <th>Blood group</th>
                      <th>Donate place</th>
                      <th>Donate by</th>
                      <th>Manage by</th>
                      <th>Refarence</th>
                      <th>Status</th>
                      <th>Updated at</th>
                      <th>Created at</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                      <?php

                      function getStatus($status)
                      {
                          if ($status !== 'true') {
                              return '<p class="btn btn-info">Not managed</p>';
                          }

                          return '<p class="btn btn-danger">Managed</p>';
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
                      <?php foreach ($bloodreqs as $bloodreq) { ?>
                      <tr>
                      <td><?= $bloodreq->id ?></td>
                      <td><?= esc(trim($bloodreq->fullname)) ?></td>
                      <td><?= esc($bloodreq->bgroup) ?></td>
                      <td><?= esc($bloodreq->donateplace) ?></td>
                      <td><?= esc($bloodreq->donorname) ?></td>
                      <td><?= esc($bloodreq->managername) ?></td>
                      <td><?= esc($bloodreq->refarence) ?></td>
                      <td><?= getStatus($bloodreq->status) ?></td>
                      <td><?= getLastdonhuman($bloodreq->updated_at) ?></td>
                      <td><?= getLastdonhuman($bloodreq->created_at) ?></td>
                      <td>
                        <div class="btn-group">
                        <a class="btn btn-primary" href="<?= base_url(route_to('admin.blood.request.show', (int) $bloodreq->id)) ?>"><i class="fa fa-lg fa-eye"></i></a>
                        <a class="btn btn-primary" href="<?= base_url(route_to('admin.blood.request.update', $bloodreq->id)) ?>"><i class="fa fa-lg fa-edit"></i></a>
                        <a class="btn btn-primary" href="<?= base_url(route_to('admin.blood.request.delete', $bloodreq->id)) ?>"><i class="fa fa-lg fa-trash"></i></a>
                      </div>
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