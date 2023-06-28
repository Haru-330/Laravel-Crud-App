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
    return view('boot_template.index');
});

Route::get('crud/', 'App\Http\Controllers\CrudController@getIndex');

Route::group(['prefix' => 'student'], function () {
    Route::get('list', 'App\Http\Controllers\CrudController@getIndex');    // 一覧
    Route::get('new', 'App\Http\Controllers\CrudController@new_index');    // 入力
    Route::patch('new','App\Http\Controllers\CrudController@new_confirm'); // 確認
    Route::post('new', 'App\Http\Controllers\CrudController@new_finish');  // 完了
    /**
     * 編集
     */
    Route::get('edit/{id}/', 'App\Http\Controllers\CrudController@edit_index');    // 編集
    Route::patch('edit/{id}/','App\Http\Controllers\CrudController@edit_confirm'); // 確認
    Route::post('edit/{id}/', 'App\Http\Controllers\CrudController@edit_finish');  // 完了
    /**
     * 詳細
     */
    Route::get('detail/{id}/', 'App\Http\Controllers\CrudController@detail_index'); // 詳細
    /**
     * 削除
    */
    Route::delete('delete/{id}/', 'App\Http\Controllers\CrudController@us_delete'); // 削除
});
