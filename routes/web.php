<?php

use Illuminate\Support\Facades\Route;






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
    return redirect('home');
});

//HOME
Route:: get('home','HomeController@checkLogin');


//API
Route:: get('apitradotto/{q}','HomeController@translation');
Route:: get('spotifAPI/{q}','HomeController@spotifAPI');
//LOGIN
Route::get('login','LoginController@login');
Route::post('login','LoginController@checkLogin');
Route:: get('logout','LoginController@logout');

//SIGNUP
Route::get('signup','RegisterController@signupCheck');
Route:: post('signup','RegisterController@createUser');
Route:: get('signupcheckUser/{q}','RegisterController@checkUser');
Route:: get('checkmail/{q}','RegisterController@checkMail');

//DASHBOARD
Route:: get('dashboard','DashboardController@dashboard');
Route:: get('loadcontent','DashboardController@loadContent');

// GESTIONE PREFERITI
Route:: get('addpref/{par1}','PreferitiController@addpref');
Route:: get('removepref/{par1}','PreferitiController@removepref');

Route:: get('checkpref/{par1}','PreferitiController@checkPref');

// NART
Route:: get('nart','ArtController@checkLogin');
Route:: post('nart','ArtController@newArt');

//GESTIONE ARTICOLI
Route:: get('download/{par1}','ArtController@downloadContent');
Route:: get('removeArticle/{par1}','ArtController@removeArticle');

//PROFILO
Route:: get('profile','ProfileController@profile');
Route:: get('loadprofilearticle','ProfileController@loadArticle');
Route:: get('loadprofilepref','ProfileController@loadPref');

//LOGOUT
Route:: get('logout','LoginController@logout');


Route:: get('user',function(){

    
         $pref = Preferiti::where('cod_articolo',)->get();
        $pref->delete();

   
    
   
});

