<?php
/**
 * Created by PhpStorm.
 * User: danyuxi
 * Date: 17/10/30
 * Time: 下午10:29
 */
namespace App\Http\Controllers\back;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class goodsController extends Controller
{


    public function goods(){

        $rew=DB::select("select * from goods");
        return view('back/goods',['rew'=>$rew]);
    }

    public function goods_add(){
        return view('back/goods_add');
    }
    public function goods_adddata(Request $request){
        session_start();
        $data=$request->input();
//        dd($data['format']);
        $goodsname=$data['goodsname'];
        $format=$data['format'];
        $price=$data['price'];
        $snum=$data['snum'];
        $state=$data['state'];
        $act=DB::insert("insert into goods(goodsname,format,price,snum,state) value(?,?,?,?,?)",["$goodsname","$format","$price",$snum,$state]);
        if($act){
            return back()->with('success',"添加成功");
        }else{
            return back()->with('success',"添加失败");
        }
    }


    //ajax
    public function goods_modify(Request $request){
            $act=$request->input('act');

            if($act=="up"){
                $gid=$request->input('gid');
                $a=DB::update("update goods set state=1 where id=$gid");
                return $a;
            }elseif($act=="down"){
                $gid=$request->input('gid');
                $a=DB::update("update goods set state=2 where id=$gid");
                return $a;
            }elseif($act=="delete"){
                $gid=$request->input('gid');
                $a=DB::delete("delete from goods where id=$gid");
                return $a;
            }elseif($act=="search"){
                $gname=$request->input('gname');
                $snum=$request->input('sunm');
                $price=$request->input('price');
                $where="1=1";
                if(!empty($gname)){
                    if($gname=="全部"){
                        $where=$where;
                    }else{
                        $where=$where." and goodsname='$gname'";
                    }
                }
                if(!empty($snum)){
                    $where=$where." and snum=$snum";
                }
                if(!empty($price)){
                    if($price=="全部"){
                        $where=$where;
                    }else{
                    $where=$where." and price=$price";
                    }

                }
                $data=DB::select("select * from goods where $where");
                return $data;
            }
    }



    //goodsmodify
    public function goods_modify_hide(Request $request){

            $gid=$request->input('gid');
            $rew=DB::select("select * from goods where id=$gid");
            return view('back/goods_modify',['rew'=>$rew['0']]);
    }



//goodsmodifyshow
    public function goods_modify_show(Request $request){
        $gname=DB::select("select goodsname from goods");
        $price=DB::select("select price from goods group by price order by price desc");

        return view('back/goods_modify_show',["gname"=>$gname,"price"=>$price]);

}



















}