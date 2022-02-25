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
    });
});

// Admin Router

$routes->group('admin', ['filter' => 'role:admin', 'namespace' => 'App\Controllers\Admin'], static function ($routes) {
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
