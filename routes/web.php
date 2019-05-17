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


Route::get('/', 'HomeController@index')->name('home');
Route::get('/dashboard/index', 'DashboardController@index');

Route::get('/hero/index', 'HeroesController@index')->name('hero');
Route::get('/hero/id/{id}', 'HeroesController@getHeroId')->where('id', '[0-9]+');
Route::get('/hero/data/{race}', 'HeroesController@getDataHeroByRace');
Route::get('/hero/class/{class}', 'HeroesController@getDataWeaponByClass');
Route::post('/hero/new', 'HeroesController@create');
Route::post('/hero/deleted', 'HeroesController@deleted');

Route::get('/monster/index', 'MonstersController@index')->name('monster');
Route::get('/monster/id/{id}', 'MonstersController@getMonsterId')->where('id', '[0-9]+');
Route::get('/monster/data/{race}', 'MonstersController@getDataMonsterByRace');
Route::post('/monster/new', 'MonstersController@create');
Route::post('/monster/deleted', 'MonstersController@deleted');


