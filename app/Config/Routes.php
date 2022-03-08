<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Frontend\Home::index');

$routes->get('test', 'Test::index');

$routes->get('page/(:num)', 'Frontend\PageController::index/$1', ['as' => 'page']);

// Frontend Router

$routes->group('user', ['filter' => 'login', 'namespace' => 'App\Controllers\Frontend'], static function ($routes) {
    $routes->get('dashboard', 'Profile::index', ['as' => 'dashboard']);

    $routes->get('profileupdate', 'Profile::updateShow', ['as' => 'profileupdate']);
    $routes->post('profileupdate', 'Profile::update');

    $routes->get('passwordchange', 'Profile::showPasswordcng', ['as' => 'passwordChange']);
    $routes->post('passwordchange', 'Profile::passwordChng');

    $routes->get('lastblooddonate', 'Profile::showLastdon', ['as' => 'lastDonup']);
    $routes->post('lastblooddonate', 'Profile::lastDonup');

    $routes->group('', ['filter' => 'role:admin,contributor', 'namespace' => 'App\Controllers\Frontend'], static function ($routes) {
        $routes->get('bloodrequest', 'Profile::showBloodRequest', ['as' => 'bloodrequest']);
        $routes->post('bloodrequest', 'Profile::attempBloodRequest');
        $routes->get('manage', 'Profile::manage', ['as' => 'BloodManage']);
        $routes->get('manageview/(:num)', 'Profile::mview/$1', ['as' => 'BloodManageView']);
    });
    $routes->get('donate', 'Profile::donate', ['as' => 'BloodDonate']);
    $routes->get('donateview/(:num)', 'Profile::dview/$1', ['as' => 'BloodDonateView']);
});

// Admin Router

$routes->group('admin', ['filter' => 'role:admin,sadmin', 'namespace' => 'App\Controllers\Admin'], static function ($routes) {
    $routes->get('dashboard', 'Dashboard::index', ['as' => 'admin.dashboard']);

    $routes->get('users', 'UserSector::index', ['as' => 'admin.users']);

    $routes->get('users/update/(:num)', 'UserSector::updateShow/$1', ['as' => 'admin.users.update']);
    $routes->post('users/update/(:num)', 'UserSector::update/$1');

    $routes->get('users/delete/(:num)', 'UserSector::delete/$1', ['as' => 'admin.users.delete']);

    $routes->get('users/view/(:num)', 'UserSector::viewUser/$1', ['as' => 'admin.users.view']);

    $routes->get('users/admin', 'UserSector::adminUsers', ['as' => 'admin.users.admin']);

    $routes->get('users/banlist', 'UserSector::banList', ['as' => 'admin.users.banlist']);

    $routes->get('users/activedonors', 'UserSector::avilableDonors', ['as' => 'admin.users.activedonors']);

    $routes->get('blood/request', 'BloodRequestVontroller::index', ['as' => 'admin.blood.request']);

    $routes->get('blood/request/update/(:num)', 'BloodRequestVontroller::updateShow/$1', ['as' => 'admin.blood.request.update']);
    $routes->post('blood/request/update/(:num)', 'BloodRequestVontroller::update/$1');

    $routes->get('blood/request/add', 'BloodRequestVontroller::addShow', ['as' => 'admin.blood.request.add']);
    $routes->post('blood/request/add', 'BloodRequestVontroller::add');

    $routes->get('blood/request/delete/(:num)', 'BloodRequestVontroller::delete/$1', ['as' => 'admin.blood.request.delete']);

    $routes->get('blood/request/show/(:num)', 'BloodRequestVontroller::show/$1', ['as' => 'admin.blood.request.show']);

    $routes->group('', ['filter' => 'role:sadmin', 'namespace' => 'App\Controllers\Admin'], static function ($routes) {
           $routes->get('pages', 'PageController::index', ['as' => 'admin.page.index']);
           $routes->get('pages/update/(:num)', 'PageController::show/$1', ['as' => 'admin.page.update']);
           $routes->post('pages/update/(:num)', 'PageController::update/$1');

           $routes->get('seo', 'SeoController::index', ['as' => 'admin.seo.index']);
           $routes->get('seo/update/(:num)', 'SeoController::show/$1', ['as' => 'admin.seo.update']);
           $routes->post('seo/update/(:num)', 'SeoController::update/$1');

           $routes->get('setting', 'SeetingController::index', ['as' => 'admin.setting.index']);
           $routes->post('setting', 'SeetingController::update');
    });

    
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
