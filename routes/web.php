<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//----------------------------IT ZA DECU POCETAK-------------------

Route::get('/', 'IndexController@index')->name('homepage');
Route::get('/baza-znanja', 'IndexController@baza')->name('baza');
Route::get('/baza-znanja/post-single/{post}', 'IndexController@bazaOnePost')->name('baza-single-post');
Route::get('/it-zanimljivosti', 'IndexController@zanimljivosti')->name('zanimljivosti');
Route::get('/it-zanimljivosti/post-single/{post}', 'IndexController@zanimljivostiOnePost')->name('zanimljivosti-single-post');

//----------------------------IT ZA DECU KRAJ----------------------


//----------------------------BAZA ZNANJA POCETAK--------------------

Route::any('/baza-znanja-kreiraj', 'BasesController@create')->name('baza-create'); 
Route::any('/baza-znanja-izmeni/{post}', 'BasesController@edit')->name('baza-edit');
Route::get('/baza-znanja-lista', 'BasesController@lista')->name('baza-lista');
Route::get('/baza-znanja-lista/active/{base}', 'BasesController@active')->name('baza-lista-active');
Route::get('/baza-znanja/delete/{id}', 'BasesController@delete')->name('baza-lista-delete');
Route::get('/baza-znanja-lista/preview/{post}', 'BasesController@preview')->name('baza-lista-preview');

//----------------------------BAZA ZNANJA KRAJ--------------------


//----------------------------ZANIMLJIVOSTI POCETAK-----------------
Route::any('/it-zanimljivosti/kreiraj', 'FactsController@create')->name('facts-create');
Route::get('/it-zanimljivosti/lista', 'FactsController@lista')->name('facts-lista');
Route::get('/it-zanimljivosti/preview/{post}', 'FactsController@preview')->name('facts-preview');
Route::get('/it-zanimljivosti/active/{base}', 'FactsController@active')->name('facts-active');
Route::any('/it-zanimljivosti/edit/{post}', 'FactsController@edit')->name('facts-edit');
Route::get('/it-zanimljivosti/delete/{id}', 'FactsController@delete')->name('facts-delete');



//----------------------------ZANIMLJIVOSTI KRAJ-----------------------


//----------------------------SERTIFIKATI PRETRAGA POCETAK--------------------------------------------------------

Route::any('/sertifikat-pretraga', 'SertifikatController@index')->name('sertifikat-pretraga');
Route::get('/sertifikati-lista/{studentId}/{jezik}/{broj}', 'SertifikatController@lista')->name('sertifikat-lista');
Route::get('/sertifikati-profesor/{profesor}/{jezik?}', 'SertifikatController@profesor')->name('sertifikat-profesor');
Route::get('/odrasli/{jezik?}/{broj}', 'SertifikatController@adults')->name('odrasli');
Route::get('/scratch/{jezik?}/{broj}', 'SertifikatController@scratch')->name('scratch');
Route::get('/deca/{jezik?}/{broj}', 'SertifikatController@deca')->name('deca');

//-----------------------------SERTIFIKATI PRETRAGA KRAJ-------------------------------------------------------



//  USERS - ROUTES START
Route::any('/users/login', 'UsersController@login')->name('users-login');
Route::get('/users/logout', 'UsersController@logout')->name('users-logout');
Route::any('/users/welcome', 'UsersController@welcome')->name('users-welcome');
Route::any('/users/create', 'UsersController@create')->name('users-create');
Route::get('/users', 'UsersController@index')->name('users');
Route::any('/users/edit/{user}', 'UsersController@edit')->name('users-edit');
Route::get('/users/delete/{user}', 'UsersController@delete')->name('users-delete');
Route::any('/users/change-password/{user}', 'UsersController@changePassword')->name('users-change-password');
//  USERS - ROUTES END 



//UCENICI - ROUTES START
Route::get('/students', 'StudentsController@index')->name('students');
Route::get('/students/datatable', 'StudentsController@datatable')->name('datatable');
Route::any('/students/create', 'StudentsController@create')->name('students-create');
Route::any('/students/edit/{student}', 'StudentsController@edit')->name('students-edit');
Route::get('/students/active/{student}', 'StudentsController@active')->name('students-active');
Route::get('/students/delete/{student}', 'StudentsController@delete')->name('students-delete');
//UCENICI - ROUTES END 


//PROFESORI - ROUTES START
Route::get('/teachers', 'TeachersController@index')->name('teachers');
Route::any('/teachers/create', 'TeachersController@create')->name('teachers-create');
Route::any('/teachers/edit/{teacher}', 'TeachersController@edit')->name('teachers-edit');
Route::get('/teachers/active/{teacher}', 'TeachersController@active')->name('teachers-active');
Route::get('/teachers/delete/{teacher}', 'TeachersController@delete')->name('teachers-delete');
//PROFESORI - ROUTES END 


//KURSEVI - ROUTES START
Route::get('/courses', 'CoursesController@index')->name('courses');
Route::any('/courses/create', 'CoursesController@create')->name('courses-create');
Route::any('/courses/edit/{course}', 'CoursesController@edit')->name('courses-edit');
Route::get('/courses/active/{course}', 'CoursesController@active')->name('courses-active');
Route::get('/courses/delete/{course}', 'CoursesController@delete')->name('courses-delete');
//KURSEVI - ROUTES END


//SERTIFIKATI - ROUTES START
Route::get('/certificates', 'CertificatesController@index')->name('certificates');
Route::get('/certificates/datatables', 'CertificatesController@datatables')->name('certificates.datatables');
Route::any('/certificates/create', 'CertificatesController@create')->name('certificates-create');
Route::any('/certificates/edit/{certificate}', 'CertificatesController@edit')->name('certificates-edit');
Route::get('/certificates/active/{certificate}', 'CertificatesController@active')->name('certificates-active');
Route::get('/certificates/delete/{id}', 'CertificatesController@delete')->name('certificates-delete');
//SERTIFIKATI - ROUTES END 


//KURS-PREDAVAC(schedules table) - ROUTES START
Route::get('/schedules', 'SchedulesController@index')->name('schedules');
Route::any('/schedules/create', 'SchedulesController@create')->name('schedules-create');
Route::any('/schedules/edit/{schedule}', 'SchedulesController@edit')->name('schedules-edit');
Route::get('/schedules/active/{schedule}', 'SchedulesController@active')->name('schedules-active');
Route::get('/schedules/delete/{id}', 'SchedulesController@delete')->name('schedules-delete');
//KURS-PREDAVAC(schedules table) - ROUTES END



//  PAGES - ROUTES START
Route::any('/pages/create', 'PagesController@create')->name('pages-create');
Route::get('/pages/{page?}', 'PagesController@index')->name('pages');
Route::any('/pages/edit/{page}', 'PagesController@edit')->name('pages-edit');
Route::get('/pages/active/{page}', 'PagesController@active')->name('pages-active');
Route::get('/pages/delete/{page}', 'PagesController@delete')->name('pages-delete');


//  PAGES - ROUTES START