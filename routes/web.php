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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

// Home
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/site/home', 'HomeController@index')->name('home');


// MAIN MENU
Route::get('/site/blog', 'BlogController@index')->name('blog');
Route::get('/site/faq', 'FaqController@index')->name('faq');
Route::get('/site/equipe', 'EquipeController@index')->name('equipe');
Route::get('/site/contact', 'ContactController@index')->name('contact');

// CONTCAT
Route::post('contactsite', 'ContactController@contactsite')->name('contactsite');

// BLOG
Route::get('/site/article', 'BlogController@article')->name('article');
Route::post('commente', 'BlogController@commente')->name('commente');


// PROFIL
Route::post('inscription', 'ProfilController@inscription')->name('inscription');
Route::post('connexion', 'ProfilController@connexion')->name('connexion');
Route::post('updateprofil', 'ProfilController@updateprofil')->name('updateprofil');
Route::get('deconnexion', 'ProfilController@deconnexion')->name('deconnexion');
Route::post('contactprofil', 'ProfilController@contactprofil')->name('contactprofil');
Route::get('/site/profil', 'ProfilController@index')->name('profil');
Route::get('/site/profiledit', 'ProfilController@profiledit')->name('profiledit');

// RENCONTRE
Route::post('createrencontre', 'ProfilController@createrencontre')->name('createrencontre');
Route::get('/site/profilrencontre', 'ProfilController@profilrencontre')->name('profilrencontre');
Route::post('updaterencontre', 'ProfilController@updaterencontre')->name('updaterencontre');



// AJAX
Route::get('search/autocompleteVille', 'HomeController@autocompleteVille')->name('autocompleteVille');
Route::get('search/autocompleteVilleAccueil', 'HomeController@autocompleteVilleAccueil')->name('autocompleteVilleAccueil');
Route::get('search/autocompleteEtablissementAccueil', 'HomeController@autocompleteEtablissementAccueil')->name('autocompleteEtablissementAccueil');
Route::get('search/autocompleteCodePostalAccueil', 'HomeController@autocompleteCodePostalAccueil')->name('autocompleteCodePostalAccueil');
Route::get('search/autocompleteMembreAccueil', 'HomeController@autocompleteMembreAccueil')->name('autocompleteMembreAccueil');

// Facebook API
Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');


