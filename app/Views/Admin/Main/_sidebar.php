<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= empty(user()->pphoto) ? base_url('photos/default_male.png') : base_url(user()->pphoto) ?>" alt="User Image" width="50" height="50">
        <div>
          <p class="app-sidebar__user-name"><?= esc(trim(trim(user()->firstname) . ' ' . trim(user()->lastname))) ?></p>
          <p class="app-sidebar__user-designation"><?php
                                       $authorize = service('authorization');
                                       if ($authorize->inGroup('sadmin', user()->id)) {
                                       ?>Super Admin<?php } else { echo 'Admin'; } ?></p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item <?= (url_is(route_to('admin.dashboard'))) ? 'active' : '' ?>" href="<?= base_url(route_to('admin.dashboard')) ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview"><a class="app-menu__item <?= (url_is(route_to('admin.users')) || url_is('admin/users/update/*') || url_is('admin/users/view/*') || url_is('admin.users.banlist') || url_is('admin.users.activedonors')) ? 'active' : '' ?>" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa fa-users"></i><span class="app-menu__label">Users</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?= base_url(route_to('admin.users')) ?>"><i class="icon fa fa-circle-o"></i> All users</a></li>
            <li><a class="treeview-item " href="<?= base_url(route_to('admin.users.activedonors')) ?>"><i class="icon fa fa-circle-o"></i> Active donors</a></li>
            <li><a class="treeview-item " href="<?= base_url(route_to('admin.users.banlist')) ?>"><i class="icon fa fa-circle-o"></i> Ban users</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item <?= (url_is(route_to('admin.blood.request')) || url_is('blood/request/update/*') || url_is('blood/request/add/*') || url_is('blood/request/show/*')) ? 'active' : '' ?>" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-medkit"></i><span class="app-menu__label">Blood request</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?= base_url(route_to('admin.blood.request')) ?>"><i class="icon fa fa-circle-o"></i> All request</a></li>
            <li><a class="treeview-item " href="<?= base_url(route_to('admin.blood.request.add')) ?>"><i class="icon fa fa-circle-o"></i> Blood request add</a></li>

          </ul>
        </li>
        <?php
        if ($authorize->inGroup('sadmin', user()->id)) {
        ?>
        <li><a class="app-menu__item <?= (url_is(route_to('admin.page.index')) || url_is('admin/pages/update/*')) ? 'active' : '' ?>" href="<?= base_url(route_to('admin.page.index')) ?>"><i class="app-menu__icon fa fa-file-text-o"></i><span class="app-menu__label">Pages</span></a></li>
        <li><a class="app-menu__item <?= (url_is(route_to('admin.seo.index')) || url_is('admin/seo/update/*')) ? 'active' : '' ?>" href="<?= base_url(route_to('admin.seo.index')) ?>"><i class="app-menu__icon fa fa-search"></i><span class="app-menu__label">Seo</span></a></li>
        <li><a class="app-menu__item <?= (url_is(route_to('admin.setting.index'))) ? 'active' : '' ?>" href="<?= base_url(route_to('admin.setting.index')) ?>"><i class="app-menu__icon fa fa-cog"></i><span class="app-menu__label">Settings</span></a></li>
        <?php } ?>
      </ul>
    </aside>