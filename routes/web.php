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

Route::get('/', 'homepanel@home');

Route::get('/signup','signupcontroller@index');

Route::post('/signup','signupcontroller@register');

Route::get('/signin',function(){
    session_start();
    session_regenerate_id();
    session_destroy();
    return view('signin.register');
});

route::post('/signin','signupcontroller@signin');

Route::get('/logout','signupcontroller@signout');

Route::get('username/{username}/verify/{verify}','signupcontroller@verified');

Route::get('resendverif/{username}','signupcontroller@resendverification');

Route::get('/fpwd','signupcontroller@fpasswordindex');

Route::post('/fpwd','signupcontroller@fpasswordrec');
Route::get('/u/{username}','signupcontroller@fpasswordreset');
Route::put('/u/{username}','signupcontroller@fpasswordupdate');


Route::post('/sbscr','homepanel@subscribeus');


Route::get('/profile/{username}','homepanel@profileview');

Route::post('/imgupload','homepanel@profileimgupload');

Route::get('profile/e/{e}','homepanel@profileeditview');
Route::post('profile/e/{e}','homepanel@profileedit');


Route::get('/bs','homepanel@bs');

Route::get('/bsval','ajaxcontroller@searchblood');

Route::get('/searchcntry','ajaxcontroller@country');
Route::get('/searchstate/{e}/c','ajaxcontroller@statecurr');
Route::get('/searchcity/{e}/c','ajaxcontroller@citycurr');

Route::get('/searchstate/{e}/p','ajaxcontroller@stateperm');
Route::get('/searchcity/{e}/p','ajaxcontroller@cityperm');


Route::get('/fcn/{e}','ajaxcontroller@findcntryname');
Route::get('/fsn/{e}','ajaxcontroller@findstatename');
Route::get('/fcyn/{e}','ajaxcontroller@findcityname');


Route::resource('/news','news');

Route::get('/newsup/{n}','news@updatenews');

Route::get('/votes/{n}','news@likes');

Route::get('/changepass/e/{id}','signupcontroller@changepass');

Route::put('/changepass/e/{id}','signupcontroller@cpwd');