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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
Route::match(['get', 'post'], '/adminOnlyPage/', 'HomeController@admin');
Route::get('/adminOnlyPage', 'UsersController@afficherAdmin')->name('current_users_admin');

Route::get('/competence_user_admin', 'UsersController@btn_comp_admin')->name('competence_user_admin');
Route::get('/competence_user_admin/{id}', function ($id) {

    $id = DB::table('competence_user')->updateorinsert(['competence_id' => $id, 'user_id' => Auth::user()->id, 'level' => 1]);
    return redirect()->route('current_users_admin');  
});


Route::post('updateAdmin', 'UsersController@updateAdmin');
Route::post('deleteAdmin', 'UsersController@deleteAdmin');
Route::post('updateMember', 'UsersController@updateMember');
Route::post('deleteMember', 'UsersController@deleteMember');

});

Route::group(['middleware' => 'App\Http\Middleware\MemberMiddleware'], function()
{
Route::match(['get', 'post'], '/memberOnlyPage/', 'HomeController@member');
Route::get('/memberOnlyPage', 'UsersController@afficherMember')->name('current_users_member');

Route::get('/competence_user_member', 'UsersController@btn_comp')->name('competence_user_member');
Route::get('/competence_user_member/{id}', function ($id) {

    $idd = DB::table('competence_user')->updateorinsert(['competence_id' => $id, 'user_id' => Auth::user()->id, 'level' => 1]);
    return redirect()->route('current_users_member');  
});
});





