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


// ------ PAINEL ------
Route::prefix('painel')->group(function(){

	// PAINEL ADMINISTRATIVO
	Route::get('/', 'Admin\HomeController@index')->name('admin');

	// REGISTRO
	Route::get('register', 'Admin\Auth\RegisterController@index')->name('register');
	Route::post('register', 'Admin\Auth\RegisterController@register');

	// LOGIN
	Route::get('login', 'Admin\Auth\LoginController@index')->name('login');
	Route::post('login', 'Admin\Auth\LoginController@authenticate');

	// LOGOUT
	Route::post('logout', 'Admin\Auth\LoginController@logout')->name('logout');

	// USUÁRIOS
	Route::resource('users', 'Admin\UserController');

	// MEU PERFIL
	Route::get('profile', 'Admin\ProfileController@index')->name('profile');
	Route::put('profilesave', 'Admin\ProfileController@save')->name('profile.save');

	// CONFIGURAÇÕES DO SITE
	Route::get('settings', 'Admin\SettingController@index')->name('settings');
	Route::put('settingssave', 'Admin\SettingController@save')->name('settings.save');

	// CLIENTES
	Route::resource('clients', 'Cadastros\ClientController');
	//Pesquisa de Clientes
	Route::any('/search', 'Cadastros\ClientController@search')->name('search');
	Route::post('clientes/busca-municipio', 'Cadastros\ClientController@buscarMunicipios')->name('cliente.buscar-municipios');
	
	// CURSOS
	Route::resource('cursos', 'Cadastros\CursoController');
	//Pesquisa de cursos
	Route::any('/cursos-search', 'Cadastros\CursoController@search')->name('cursos-search');

	// MÓDULOS
	Route::resource('modulos', 'Cadastros\ModuloController');
	// Pesquisa de módulos
	Route::any('/modulos-search', 'Cadastros\ModuloController@search')->name('modulos-search');
	// Pesquisa de módulos
	// Route::any('/instrutor-search', 'Cadastros\InstrutorController@search')->name('instrutor-search');
	// Route::any('/file-upload', 'Cadastros\InstrutorController@storeMedia')->name('modulos.file-upload');

	//Parâmetros
	Route::resource('parametros', 'Cadastros\ParametroController');

	//Instrutores
	Route::resource('instrutores', 'Cadastros\InstrutorController');
	// Assinatura
	// Route::get('/assinatura', 'AssinaturaController@index')->name('assinatura');
	// Route::post('/profile/update', 'AssinaturaController@updateProfile')->name('assinatura.update');

	// Assinatura
	// Route::get('image', 'AssinaturaController@index');
	// Route::post('save', 'AssinaturaController@save');

});

// Image
// Route::get('image', 'ImageController@index');
// Route::post('save', 'ImageController@save');