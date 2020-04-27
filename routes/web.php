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

//ImageUploader
// Route::get('image/upload','ImageUploadController@fileCreate');
// Route::post('image/upload/store','ImageUploadController@fileStore');
// Route::post('image/delete','ImageUploadController@fileDestroy');

Route::get('/uploadfile', 'UploadfileController@index');
Route::post('/uploadfile', 'UploadfileController@upload');

Route::get('projects/file', 'ProjectsController@index');
Route::post('projects/media//{media}', 'ProjectsController@media')->name('projects.media');
Route::post('projects/media', 'ProjectsController@storeMedia')->name('projects.storeMedia');
Route::post('projects/media/salvar', 'ProjectsController@update')->name('projects.store');

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
	//Pesquisa de cursos
	Route::any('/cursos-search', 'Cadastros\CursoController@search')->name('cursos-search');

	//Módulos
	Route::resource('modulos', 'Cadastros\ModuloController');
	//Pesquisa de módulos
	Route::any('/modulos-search', 'Cadastros\ModuloController@search')->name('modulos-search');

	//Instrutores
	Route::resource('instrutores', 'Cadastros\InstrutorController');
	//Pesquisa de módulos
	Route::any('/instrutor-search', 'Cadastros\InstrutorController@search')->name('instrutor-search');
	Route::any('/file-upload', 'Cadastros\InstrutorController@storeMedia')->name('modulos.file-upload');
});