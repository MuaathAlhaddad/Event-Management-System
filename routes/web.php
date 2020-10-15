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
    Route::get('deletedEvents', 'EventsController@deletedEvents')->name('deletedEvents'); 
    Route::resource('events', 'EventsController');

    Route::get('publish', function () {
        abort_if(Gate::denies('publish'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('publish');
    });
    
    Route::get('sing', function () {
        abort_if(Gate::denies('sing'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('sing');
    });

    Route::get('projects_index', function () {
        abort_if(Gate::denies('projects_index'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('projects.index');
    });
    

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
});
