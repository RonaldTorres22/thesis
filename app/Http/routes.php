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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    $data = [
        'page_title' => 'Home',

    ];
    return view('event/index', $data);
});

   


    // Authentication Routes...
    Route::get('login', 'Auth\AuthController@showLoginForm');
    Route::post('login', 'Auth\AuthController@login');
    Route::get('logout', 'Auth\AuthController@logout');

    // Registration Routes...
    //Route::get('register', 'Auth\AuthController@showRegistrationForm');
    //Route::post('register', 'Auth\AuthController@register');

    // Password Reset Routes...
    Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\PasswordController@reset');


    Route::resource('/organization', 'UserController');

   Route::get('/CSDO', 'CsdoController@index');
    Route::get('/home', 'HomeController@index');
    
    Route::resource('/admin', 'AdminEventController');
    Route::get('admin/{id}', 'AdminEventController@show');

    Route::resource('/OSA', 'OsaController');
    Route::get('OSA/{id}', 'OsaController@show');

    Route::post('approve/{id}','AdminEventController@approveEvent');
    Route::post('approveOSA/{id}','OsaController@approveEvent');

    Route::resource('events', 'EventController');
    Route::get('pending','EventController@pending');

   

    Route::post('addtodo/{id}', ['uses' => 'EventController@Addtodo', 'as' => 'add.todo']);

    Route::post('updatephone/{id}', ['uses' => 'CompanyController@updatePhone', 'as' => 'update.phone']);

    Route::get('deletetodo/{id}', ['uses' => 'EventController@deletetodo', 'as' => 'delete.todo']);


  


    Route::get('/api', function () {
    $events = DB::table('events')->select('id', 'name', 'title', 'start_time as start', 'end_time as end')->get();
    foreach($events as $event)
    {
        $event->title = $event->title . ' - ' .$event->name;
        $event->url = url('events/' . $event->id);
    }
    return $events;
    });


