<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            <div class="card">
                <h2 class="card-header"><?=lang('Auth.register')?></h2>
                <div class="card-body">

                    <?= view('App\Auth\_message_block') ?>

                    <form action="<?= route_to('register') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control <?php if (session('errors.firstname')) : ?>is-invalid<?php endif ?>"
                                   name="firstname" aria-describedby="firstnameHelp" placeholder="First Name" value="<?= old('firstname') ?>" required>

                        </div>

                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control <?php if (session('errors.lastname')) : ?>is-invalid<?php endif ?>"
                                   name="lastname" aria-describedby="lastnameHelp" placeholder="Last Name" value="<?= old('lastname') ?>" required>

                        </div>

                        <div class="form-group">
                            <label for="email"><?=lang('Auth.email')?></label>
                            <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                                   name="email" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>" required>
                            <small id="emailHelp" class="form-text text-muted"><?=lang('Auth.weNeverShare')?></small>
                        </div>

                        <div class="form-group">
                            <label for="username"><?=lang('Auth.username')?></label>
                            <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?=lang('Auth.username')?>" value="<?= old('username') ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Blood Group</label>
                            <select name="bgroup"  class="form-control <?php if (session('errors.bgroup')) : ?>is-invalid<?php endif ?>" required>
                                       <option>Blood Group</option>
                                       <option  value="A+" <?php (old('bgroup') === 'A+') ? esc('selected') : '' ?>>A+</option>
                                       <option  value="B+" <?php (old('bgroup') === 'B+') ? esc('selected') : '' ?>>B+</option>
                                       <option  value="AB+" <?php (old('bgroup') === 'AB+') ? esc('selected') : '' ?>>AB+</option>
                                       <option  value="O+" <?php (old('bgroup') === 'O+') ? esc('selected') : '' ?>>O+</option>
                                       <option  value="O-" <?php (old('bgroup') === 'O-') ? esc('selected') : '' ?>>O-</option>
                                       <option  value="A-" <?php (old('bgroup') === 'A-') ? esc('selected') : '' ?>>A-</option>
                                       <option  value="B-" <?php (old('bgroup') === 'B-') ? esc('selected') : '' ?>>B-</option>
                                       <option  value="AB-" <?php (old('bgroup') === 'AB-') ? esc('selected') : '' ?>>AB-</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="email">Gender</label>
                            <select name="gender"  class="form-control <?php if (session('errors.gender')) : ?>is-invalid<?php endif ?>" required>
                                       <option>Gender</option>
                                       <option  value="male" <?php (old('bgroup') === 'male') ? esc('selected') : '' ?>>Male</option>
                                       <option  value="female" <?php (old('bgroup') === 'female') ? esc('selected') : '' ?>>Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="phonenumber">Phone Number</label>
                            <input type="text" class="form-control <?php if (session('errors.phonenumber')) : ?>is-invalid<?php endif ?>" name="phonenumber" placeholder="Phone Number" value="<?= old('phonenumber') ?>" required>
                                <small id="emailHelp" class="form-text text-muted">We'll never share your phone number with anyone else.</small>
                        </div>

                         <div class="form-group">
                            <label for="haddress">Home Address</label>
                            <textarea type="text" name="haddress" class="form-control <?php if (session('errors.haddress')) : ?>is-invalid<?php endif ?>"  placeholder="Home Address" required><?= old('haddress') ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="institute">Educational Institute</label>
                            <input type="text" class="form-control <?php if (session('errors.institute')) : ?>is-invalid<?php endif ?>" name="institute" placeholder="Educational Intitute" value="<?= old('institute') ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="batch">Batch</label>
                            <input type="text" class="form-control <?php if (session('errors.batch')) : ?>is-invalid<?php endif ?>" name="batch" placeholder="Batch-21" value="<?= old('batch') ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="lastdonate">Last Blood Donate (Optional)</label>
                            <input type="date" class="form-control <?php if (session('errors.lastdonate')) : ?>is-invalid<?php endif ?>" name="lastdonate" placeholder="Last Blood Donate" value="<?= old('lastdonate') ?>">
                        </div>

                        <div class="form-group">
                            <label for="password"><?=lang('Auth.password')?></label>
                            <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="pass_confirm"><?=lang('Auth.repeatPassword')?></label>
                            <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
                        </div>

                        <br>

                        <button type="submit" style="background-color: #bb0a1e; color: white;" class="btn btn-block"><?=lang('Auth.register')?></button>
                    </form>


                    <hr>

                    <p><?=lang('Auth.alreadyRegistered')?> <a href="<?= route_to('login') ?>"><?=lang('Auth.signIn')?></a></p>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>
