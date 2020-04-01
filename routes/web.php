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

Route::get('/', function() {
	return redirect('painel/login');
});

Route::prefix('painel')->group(function(){

	// Painel Administrativo
	Route::get('/', 'Admin\HomeController@index')->name('admin');

	// Login
	Route::get('login', 'Admin\Auth\LoginController@index')->name('login');
	Route::post('login', 'Admin\Auth\LoginController@authenticate');

	// Página de Registro
	Route::get('register', 'Admin\Auth\RegisterController@index')->name('register');
	Route::post('register', 'Admin\Auth\RegisterController@register');

	// Logout
	Route::post('logout', 'Admin\Auth\LoginController@logout')->name('logout');

	// CRUD Usuários
	Route::resource('users', 'Admin\UserController');

	// Clientes
	Route::resource('clients', 'Cadastros\ClientController');

	// Página Meu Perfil
	Route::get('profile', 'Admin\ProfileController@index')->name('profile');
	Route::put('profilesave', 'Admin\ProfileController@save')->name('profile.save');

	//Configurações do Site
	Route::get('settings', 'Admin\SettingController@index')->name('settings');
	Route::put('settingssave', 'Admin\SettingController@save')->name('settings.save');

	//Pesquisa de Clientes
	Route::any('/search', 'Cadastros\ClientController@search')->name('search');
	Route::post('clientes/busca-municipio', 'Cadastros\ClientController@buscarMunicipios')->name('cliente.buscar-municipios');
	
	//Cursos
	Route::resource('cursos', 'Cadastros\CursoController');

	//Módulos
	Route::resource('modulos', 'Cadastros\ModuloController');
	//Pesquisa de módulos
	Route::any('/modulos-search', 'Cadastros\ModuloController@search')->name('modulos-search');

});