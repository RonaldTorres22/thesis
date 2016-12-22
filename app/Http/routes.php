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

   Route::get('/notification', [
    'uses' => 'NotificationController@getNotification',
    'as' => 'notifdean'
]);

   Route::get('/notificationOsa', [
    'uses' => 'NotificationController@getNotificationosa',
    'as' => 'notifosa'
]);
   Route::get('/notificationUser', [
    'uses' => 'NotificationController@getNotificationuser',
    'as' => 'notifuser'
]);
   Route::get('/notificationVpaa', [
    'uses' => 'NotificationController@getNotificationvpaa',
    'as' => 'notifuser'
]);

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
    Route::resource('/accounts', 'SubAccountController');

    Route::get('/CSDO', 'CsdoController@index');
    Route::get('/home', 'HomeController@index');
    
    Route::resource('/admin', 'AdminEventController');
    Route::get('pendinglist', 'AdminEventController@pendinglist');
    Route::get('admin/{id}', 'AdminEventController@show');

    Route::resource('/OSA', 'OsaController');
    Route::get('OSA/{id}', 'OsaController@show');
    Route::get('approvelist', 'OsaController@approvelist');


    Route::post('approve/{id}','AdminEventController@approveEvent');
    Route::post('approveOSA/{id}','OsaController@approveEvent');
    Route::post('disapprove/{id}','AdminEventController@disapproveEvent');
    Route::post('disapproveOsa/{id}','OsaController@disapproveEvent');


    Route::resource('events', 'EventController');
    Route::get('pending',['uses'=>'EventController@pending', 'as' => 'pending.events']);
    Route::get('disapproved','EventController@disapproved');

   

    Route::post('addtodo/{id}', ['uses' => 'EventController@Addtodo', 'as' => 'add.todo']);
    Route::get('deletetodo/{id}', ['uses' => 'EventController@deletetodo', 'as' => 'delete.todo']);

    Route::post('sendletter/{id}', ['uses' => 'EventController@sendletter', 'as' => 'send.letter']);
    Route::resource('vpaa','VpaaController');
    Route::get('approvedletters','VpaaController@approvedlist');
    Route::get('disapprovedletters','VpaaController@disapprovedlist');
    Route::post('approveletter/{id}','VpaaController@approveletter');
    Route::post('disapproveletter/{id}','VpaaController@disapproveletter');

    //Account Settings
     Route::get('settings/{id}','UserController@settings');
     Route::post('changepassword/{id}', ['uses' => 'UserController@changepassword','as' => 'change.password']);

    //Change avatar

     Route::post('updateavatar', 'UserController@update_avatar');
     Route::post('deleteavatar', 'UserController@delete_avatar');

    //get PDF
     Route::get('/getPDF/{id}','PDFController@getPDF');

     //Create Tasks
     Route::resource('task','TaskController');
     Route::post('task/{id}','TaskController@store');
     Route::get('movetask/{id}','TaskController@movetask');
     Route::get('donetask/{id}','TaskController@donetask');

    Route::get('/api', function () {
    $events = DB::table('events')->select('id', 'name', 'title', 'start_time as start', 'end_time as end')->Where('status','=','approved')->get();
    foreach($events as $event)
    {
       
        $event->title = $event->title . ' - ' .$event->name;
        $event->url = url('events/' . $event->id);
       
    }
    return $events;
    });


