<?php
/**
 * Created by PhpStorm.
 * User: danyuxi
 * Date: 17/10/30
 * Time: 下午5:29
 */
namespace App\Http\Controllers\back;
use App\Http\Controllers\Controller;

class mainController extends Controller{

    public function main(){
        return view('back/main');
    }


    public function top(){
        return view('back/top');
    }


    public function left(){
        return view('back/left');
    }


    public function footer(){
        return view('back/footer');
    }















}