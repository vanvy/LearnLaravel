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

Route::get('Product', function() {
    return "Danh sach san pham";
});

Route::get('Product/Test', function() {
    echo "<h1>Test duong dan Home/Test</h1>";
});

//Truyen tham so

Route::get('Product/{name}', function($name) {
    echo "San pham cua trang nay la: ".$name;
});

//Dieu kien cho tham so

Route::get('Category/{category}', function($category) {
    echo "Loai san pham: ".$category;
})->where(['category'=>'[0-9]+']);

//Dinh danh có 2 cách

Route::get('Nuochoahong',['as'=>'1', function() {
    echo "Trang san pham cua Nuoc hoa hong";
}]);

Route::get('Suaruamat', function() {
    echo "Trang san pham cua Sua rua mat";
})->name('page2');

Route::get('Category', function() {
    return redirect()->route('page2');
});

//Route Group 
Route::group(['prefix'=>'Category'], function() {

    Route::get('Nuochoahong', function() {
        echo "Day la trang san pham nuoc hoa hong";
    });
    Route::get('Suaruamat', function() {
        echo "Day la trang san pham Sua rua mat";
    });
    Route::get('Kemduong', function() {
        echo "Day la trang san pham Kem duong";
    });

});

//Goi Controller
Route::get('Hello', 'MyController@Hello');

//Truyen tham so cho Controller
Route::get('printCategory/{name}', 'MyController@printCategory');

//URL
Route::get('1','MyController@GetURL');

//Gui nhan du lieu voi Request
Route::get('getForm', function() {
    return view('postForm');
});

Route::post('postForm', ['as'=>'postForm', 'uses'=>'MyController@postForm']);

// Cookie
Route::get('setCookie', 'MyController@setCookie');

Route::get('getCookie', 'MyController@getCookie');

//Update File
Route::post('postFile', 'MyController@postFile');

Route::get('uploadFile', function() {
    return view('postFile');
});

//Json
Route::get('getJSon', 'MyController@getJSon');

//View
Route::get('myView', 'MyController@myView');

// Truyen tham so tren View
Route::get('helloName/{t}','MyController@helloName');

//Dung chung du lieu tren Server
View::share('message','Chuc ban may man lan sau');

// Blade Template
Route::get('blade', function() {
    return view('view.content');
});

Route::get('product', function() {
    return view('pages.product');
});

Route::get('product/{myProduct}', 'MyController@myProduct');