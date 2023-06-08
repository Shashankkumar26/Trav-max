<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('CustomerFront');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'CustomerFront::index');

$routes->get('services', 'Page::services');
$routes->get('packages', 'Page::packages');
$routes->get('regis', 'Page::regis');
$routes->get('about', 'Page::about');
$routes->get('testimonials', 'Page::testimonials');
$routes->get('partner', 'Page::partner');
$routes->get('terms_of_use', 'Page::terms_of_use');
$routes->get('contact_us', 'Page::contact_us');
$routes->get('signup', 'Page::signup');
$routes->get('plans', 'Page::plans');
$routes->get('micro_plans', 'Page::micro_plans');
$routes->get('mega', 'Page::mega');
$routes->get('logout', 'User::logout');
$routes->match(['get', 'post'],'feedback', 'Page::feedback');
$routes->match(['get', 'post'],'invite_friend/(:any)', 'Page::invite_friend/$1');


// Admin Dashboard
$routes->post('login', 'User::validate_credentials');
$routes->post('register', 'User::create_member');
$routes->get('admin', 'Profile::index');
$routes->get('admin/logout', 'User::logout');
$routes->get('admin/start', 'Profile::start');
$routes->get('admin/select_package', 'Profile::select_package');
$routes->get('admin/package', 'Profile::package');
$routes->get('admin/select_plan', 'Profile::select_plan');
$routes->match(['get', 'post'],'admin/confirm_plan', 'Profile::confirm_plan');
$routes->get('admin/package_selected_successfully', 'Profile::package_selected_successfully');
$routes->match(['get', 'post'],'admin/request-fund', 'Profile::request_fund');
$routes->get('admin/kyc', 'Profile::kyc');

/*Distributor Level Information*/
$routes->match(['get', 'post'],'admin/DistributorLevelInformation', 'DistributorLevelInformation::index');

/*Installments*/
$routes->get('admin/installments', 'Profile::installments');



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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
