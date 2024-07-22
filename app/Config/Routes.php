<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


 /////////////////////// LANDING /////////////////////////////////
 $routes->get('/', 'Landing::index');
 $routes->get('/index', 'Landing::index');
 $routes->get('/penjadwalan', 'Landing::penjadwalan');
 


 ///////////////////// GURU PENGGANTI ////////////////////////////
// $routes->get('/daftarguru', 'Landing::daftarguru');
$routes->get('/gurupengganti', 'Landing::gurupengganti');
$routes->get('/add_data_guru', 'Landing::add_data_guru');
$routes->post('/proses_add_guru', 'Landing::proses_add_guru');
$routes->get('/edit_data_guru/(:any)', 'Landing::edit_data_guru/$1');
$routes->get('/edit_gurupengganti/(:any)', 'Landing::edit_data_guru/$1');
$routes->get('/delete_guru/(:any)', 'Landing::delete_guru/$1');
$routes->post('/proses_edit_guru', 'Landing::proses_edit_guru');
$routes->get('/detail_gurupengganti/(:any)', 'Landing::detail_gurupengganti/$1');
$routes->get('/dashboard_gurupengganti', 'Landing::dashboard_gurupengganti');
 
////////////////////// MITRA SEKOLAH //////////////////////////////////
$routes->get('/daftarmitrasekolah', 'Landing::daftarmitrasekolah');
$routes->get('/mitrasekolah', 'Landing::mitrasekolah');
$routes->get('/detail_mitrasekolah/(:any)', 'Landing::detail_sekolah/$1');
$routes->get('/dashboard_mitrasekolah', 'Landing::dashboard_mitrasekolah');
$routes->get('/add_data_sekolah', 'Landing::add_data_sekolah');
$routes->post('/proses_add_sekolah', 'Landing::proses_add_sekolah');
$routes->get('/edit_data_mitrasekolah/(:any)', 'Landing::edit_data_mitrasekolah/$1');
$routes->get('/edit_mitrasekolah/(:any)', 'Landing::edit_mitrasekolah/$1');
$routes->post('/proses_edit_mitrasekolah', 'Landing::proses_edit_mitrasekolah');
$routes->get('/delete_mitrasekolah/(:any)', 'Landing::delete_mitrasekolah/$1');
$routes->get('/landing/detail_mitrasekolah/(:any)', 'Landing::detail_mitrasekolah/$1');
$routes->get('/detail_mitrasekolah/(:any)', 'Landing::detail_mitrasekolah/$1');
$routes->get('/detail_mitrasekolah', 'Landing::detail_mitrasekolah');
$routes->get('/download_foto/(:num)/(:any)', 'Landing::download_foto/$1/$2');




                             ///////// ADMIN ////////// 

///////////////////////////////// PENJADWALAN ADMIN ///////////////////////////
$routes->get('admin/penjadwalan_guru', 'Admin::penjadwalan_guru');
$routes->post('admin/save_jadwal', 'Admin::save_jadwal');
$routes->get('/edit_data_jadwal/(:any)', 'Admin::edit_data_jadwal/$1');
$routes->get('/edit_jadwal/(:any)', 'Admin::edit_data_jadwal/$1');
$routes->post('/proses_edit_jadwal', 'Admin::proses_edit_jadwal');
$routes->get('/delete_jadwal/(:any)', 'Admin::delete_jadwal/$1');
$routes->post('/proses_edit_jadwal', 'Admin::proses_edit_jadwal');


/////////////////////////// ADMIN GURU PENGGANTI //////////////////////////
$routes->get('admin/gurupengganti', 'Admin::gurupengganti');
$routes->get('/admin_delete_guru/(:any)', 'Admin::admin_delete_guru/$1');
$routes->get('/admin/detail_guru/(:any)', 'Admin::detail_guru/$1');
$routes->get('admin/view_pdf_iframe/(:num)/(:any)', 'Admin::view_pdf_iframe/$1/$2');
$routes->get('admin/download_pdf/(:num)/(:any)', 'Admin::download_pdf/$1/$2');


/////////////////////////// ADMIN MITRA SEKLAH ////////////////////////////
$routes->get('admin/mitrasekolah', 'Admin::mitrasekolah');
$routes->get('/admin_delete_mitrasekolah/(:any)', 'Admin::admin_delete_mitrasekolah/$1');
$routes->get('/admin/detail_mitrasekolah/(:any)', 'Admin::detail_mitrasekolah/$1');
$routes->get('admin/download_foto/(:num)/(:any)', 'Admin::download_foto/$1/$2');




/////////////////////////////////// lOGIN ADMIN /////////////////////////////
$routes->get('/login', 'Admin::login');
$routes->get('/register', 'Landing::register');
$routes->get('/', 'Admin::admin');
$routes->group('admin', ['namespace' => 'App\Controllers', 'filter' => 'login'], function($routes) {
    $routes->get('/', 'Admin::admin');
});






$routes->group('daftarguru', ['namespace' => 'App\Controllers', 'filter' => 'login_guru'], function ($routes) {
    $routes->get('/', 'Landing::daftarguru');
   
});





$routes->group('mitra', ['filter' => 'auth:mitra'], function ($routes) {
    $routes->get('dashboard', 'MitraController::index');
});





