<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

// Creer un controller WelcomeController avec php artisan make:controller WelcomeController
Route::get('/', 'WelcomeController@Index');

//Route::get('/home', 'HomeController@Index');

Route::get('salut', function(){

    return "Salut les amis";
});

Route::get('salut/{name}', function($name){

    return "Salut $name";
});

Route::get('article/{slug}-{id}', ['as' => 'article', function($slug, $id){
    return "Lien: ". route('article', ['slug'=> $slug, 'id'=> $id]);
    #return "Slug: $slug, - ID: $id";
}])->where('slug', '[a-z0-9\-]+')->where('id', '[0-9]+');

// Regrouper des routes
//http://localhost:8000/admin/user/seif

/*Route::group(['prefix' => 'admin'], function(){

    Route::get('user/{name}', function($name){

        return "Salut $name";
    });

});*/

// middleware des fonctions agissent sur les requétes se place entre la route et le code à exécuter
Route::group(['prefix' => 'admin', 'middleware' => 'ip'], function(){

    Route::get('user/{name}', function($name){

        return "Salut $name";
    });

});

Route::get('a-propos', ['as' => 'about', 'uses' => 'PagesController@about']);

// Darian debug, Couper le script et Deboguer les variables
//dd($route);

// Controller generate urls
//Route::controller('welcome', 'WelcomeController');

//Laravel : TP / Raccourcisseur d'URL
Route::resource('link', 'LinksController', ['only' => ['create', 'store']] );  // Route représente une structure REST
Route::get('r/{link}', ['as' => 'link.show', 'uses' => 'LinksController@show'])->where('link', '[0-9]+');


/*
Route::get('links/create', 'LinksController@create');
Route::post('links/create', 'LinksController@store'); // create after the form in view
Route::get('r/{id}', 'LinksController@show')->where('id', '[0-9]+');
*/

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

// Authentication routes...
/*Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');*/