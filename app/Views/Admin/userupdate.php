<?= $this->extend('App\Views\App\admin') ?>
<?= $this->section('main') ?>
<div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Update user</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href=""><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item"><a href="<?= base_url(route_to('admin.users.update', $user->id)) ?>">User update</a></li>
        </ul>
      </div>
	  
	  <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-12">
              <?= view('App\Admin\Main\_message') ?>

                <form action="<?= base_url(route_to('admin.users.update', $user->id)) ?>" method="POST">
                <?= csrf_field() ?>
				        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control <?php if (session('errors.firstname')) : ?>is-invalid<?php endif ?>"
                                   name="firstname" aria-describedby="firstnameHelp" placeholder="First Name" value="<?= old('firstname') ?: esc($user->firstname) ?>" required>

                        </div>

                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control <?php if (session('errors.lastname')) : ?>is-invalid<?php endif ?>"
                                   name="lastname" aria-describedby="lastnameHelp" placeholder="Last Name" value="<?= old('lastname') ?: esc($user->lastname) ?>" required>

                        </div>

                        <div class="form-group">
                            <label for="lastname">Email</label>
                            <input type="text" class="form-control " aria-describedby="emailHelp" placeholder="Email" value="<?= esc($user->email) ?>" disabled>

                        </div>

                        <div class="form-group">
                            <label for="lastname">Username</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Username" value="<?= esc($user->username) ?>" disabled>

                        </div>

                        <div class="form-group">
                            <label for="phonenumber">Phone Number</label>
                            <input type="text" class="form-control " placeholder="Phone Number" value="<?= esc($user->phonenumber) ?>" disabled>
                      
                        </div>

                         <div class="form-group">
                            <label for="haddress">Home Address</label>
                            <textarea type="text" class="form-control"  placeholder="Home Address" disabled><?= esc($user->haddress) ?></textarea>
                        </div>

                      <div class="form-group">
                            <label for="email">Role</label>
                            <select name="role"  class="form-control <?php if (session('errors.role')) : ?>is-invalid<?php endif ?>" required>
                                       <option  value="donor" <?php (old('role') === 'donor' || $authorize->inGroup('donor', $user->id)) ? print('selected') : '' ?>>Donor</option>
                                       <option  value="contributor" <?php (old('role') === 'contributor' || $authorize->inGroup('contributor', $user->id)) ? print('selected') : '' ?>>Contributor</option>
                                       <option  value="admin" <?php (old('role') === 'admin' || $authorize->inGroup('admin', $user->id)) ? print('selected') : '' ?>>Admin</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="email">Status</label>
                            <select name="status"  class="form-control <?php if (session('errors.role')) : ?>is-invalid<?php endif ?>" required>
                                       <option  value="banned" <?php (old('status') === 'banned' || $user->status === 'banned') ? print('selected') : '' ?>>Ban</option>
                                       <option  value="unbanned" <?php (old('status') === 'unbanned' || empty($user->status)) ? print('selected') : '' ?>>Unban</option>
                            </select>
                        </div>
                      
					  <div class="tile-footer">
              <button class="btn btn-primary" type="submit">Save</button>
            </div>
                </form>
              </div>
            </div>
			
			
          </div>
        </div>
      </div>
<?= $this->endSection() ?>