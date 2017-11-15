<?php
/**
 * Created by PhpStorm.
 * User: danyuxi
 * Date: 17/10/30
 * Time: 下午10:40
 */
namespace App\Http\Controllers\back;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
//use Symfony\Component\HttpFoundation\Session\Session;

class userController extends Controller{




    public function user_add(){
        return view('back/user_add');
    }



    //客户添加
    public function user_adddata(Request $request){
//        dd($request);
        $rname=$request->input('rname');
        $uname=$request->input('uname');
        $state=$request->input('state');
        $time=time();
        $password=md5('123456');
        $act=DB::insert("insert into user(restuarant_name,username,state,create_time,password) values('$rname','$uname','$state',$time,'$password')");
   if($act){
        return back()->with('success',"添加成功");
    }else{
       return back()->with('error',"添加失败");
   }
    }



    public function user(Request $request){
        $rew=DB::select("select * from user");
        return view('back/user',['rew'=>$rew]);
    }



//ajax
    public function user_modify(Request $request){
        $act=$request->input('act');

        if($act=="up"){
            $gid=$request->input('uid');
            $a=DB::update("update user set state=1 where id=$gid");
            return $a;
        }elseif($act=="down"){
            $gid=$request->input('uid');
            $a=DB::update("update user set state=2 where id=$gid");
            return $a;
        }elseif($act=="delete"){
            $gid=$request->input('uid');
            $a=DB::delete("delete from user where id=$gid");
            return $a;
        }
    }







}