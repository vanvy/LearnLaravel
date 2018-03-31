<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MyController extends Controller
{
    public function Hello() {
        echo "Xin chao Van Vy Cute";
    }

    public function printCategory($name) {
        echo "Trang san pham cua: ".$name;
        return redirect()->route('page2');
    }

    public function GetURL(Request $request) {
        
        // return $request->url(); 

        // if($request->isMethod('post'))
        //     echo "Phuong thuc Post";
        // else
        //     echo "Khong phai phuong thuc Post";
        
        if($request->is('My'))
            echo "Co My";
        else
            echo "Khong co My";
    }
    
    public function postForm(Request $request) {
        // echo "Xin chào: ";
        // echo $request->hoten;

        // if($request->has('tuoi'))
        //     echo "Co tham so";
        // else 
        //     echo "Khong co tham so";

            return $request->input('hoten');
    }
    
    public function setCookie() {
        $response = new Response();
        $response->withCookie('product', 'Nuoc hoa hong', 1);
        echo "Da setCookie";
        return $response;
    }

    public function getCookie(Request $request) {
        echo "Cookie cua ban la: ";
        return $request->cookie('product');
    }

    public function postFile(Request $request) {
        if($request->hasFile('myFile'))
        {    
            // echo "Da co file";
            $img = $request->file('myFile');
            if($img->getClientOriginalExtension('myFile') == "jpg") {
                $filename = $img->getClientOriginalName('myFile');
                $img->move('images', $filename);
                echo "Da luu file: ".$filename;
            }
            else {
                echo "Khong phai file anh";
            }
            // return "Upload thanh cong";
        }
        else
            echo "Chua co file";
    }

    public function getJSon() {
        $array = ['Ngon ngu lap trinh'=>'PHP'];
        return response()->json($array);
    }
    
    public function myView() {
        return view('view.index');
    }

    public function helloName($name) {
        return view('myView', ['name'=>$name]);
    }

    public function myProduct($myProduct) {
        if($myProduct == 'asus') {
            return view('product.asus');
        }
        elseif ($myProduct =='dell') {
            return view('product.dell');
        }
        else 
            return "Trang khong ton tai";
    }
}
