<?php

Route::redirect('/home', '/admin');
Auth::routes(['register' => true]);
Auth::routes();
Route::get('/dashboard', 'HomeController@AfterRegisterUser')->name('dashboard');

Route::get('/', 'HomeController@index')->name('home');
Route::get('search', 'HomeController@search')->name('search');
Route::resource('jobs', 'JobController')->only(['index', 'show']);
Route::post('applytojob','JobapplyController@storeApplyjob');

Route::post('/registerpopup', 'Auth\RegisterController@register')->name('registerpopup');;


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group([ 'middleware' => ['candidateauth']], function()
{

    //jobs
    Route::get('/jobs', 'Admin\JobsController@indexCandidate')->name('jobs');
     Route::get('/jobs/{id}', 'Admin\JobsController@showCandidate')->name('showjobs');
    //Profile
    Route::get('/dashboard', 'HomeController@AfterloginUser')->name('dashboard');
    Route::get('/profile/{id}', 'Candidate\HomeCandidate@index')->name('profile');
    Route::get('/profileedit/{id}', 'Candidate\HomeCandidate@show')->name('profileedit');
    Route::post('StoreProfile', 'Candidate\HomeCandidate@StoreCandidate')->name('StoreProfile');

    //Update picture Profile
    Route::delete('profile/destroy/{id}', 'Candidate\HomeCandidate@destroy')->name('ResumeDestroy');
    Route::delete('profile/diploma/{id}', 'Candidate\HomeCandidate@destroyDiploma')->name('destroyDiploma');
    Route::get('/profile/diploma/{id}', 'Candidate\HomeCandidate@downloadDiploma')->name('downloadDiploma');

    Route::get('/profile/resume/{id}', 'Candidate\HomeCandidate@download')->name('downloadResume');
    Route::post('profile/{id}', 'Candidate\HomeCandidate@updateIntroduction')->name('profile.updateIntroduction');
    Route::post('profile/{id}/account', 'Candidate\HomeCandidate@UpdateAccount')->name('profile.UpdateAccount');
    Route::PUT('profile/password', 'Candidate\HomeCandidate@UpdatePassword')->name('profile.UpdatePassword');
    Route::post('profile/{id}/resume', 'Candidate\HomeCandidate@UpdateResume')->name('profile.UpdateResume');
    Route::post('profile/{id}/diploma', 'Candidate\HomeCandidate@UpdateDiploma')->name('profile.UpdateDiploma');

});

Route::group([ 'middleware' => ['Adminauth']], function()
{
    Route::get('/adminhome', 'HomeController@AfterloginAdmin')->name('adminhome');
});

Route::get('terms', 'HomeController@terms')->name('terms');
/*
Route::post('create', 'JobsEmployers@register');
Route::post('JobsEmployers', 'JobsEmployers@register');
*/



Route::get('/storage/resume/{id}', 'ResumeController@showFile')->name('showFile');
Route::get('/storage/resume/{id}', 'ResumeController@download')->name('download');
Route::get('category/{category}', 'CategoryController@show')->name('categories.show');
Route::get('location/{location}', 'LocationController@show')->name('locations.show');
Route::get('jobapply/{id}', 'JobapplyController@index')->name('jobapply');

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

    // Categories
    Route::delete('categories/destroy', 'CategoriesController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoriesController');

    // Locations
    Route::delete('locations/destroy', 'LocationsController@massDestroy')->name('locations.massDestroy');
    Route::resource('locations', 'LocationsController');

    // Companies
    Route::delete('companies/destroy', 'CompaniesController@massDestroy')->name('companies.massDestroy');
    Route::post('companies/media', 'CompaniesController@storeMedia')->name('companies.storeMedia');
    Route::resource('companies', 'CompaniesController');

    // Jobs
    Route::delete('jobs/destroy', 'JobsController@massDestroy')->name('jobs.massDestroy');
    Route::resource('jobs', 'JobsController');
    // Resume
    Route::delete('resume/destroy', 'ResumeController@massDestroy')->name('jobs.massDestroy');
    Route::resource('resume', 'ResumeController');


});
// Download Route


