<?php
use Symfony\Component\HttpFoundation\Response;

Auth::routes(['register' => false]);

// ================================== //
        /** Front End  */       
// ================================= //
Route::group(['as' =>'frontend.', 'namespace' => 'frontend'], function () {
    Route::get('home', 'PagesController@home')->name('home');
    Route::get('/', 'PagesController@home')->name('home');
    Route::get('users/create', 'UsersController@create')->name('users.create'); 
    Route::post('users/store', 'UsersController@store')->name('users.store'); 

    Route::group(['middleware' => ['auth']], function () {
        Route::get('news', 'PagesController@news')->name('news');
        Route::resource('events', 'EventsController');
        Route::get('users', 'UsersController@index')->name('users.index');
        Route::get('users/{id}', 'UsersController@show')->name('users.show');
        Route::post('users/register', 'UsersController@register')->name('users.register');
        Route::post('users/unregister', 'UsersController@unregister')->name('users.unregister');
        
    });
});

// ================================== //
        /** Admin Dashboard */       
// ================================= //
Route::get('admin', 'Admin\HomeController@dashboard')->name('admin.dashboard')->middleware('auth');
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Events
    Route::delete('events/destroy', 'EventsController@massDestroy')->name('events.massDestroy');
    Route::get('events/deletedEvents', 'EventsController@deletedEvents')->name('events.deletedEvents'); 
    Route::delete('events/destroy_permanently/{id}', 'EventsController@destroy_permanently')->name('events.destroy_permanently'); 
    Route::get('events/restore/{id}', 'EventsController@restore')->name('events.restore'); 
    Route::resource('events', 'EventsController');

    // Calendar
    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
});
