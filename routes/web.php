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


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

schema::defaultstringlength(191);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home','HomeController@home2')->name('home2');

/*topics*/
Route::get('/add-topic','TopicController@topicForm')->name('topic_form');
Route::post('/topic-form-Submit','TopicController@formSubmit')->name('topic_form_submit');
Route::post('/topic-form-Submit/edit','TopicController@edit_formSubmit')->name('topic_edit_form_submit');

Route::get('/manage-topic','TopicController@manageTopis')->name('manage_topis');
Route::get('/manage-topic/delete/{id}','TopicController@deleteData')->name('manage_topis.deleteData');
Route::get('/manage-topic/edit/{id}','TopicController@editData')->name('manage_topis.editData');

Route::get('/manage-topic/getdata','TopicController@getData')->name('manage_topis.getdata');
//Route::post('/form-Submit','TopicController@formSubmit')->name('topic_form_submit');

/*Words*/
Route::get('/add-word','WordController@wordForm')->name('word_form');
Route::post('/word-form-Submit','WordController@formSubmit')->name('word_form_submit');
Route::post('/word-form-Submit/edit','WordController@edit_formSubmit')->name('word_edit_form_submit');

Route::get('/manage-word','WordController@manageWords')->name('manage_words');
Route::get('/manage-word/delete/{id}','WordController@deleteData')->name('manage_words.deleteData');
Route::get('/manage-word/edit/{id}','WordController@editData')->name('manage_words.editData');

Route::get('/manage-word/getdata','WordController@getData')->name('manage_words.getdata');
//Route::post('/form-Submit','TopicController@formSubmit')->name('topic_form_submit');
