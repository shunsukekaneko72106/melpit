<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|パスの管理を行っている
|
*/

//商品一覧をトップ
Route::get('', 'ItemsController@showItems')->name('top');
Auth::routes();


//商品詳細
Route::get('items/{item}', 'ItemsController@showItemDetail')->name('item');
//メルマガ画面
Route::get('email-newsletter', 'EmailNewsletterController@sendEmailNewsletterForm')->name('email-newsletter');
//音声データ送信
Route::get('call-management', 'SendVoiceDataController@sendVoiceDataForm')->name('call-management');
//文字起こし画面
Route::get('transcription', 'TranscriptionController@showForm')->name('transcription');




//出品系
Route::middleware('auth')
->group(function () {
    Route::get('items/{item}/buy', 'ItemsController@showBuyItemForm')->name('item.buy');
    Route::post('items/{item}/buy', 'ItemsController@buyItem')->name('item.buy');

    Route::get('sell', 'SellController@showSellForm')->name('sell');
    Route::post('sell', 'SellController@sellItem')->name('sell');
});

//プロフィール編集画面
Route::prefix('mypage')
->namespace('MyPage')
->middleware('auth')
->group(function () {
    Route::get('edit-profile', 'ProfileController@showProfileEditForm')->name('mypage.edit-profile');
    Route::post('edit-profile', 'ProfileController@editProfile')->name('mypage.edit-profile');
    Route::get('bought-items', 'BoughtItemsController@showBoughtItems')->name('mypage.bought-items');
    Route::get('sold-items', 'SoldItemsController@showSoldItems')->name('mypage.sold-items');

});
