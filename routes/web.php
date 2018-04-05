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

//QueryBuilder
Route::get('users_qb/get', function() {
    $data = DB::table('users')->get();
    foreach($data as $row)
    {
        foreach($row as $key =>$value)
        {
            echo $key.":".$value."<br>";
        }
        echo "<hr>";
    }
});
Route::get('product_qb/get', function() {
    $data = DB::table('product')->get();
    foreach($data as $row)
    {
        foreach($row as $key=>$value)
        {
            echo $key.":".$value."<br>";
        }
        echo "<hr>";
    }
});

// select * from user where id = 2
Route::get('user_qb/where', function() {
    $data = DB::table('users')->where('name',"vy")->get();
    foreach($data as $row)
    {
        foreach($row as $key => $value)
        {
            echo $key.":".$value."<br>";
        }
        echo "<hr>";
    }
});

// Select id, name, email...
Route::get('user_qb/select/{id}', function($id) {
    //echo $id; Truyen tham so
    $data = DB::table('users')
        ->select(['id','name','email'])
        // ->where('id',2)
        ->where('id',$id)
        ->get();
    foreach($data as $row)
    {
        foreach($row as $key => $value)
        {
            echo $key.":".$value."<br>";
        }
        echo "<hr>";
    }
});

//Update
Route::get('user_qb/update/{name}', function($name) {
    DB::table('users')
        ->where('id',2)
        ->update(['name'=>$name]);
    echo "Da update";
});

Route::get('product_qb/update', function() {
    DB::table('product')
        ->where('id',3)
        ->update(['name_product'=>'HP', 'id_category'=>'4']);
    echo "Update thanh cong";
});

//Delete
Route::get('product_qb/delete', function() {
    DB::table('product')
        ->where('id',2)
        ->delete();
});

// Model
Route::get('model/save', function() {
    $user = new App\User();
    
    $user->name = "An";
    $user->email = "an@azwebplus.com";
    $user->password = "12345";

    $user->save();

    echo "Da thuc hien thanh cong";
});

Route::get('query/{id}', function($id) {
    $user = App\User::find($id)->toArray();
    // echo $user;
    // if(isset($user)){
    //     foreach($user as $key => $value)
    //     {
    //         echo $key.":".$value."<br>";
    //     }
    // }
    // else
    //     echo "Khong ton tai user id: ".$id;
    return $user;

});

// Model product
Route::get('model/product/save/{name}', function($name) {
    $product = new App\product();

    $product->name_product = $name;
    $product->id_category = "5";
    $product->soluong = 15;

    $product->save();

    echo "Thuc hien thanh cong";
});

Route::get('model/product/all', function() {
    $product = App\product::all();
    // var_dump($product);
    return $product->toArray();
});

//delete
Route::get('model/product/delete', function() {
    App\product::destroy(5);
    echo "Thuc hien thanh cong";
});

Route::get('hasMany', function() {
    $data = App\category::find(1)->product;
    return $data;
});

Route::get('belongsto', function() {
    $data = App\product::find(1)->category;
    return $data;
});