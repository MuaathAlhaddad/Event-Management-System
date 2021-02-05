<?php
use Symfony\Component\HttpFoundation\Response;

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('home')->with('status', session('status'));
    }
    return redirect()->route('home');
})->name('home');

Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function () {
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
	Route::post('users/profile', ['as' => 'users.profile.update', 'uses' => 'UsersController@update_profile']);
    // These are for the auth user
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

    // Events
    Route::delete('events/destroy', 'EventsController@massDestroy')->name('events.massDestroy');
    Route::get('events/deletedEvents', 'EventsController@deletedEvents')->name('events.deletedEvents'); 
    Route::delete('events/destroy_permanently/{id}', 'EventsController@destroy_permanently')->name('events.destroy_permanently'); 
    Route::get('events/restore/{id}', 'EventsController@restore')->name('events.restore'); 
    Route::resource('events', 'EventsController');

    // Calendar
    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
});



/***************
 * Ajax Routes
 **************/
Route::post('country/states', 'AjaxController@getStates')->name('country.states');