<?php
/**
 * Created by PhpStorm.
 * User: danyuxi
 * Date: 17/10/30
 * Time: 下午10:40
 */
namespace App\Http\Controllers\back;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminController extends Controller{
//管理员添加
    public function admin_adddata(Request $request){
        session_start();
        $time=time();
        $rpassword=$request->input('rpassword');
        $password=$request->input('password');
        $a_name=$request->input('uname');
        $state=$request->input('state');
        if($rpassword==$password){
            $password=md5($password);
            $act=DB::insert("insert into administrator(a_name,password,create_time,state) value(?,?,?,?)",["$a_name","$password",$time,$state]);
            if($act){
                return back()->with('success','添加成功');
            }else{
                return back()->with('error','添加失败');
            }
        }else{
            return back()->with('error','密码输入不一致');
        }
    }


    public function admin(Request $request){
        $rew=DB::select("select * from administrator");
        return view('back/admin',['rew'=>$rew]);
}


    public function admin_modify(Request $request){
        $act=$request->input('act');

        if($act=="up"){
            $gid=$request->input('aid');
            $a=DB::update("update administrator set state=1 where id=$gid");
            return $a;
        }elseif($act=="down"){
            $gid=$request->input('aid');
            $a=DB::update("update administrator set state=2 where id=$gid");
            return $a;
        }elseif($act=="delete"){
            $gid=$request->input('aid');
            $a=DB::delete("delete from administrator where id=$gid");
            return $a;
        }
    }













}