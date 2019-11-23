<?php

use App\Http\Resources\UserResource;

Route::apiResource('candidates', 'Candidates\MainController');

Route::get(
    'candidates/{id}/laboral-references',
    'Candidates\MainController@getLaboralReferences'
)->name('candidates.get.laboral-references');

Route::apiResource('laboral-references', 'Candidates\LaboralReferenceController');

Route::group(['middleware' => 'guest:api'], function () {
    Route::post(
        'login',
        'Auth\LoginController@login'
    )->name('users.login');
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::get(
        'me',
        function () {
            return new UserResource(request()->user());
        }
    )->name('users.me');

    Route::post(
        'logout',
        'Auth\LoginController@logout'
    )->name('users.logout');

    Route::apiResources([
        'users' => 'Users\MainController',
        'roles' => 'Users\Roles\RoleController',
    ]);

    Route::put(
        'users/{user}/password',
        'Users\PasswordController'
    );
});
