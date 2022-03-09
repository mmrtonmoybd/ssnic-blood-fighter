<?= $this->extend('App\Views\App\admin') ?>
<?= $this->section('pageSeo') ?>
<title>All pages</title>
<?= $this->endSection() ?>
<?= $this->section('main') ?>
<div class="app-title">
        <div>
          <h1><i class="fa fa-newspaper-o"></i> All pages</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item active">All pages</li>
        </ul>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="tile">
             <div class="tile-title-w-btn">
              <h3 class="title">All pages</h3>
            </div>
            <div class="tile-body">
              <?= view('App\Admin\Main\_message') ?>

              <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped" id="usersTable">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Slug</th>
                      <th>Page name</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                      <?php foreach ($datas as $data) { ?>
                      <tr>
                      <td><?= $data->id ?></td>
                      <td><?= esc($data->slug) ?></td>
                      <td><?= esc($data->pname) ?></td>
                      <td>
                        <div class="btn-group">
                        <a class="btn btn-primary" href="<?= base_url(route_to('page', $data->id)) ?>"><i class="fa fa-lg fa-eye"></i></a>
                        <a class="btn btn-primary" href="<?= base_url(route_to('admin.page.update', $data->id)) ?>"><i class="fa fa-lg fa-edit"></i></a>
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