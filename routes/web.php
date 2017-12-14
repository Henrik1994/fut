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
//layoute admin page
Route::get('admin','LayoutController@index');

// UEFA route news
Route::get('news','UEFA\NewsController@index');
Route::post('/news_set','UEFA\NewsController@news_set');
Route::post('/update_news','UEFA\NewsController@update_news');
Route::get('/delete_news/{id}','UEFA\NewsController@delete_news');

//UEFA route video
Route::get('/video','UEFA\VideoController@index');
Route::post('/video_set','UEFA\VideoController@video_set');
Route::post('/update_video','UEFA\VideoController@update_video');
Route::get('/delete_video/{id}','UEFA\VideoController@delete_video');

//UEFA route important
Route::get('/important','UEFA\ImportantController@index');
Route::post('/important_set','UEFA\ImportantController@important_set');
Route::post('/update_important','UEFA\ImportantController@update_important');
Route::get('/delete_important/{id}','UEFA\ImportantController@delete_important');

//UEFA route team groups
Route::get('/groups','UEFA\GroupsController@index');
Route::post('/groups_select','UEFA\GroupsController@groups_select');
Route::post('/groups_set','UEFA\GroupsController@groups_set');
Route::post('/update_groups_select','UEFA\GroupsController@update_groups_select');
Route::post('/update_groups_group','UEFA\GroupsController@update_groups_group');
Route::get('/delete_groups/{id}','UEFA\GroupsController@delete_groups');
Route::get('/delete_groups_group/{id}','UEFA\GroupsController@delete_groups_group');

//UEFA route results
Route::get('/results', 'UEFA\ResultsController@index');
Route::post('/results_set', 'UEFA\ResultsController@results_set');
Route::post('/update_results','UEFA\ResultsController@update_results');
Route::get('/delete_results/{id}','UEFA\ResultsController@delete_results');

//UEFA route matches
Route::get('/matches', 'UEFA\MatchesController@index');
Route::post('/matches_set', 'UEFA\MatchesController@matches_set');
Route::post('/update_matches','UEFA\MatchesController@update_matches');
Route::get('/delete_matches/{id}','UEFA\MatchesController@delete_matches');


//teams route
Route::get('/teams', 'Teams\TeamsController@index');
Route::post('/team_set', 'Teams\TeamsController@team_set');
Route::post('/team_edit','Teams\TeamsController@team_edit');
Route::get('/delete_team/{id}','Teams\TeamsController@delete_team');

//team slider
Route::get('/team_slider/{id}','Teams\TeamSliderController@index');
Route::post('/slider_set','Teams\TeamSliderController@slider_set');
Route::post('/slider_edit','Teams\TeamSliderController@slider_edit');
Route::get('/slider_del/{id}','Teams\TeamSliderController@slider_del');


Route::get('/team_news/{id}','Teams\TeamNewsController@index');
Route::post('/team_news_set','Teams\TeamNewsController@team_news_set');
Route::post('/team_news_edit','Teams\TeamNewsController@team_news_edit');
Route::get('/team_news_del/{id}','Teams\TeamNewsController@slider_del');


Route::get('/','IndexController@index');



Route::get('/about', function () {
    return view('about');
});
Route::get('/single', function () {
    return view('single');
});
Route::get('/club', function () {
    return view('club');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/uefa', function () {
    return view('uefa');
});
Route::get('/contact', function () {
    return view('contact');
});
Auth::routes();