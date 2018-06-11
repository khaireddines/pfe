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


Route::group(['middleware' => ['revalidate','auth','role:Admin']], function () {
    Route::GET('/Admin/Dashboard',function(){
        return view('layouts.admin.Dashboard');
    })->name('Dashboard');
    //////////////////////Activity-Log/////////////////////////////////
    Route::get('/admin/Activity','ActivityLogController@index')
        ->name('Activitylog');
    Route::get('/admin/Activity/{id}','ActivityLogController@show');
    //////////////////////LogViewer////////////////////////////////////

    //////////////////////DepartementController////////////////////////
    Route::get('/departement','DepartementController@show');
    Route::get('/create_dep','DepartementController@create');
    Route::get('/create_dep/{id}','DepartementController@create');
    Route::post('/create_dep','DepartementController@store');
    Route::post('/modify_dep/{id}','DepartementController@edit');
    Route::get('/supp_dep/{id}','DepartementController@destroy');
    //////////////////////FormationController////////////////////////
    Route::get('/formation','FormationController@show');
    Route::get('/create_form','FormationController@create');
    Route::get('/create_form/{id}','FormationController@create');
    Route::post('/create_form','FormationController@store');
    Route::post('/modify_form/{id}','FormationController@edit');
    Route::get('/supp_form/{id}','FormationController@destroy');
    ////////////////////Unite_ens/////////////////////
    Route::get('/Unite_ens','UniEnseignementController@show');
    Route::get('/create_Uens','UniEnseignementController@create');
    Route::get('/create_Uens/{id}','UniEnseignementController@create');
    Route::post('/create_Uens','UniEnseignementController@store');
    Route::post('/modify_Uens/{id}','UniEnseignementController@edit');
    Route::get('/supp_Uens/{id}','UniEnseignementController@destroy');
    ////////////////////Matiere/////////////////////
    Route::get('/Matiere','MatiereController@show');
    Route::get('/create_Matiere','MatiereController@create');
    Route::get('/create_Matiere/{id}','MatiereController@create');
    Route::post('/create_Matiere','MatiereController@store');
    Route::post('/modify_Matiere/{id}','MatiereController@edit');
    Route::get('/supp_Matiere/{id}','MatiereController@destroy');
    ////////////////////Enseignant/////////////////////
    Route::get('/Enseignant','EnseignantController@show');
    Route::get('/create_Enseignant','EnseignantController@create');
    Route::get('/create_Enseignant/{id}','EnseignantController@create');
    Route::post('/create_Enseignant','EnseignantController@store');
    Route::post('/modify_Enseignant/{id}','EnseignantController@edit');
    Route::get('/supp_Enseignant/{id}','EnseignantController@destroy');
    ////////////////////Class/////////////////////
    Route::get('/Class','ClasseController@show');
    Route::get('/create_Class','ClasseController@create');
    Route::get('/create_Class/{id}','ClasseController@create');
    Route::post('/create_Class','ClasseController@store');
    Route::post('/modify_Class/{id}','ClasseController@edit');
    Route::get('/supp_Class/{id}','ClasseController@destroy');
    //////////////////Fetchs//////////////////////
    Route::get('/fetch_formation','FetchsController@formation');
    Route::POST('/fetch_matsC','FetchsController@matsC');
    Route::POST('/fetch_matsAT','FetchsController@matsAT');
    Route::POST('/fetch_prof_hours','FetchsController@repartition');
    Route::POST('/fetch_Mats','FetchsController@matiere_du_Classe');
    Route::POST('/fetch_voeux','FetchsController@prof_demonders');
    Route::POST('/fetch_prof','FetchsController@profs');
    Route::POST('/affectedto','FetchsController@affectedto');
    Route::POST('/fetch_affectedtotab','FetchsController@affectedtotab');
    Route::POST('/fetch_classeEmp','FetchsController@classeEmp');
    Route::POST('/fetch_emp_salle','FetchsController@Emp_Salle');
    Route::POST('/fetch_salle_vide','FetchsController@salle_vide');
    Route::POST('/fetch_salle_vide2','FetchsController@salle_vide2');
    Route::POST('/fetch_prof_emp','FetchsController@profEmp');
    Route::POST('/fetch_Mat','FetchsController@Matricule');
    Route::POST('/MatInfo','FetchsController@MatInfo');
    ////////////////PDF'S////////////////////////
    Route::POST('/repartition_pdf','PdfsController@repartition')->name('pdf');
    Route::POST('/Class_pdf','PdfsController@Classes');
    Route::POST('/Ense_pdf','PdfsController@Ense');
    Route::POST('/ClassRoom_pdf','PdfsController@ClassRoom');
    ////////////////Affected/////////////////////
    Route::get('/affectMat','AffectMatController@show');
    Route::POST('/insert','AffectMatController@store');
    ////////////////emploi///////////////////////
    Route::get('/emploi','EmploiController@show');
    Route::POST('/emp_insert','EmploiController@store');
    //////////////repartition//////////////////
    Route::get('/repartition',function () {
            return view('layouts.Users.repartition');
    });
});

/////////////////FV///////////////////////////
Route::get('/Fich_voeux','FichVoeuxController@show');
Route::post('/store','FichVoeuxController@store');
Route::get('/createPDF','FichVoeuxController@createPDF');
////////////////Auth Default Routes//////////
Auth::routes();





Route::get('/home', 'HomeController@index')->name('home');
