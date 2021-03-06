<?php

namespace Config;

use App\Controllers\Administrator;

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
$routes->setDefaultController('GeneralUser');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'GeneralUser::index');
$routes->get('logout', 'GeneralUser::logout');
$routes->get('suppliers', 'GeneralUser::suppliers');
$routes->get('shoppingcart', 'GeneralUser::shoppingcart');
$routes->get('adminHome', 'Administrator::home');
$routes->get('adminUsers', 'Administrator::displayUsers');
$routes->match(['get', 'post'],'browse', 'GeneralUser::browse');
$routes->match(['get', 'post'], 'login', 'GeneralUser::login'); 
$routes->match(['get', 'post'], 'register', 'GeneralUser::register');
$routes->match(['get', 'post'], 'drilldown/(:any)', 'GeneralUser::drilldown/$1');
$routes->match(['get', 'post'], 'addProduct', 'Administrator::addProduct');
$routes->match(['get', 'post'], 'adminDrilldown/(:any)', 'Administrator::drilldown/$1');
$routes->match(['get', 'post'], 'profile', 'GeneralUser::profile');
$routes->match(['get', 'post'], 'addToWishlist', 'GeneralUser::addToWishlist/$1/$2/$3');
$routes->match(['get', 'post'], 'addToShoppingCart/(:any)', 'GeneralUser::addToShoppingCart/$1/$2/$3');
$routes->match(['get', 'post'], 'viewOrders', 'Administrator::viewOrders');
$routes->match(['get', 'post'], 'viewCustOrders', 'GeneralUser::viewCustOrders');
$routes->match(['get', 'post'], 'viewOrderDetails/(:any)', 'Administrator::viewOrderDetails/$1');
$routes->match(['get', 'post'], 'viewOrderDetails/(:any)', 'GeneralUser::viewOrderDetails/$1');


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
