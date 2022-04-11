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
$routes->setDefaultController('LandingController');
$routes->setDefaultMethod('registration');
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
$routes->get('not-found', 'ErrorController::not_found');
$routes->get('/', 'LandingController::index');
$routes->get('login', 'LandingController::login');
$routes->post('login/process', 'LandingController::processLogin');
$routes->get('registration', 'LandingController::registration');
$routes->post('registration/store', 'LandingController::store');
$routes->get('logout', 'LandingController::logout');
$routes->get('profile', 'LandingController::profile');
$routes->get('about', 'LandingController::about');

$routes->get('dashboard', 'HomeController::index');
$routes->get('dashboard/getGrafikJenjang', 'HomeController::getGrafikJenjang');
$routes->get('dashboard/getGrafikAsalProvinsi', 'HomeController::getGrafikAsalProvinsi');
$routes->get('dashboard/getGrafikAsalKabupaten', 'HomeController::getGrafikAsalKabupaten');

$routes->get('user', 'UserController::index');
$routes->get('user/create', 'UserController::create');
$routes->post('user/store', 'UserController::store');
$routes->get('user/edit/(:alpha)', 'UserController::edit');
$routes->post('user/update', 'UserController::update');
$routes->get('user/reset-password/(:alpha)', 'UserController::resetPassword');
$routes->post('user/reset-password', 'UserController::storeResetPassword');
$routes->get('user/destroy', 'UserController::destroy');

$routes->get('payment', 'PaymentController::index');
$routes->post('payment/confirm', 'PaymentController::paymentConfirmation');

$routes->get('calon-siswa', 'CalonSiswaController::index');
$routes->post('calon-siswa/verify', 'CalonSiswaController::verify');
$routes->post('calon-siswa/process', 'CalonSiswaController::prosesPendaftaran');
$routes->get('pengumuman', 'CalonSiswaController::pengumuman');


$routes->get('student', 'StudentController::index');
$routes->get('student/profile', 'StudentController::profile');
$routes->get('student/profile/edit', 'StudentController::edit');
$routes->post('student/profile/update', 'StudentController::update');
$routes->get('student/registration', 'StudentController::registration');
$routes->post('student/registration/process', 'StudentController::processRegistration');
$routes->get('student/berkas', 'StudentController::berkas');
$routes->get('student/berkas/upload', 'StudentController::uploadBerkas');
$routes->post('student/berkas/reupload', 'StudentController::reuploadBerkas');
$routes->post('student/berkas/upload/process', 'StudentController::processUploadBerkas');
$routes->post('student/change-avatar', 'StudentController::changeAvatar');
$routes->get('student/payment', 'StudentController::payment');
$routes->post('student/payment/process', 'StudentController::processPayment');
$routes->post('student/payment/reupload', 'StudentController::reuploadPayment');


$routes->get('wilayah/getKabupaten', 'WilayahController::getKabupaten');
$routes->get('wilayah/getKecamatan', 'WilayahController::getKecamatan');
$routes->get('wilayah/getKelurahan', 'WilayahController::getKelurahan');

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
