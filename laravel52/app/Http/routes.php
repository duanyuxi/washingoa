<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//
//Route::get('/', function () {
//    return view('welcome');
//});
Route::any('back/main',['uses'=>'back\mainController@main']);
Route::any('back/top',['uses'=>'back\mainController@top']);
Route::any('back/left',['uses'=>'back\mainController@left']);
Route::any('back/footer',['uses'=>'back\mainController@footer']);
Route::any('back/orders',['uses'=>'back\ordersController@orders']);
Route::any('back/orders_add',['uses'=>'back\ordersController@orders_add']);
Route::any('back/orders_ajax',['uses'=>'back\ordersController@orders_ajax']);
Route::any('back/user_add',['uses'=>'back\userController@user_add']);
Route::any('back/goods',['uses'=>'back\goodsController@goods']);
Route::any('back/goods_modify',['uses'=>'back\goodsController@goods_modify']);
Route::any('back/goods_add',['uses'=>'back\goodsController@goods_add']);
Route::any('back/goods_modify_hide',['uses'=>'back\goodsController@goods_modify_hide']);
Route::any('back/goods_modify_show',['uses'=>'back\goodsController@goods_modify_show']);
Route::any('back/details',['uses'=>'back\detailsController@details']);
Route::any('back/details_add',['uses'=>'back\detailsController@details_add']);
Route::any('back/details_modify',['uses'=>'back\detailsController@details_modify']);
Route::any('back/details_price',['uses'=>'back\detailsController@details_price']);
Route::any('back/details_adddata',['uses'=>'back\detailsController@details_addata']);
Route::any('back/user',['uses'=>'back\userController@user']);
Route::any('back/user_modify',['uses'=>'back\userController@user_modify']);
Route::any('back/user_adddata',['uses'=>'back\userController@user_adddata']);
Route::any('back/admin',['uses'=>'back\adminController@admin']);
Route::any('back/admin_modify',['uses'=>'back\adminController@admin_modify']);
Route::any('back/admin_adddata',['uses'=>'back\adminController@admin_adddata']);
Route::any('back/goods_adddata',['uses'=>'back\goodsController@goods_adddata']);
Route::any('back/orders_adddata',['uses'=>'back\ordersController@orders_adddata']);