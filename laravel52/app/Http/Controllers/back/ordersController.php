<?php
/**
 * Created by PhpStorm.
 * User: danyuxi
 * Date: 17/10/30
 * Time: 下午10:39
 */
namespace App\Http\Controllers\back;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ordersController extends Controller
{
        public function orders_add(){
            $rew=DB::select("select restuarant_name as rname from user");
//            dd($rew);
          return view('back/orders_add',['rew'=>$rew]);
        }

        public function orders_adddata(Request $request){
            session_start();

            $rname=$request->input('rname');
            $rew=DB::select("select restuarant_name as rname,username from user where restuarant_name='$rname' and state=1");
            if(!empty($rew)){
                $uname=$rew['0']->username;
                $orderid=mt_rand(1000,9999).time().mt_rand(1000,9999);
//                dd($uname);
                $act=DB::insert("insert into orders(r_name,uname,state,orderid) value(?,?,?,?)",["$rname","$uname",1,$orderid]);
                if($act){
                return redirect("back/details_add")->with('oid',"$orderid");
                }else{
                    return back()->with("error","添加出错，请重新添加");
                }
            }else{
                return back()->with("error","添加出错，请检查该酒店是否激活");
            }
        }


        public function orders(Request $request){
            $rew=DB::select("select * from orders");
            return view("back/orders",['rew'=>$rew]);
        }


        public function orders_ajax(Request $request){
                $act=$request->input('act');

                switch($act){
                    case 'm_state':
                        $state=$request->input('state');
                        $oid=$request->input('oid');
                        $a=DB::update("update orders set state=$state where id=$oid");

                        break;
                    case 'delete':
                        $oid=$request->input('oid');
                        $a=DB::delete("delete from orders where id=$oid");
                        break;
                }


        }








}