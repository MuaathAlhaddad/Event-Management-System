<?php
use Symfony\Component\HttpFoundation\Response;

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
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
