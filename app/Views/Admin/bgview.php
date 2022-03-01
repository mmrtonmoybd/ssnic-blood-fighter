<?= $this->extend('App\Views\App\admin') ?>
<?= $this->section('main') ?>
<div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Show blood request</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href=""><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item">Blood request</li>
          <li class="breadcrumb-item"><a href="<?= base_url(route_to('admin.blood.request.show', $bgreq->id)) ?>">Show blood request</a></li>
        </ul>
      </div>



 <div class="row">
 <div class="col-md-12">
                              <br>
                              <?php

                              ?>
                              <div class="tile">
            <div class="tile-body">
                 Request by: <a href="<?= base_url(route_to('admin.users.view', $bgreq->user_id)) ?>"><?= esc(trim($bgreq->fullname)) ?></a><br>
                              Donate by: <a href="<?= base_url(route_to('admin.users.view', $bgreq->donor)) ?>"><?= esc($bgreq->donorname) ?></a> <br>
                              Managed by:  <a href="<?= base_url(route_to('admin.users.view', $bgreq->manage_by)) ?>"><?= esc($bgreq->managername) ?></a> <br>
                              Blood group: <?= esc($bgreq->bgroup) ?> <br>
                              Donation place: <?= esc($bgreq->donateplace) ?> <br>
                              Refarence: <?= esc($bgreq->refarence) ?> <br>
                              Status: <?= ($bgreq->status === true) ? 'Managed' : 'Not managed' ?> <br>
                              Requested at: <?= esc($bgreq->created_at) ?> <br>

                              Deatail: <br>
                              <p><?php $typography = \Config\Services::typography();
                              $string              = $typography->autoTypography($bgreq->details);
                              echo $string; ?></p>
            </div>
          </div>

                           </div>
 </div>
 <?= $this->endSection() ?>