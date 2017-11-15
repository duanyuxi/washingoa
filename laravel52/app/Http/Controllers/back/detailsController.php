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

class detailsController extends Controller
{
        public function details_add(Request $request){//从闪存中获取oid
            session_start();
            $orderid=session('oid');
            $rew=DB::select("select * from goods where state=1");
            return view("back/details_add",['orderid'=>$orderid,'rew'=>$rew]);
        }


        //ajax
        public function details_price(Request $request){
            $gid=$request->input('gid');
            $rew=DB::select("select price from goods where id=$gid");
            return $rew['0']->price;
        }

        //添加details
        public function details_addata(Request $request){
                    session_start();//开启session
            $rew=DB::select("select * from goods where state=1");//goods表数据
                    $gid=$request->input('gid');
                    $num=$request->input('num');
                    $oid=$request->input('oid');
//                    dd(preg_match("/^[1-9][0-9]*$/",$num));
                    if(!empty($gid)&&!empty($num)&&preg_match("/^[1-9][0-9]*$/",$num)){//非空判断和数字正则匹配
                        $gdata=DB::select("select * from goods where id=$gid and state=1");
                        $odata=DB::select("select * from orders where orderid=$oid");
                        $price=$gdata['0']->price;
                        $goodsname=$gdata['0']->goodsname;
                        $format=$gdata['0']->format;
                        $total=$odata['0']->total+$price*$num;
                        //事务开启
                        DB::beginTransaction();
                        try{
                            $aact=DB::insert("insert into details(price,goodsname,orderid,format,state,num) value(?,?,?,?,?,?)",[$price,"$goodsname",$oid,"$format",1,$num]);
                            $oact=DB::update("update orders set total=$total where orderid=$oid");
                            if($aact&&$oact){//成功commit提交
                                DB::commit();
                                return view("back/details_add",['orderid'=>$oid,'rew'=>$rew,'mark'=>"添加成功"]);
                            }
                        }catch(\Exception $e){//失败回滚
                            DB::rollBack();
                            return view("back/details_add",['orderid'=>$oid,'rew'=>$rew,'mark'=>"订单添加失败"]);
                        }

                    }else{
                        return view("back/details_add",['orderid'=>$oid,'rew'=>$rew,'mark'=>"数据填写错误"]);
                    }
        }

    public function details_modify(Request $request){
        $orderid=$request->input('orderid');
        $rew=DB::select("select * from goods where state=1");
        return view("back/details_modify",['orderid'=>$orderid,'rew'=>$rew]);
    }

    public function details(Request $request){
            $orderid=$request->input('orderid');

        $rew=DB::select("select * from details where orderid=$orderid");

        return view("back/details",['rew'=>$rew]);
    }


    public function details_ajax(Request $request){
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