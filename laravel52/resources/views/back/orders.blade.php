<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="{{asset('css')}}/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{{asset('js')}}/jquery.js"></script>
<script language="javascript">
$(function(){	
	//导航切换
	$(".imglist li").click(function(){
		$(".imglist li.selected").removeClass("selected")
		$(this).addClass("selected");
	})	
})	
</script>
<script type="text/javascript">
$(document).ready(function(){
  $(".click").click(function(){
  $(".tip").fadeIn(200);
  });
  
  $(".tiptop a").click(function(){
  $(".tip").fadeOut(200);
});

  $(".sure").click(function(){
  $(".tip").fadeOut(100);
});

  $(".cancel").click(function(){
  $(".tip").fadeOut(100);
});

});
</script>
</head>


<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">订单列表</a></li>
    </ul>
    </div>
    
    <div class="rightinfo">
    
    <div class="tools">
    
    	<ul class="toolbar">
        <li class="click"><span><img src="images/t01.png" /></span>添加</li>
        <li class="click"><span><img src="images/t02.png" /></span>修改</li>
        <li><span><img src="images/t03.png" /></span>删除</li>
        <li><span><img src="images/t04.png" /></span>统计</li>
        </ul>
        
        
        <ul class="toolbar1">
        <li><span><img src="images/t05.png" /></span>设置</li>
        </ul>
    
    </div>
    
    
    <table class="imgtable">
    
    <thead>
    <tr>
    <th>订单号</th>
    <th>酒店名称</th>
    <th>客户名称</th>
    <th>订单总价</th>
    <th>订单状态</th>
    <th>操作</th>
    </tr>
    </thead>
    
    <tbody>
    @foreach($rew as $v)
    <tr>
    <td>{{$v->orderid}}</td>
    <td>{{$v->r_name}}</td>
    <td>{{$v->uname}}</td>
    <td>{{$v->total}}</td>
        @if($v->state==1)
            <td class="state" state="{{$v->state}}">未洗涤</td>
            <td oid="{{$v->id}}">修改订单状态&nbsp;&nbsp;:&nbsp;&nbsp;<select act="down" name="modify" gid="{{$v->id}}"><option state="1">未洗涤</option><option state="2">洗涤中</option><option state="3">未收款</option><option state="4">已收款</option></select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button act="delete" name="delete" did="{{$v->id}}">删除</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button act="details" name="details" mid="{{$v->orderid}}">订单详情</button></td>
        @elseif($v->state==2)
            <td class="state" state="{{$v->state}}">洗涤中</td>
            <td oid="{{$v->id}}">修改订单状态&nbsp;&nbsp;:&nbsp;&nbsp;<select act="down" name="modify" gid="{{$v->id}}"><option state="1">未洗涤</option><option state="2">洗涤中</option><option state="3">未收款</option><option state="4">已收款</option></select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button act="delete" name="delete" did="{{$v->id}}">删除</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button act="details" name="details" mid="{{$v->orderid}}">订单详情</button></td>
        @elseif($v->state==3)
            <td class="state" state="{{$v->state}}">未收款</td>
            <td oid="{{$v->id}}">修改订单状态&nbsp;&nbsp;:&nbsp;&nbsp;<select act="down" name="modify" gid="{{$v->id}}"><option state="1">未洗涤</option><option state="2">洗涤中</option><option state="3">未收款</option><option state="4">已收款</option></select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button act="delete" name="delete" did="{{$v->id}}">删除</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button act="details" name="details" mid="{{$v->orderid}}">订单详情</button></td>
        @elseif($v->state==4)
            <td class="state" state="{{$v->state}}">已收款</td>
            <td oid="{{$v->id}}">修改订单状态&nbsp;&nbsp;:&nbsp;&nbsp;<select act="down" name="modify" gid="{{$v->id}}"><option state="1">未洗涤</option><option state="2">洗涤中</option><option state="3">未收款</option><option state="4">已收款</option></select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button act="delete" name="delete" did="{{$v->id}}">删除</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button act="details" name="details" mid="{{$v->orderid}}">订单详情</button></td>
        @endif
    </tr>
    @endforeach
    </tbody>
    
    </table>
    <script>
        $("button[name='details']").click(function(){
            var orderid=$(this).attr('mid');
            window.location.href="{{url('back/details')}}?orderid="+orderid;
        })
        function modify(){
            $(".state").each(function(k,v){
                var key=parseInt($(v).attr('state'))-1;
                var a=$(v).next().children('select').children().eq(key).attr("selected","selected");
            })
        }
        /*array 需传输的数据——数组
        *url 需要传输的url
        * function_run 成功后执行的方法*/
        function ajax_run(type_json,url,function_run){
            $.ajax({
                "url":url,
                "data":type_json,
                "type":"post",
                "datatype":"json",
                "success":function_run
            })
        }

        $(document).ready(function(){
            modify();

        })

        $('select').on('change',function(){

            var obj=$(this);
            var oid=obj.parent().attr('oid');
            var state=obj.children("option[selected='selected']").attr('state');
            var url="{{url('back/orders_ajax')}}";
            var type_json={"_token":"{{csrf_token()}}","state":state,"act":"m_state","oid":oid};
            var function_run=function(){
                obj.parents('tr').children('.state').text(obj.children("option[selected='selected']").text());
            }
            ajax_run(type_json,url,function_run);
        });

        $("button[name='delete']").click(function(){
            var obj=$(this);
            var oid=obj.parent().attr('oid');
            var url="{{url('back/orders_ajax')}}";
            var type_json={"_token":"{{csrf_token()}}","oid":oid,"act":"delete"}
            var function_run=function(){
                obj.parents('tr').remove();
            }
            ajax_run(type_json,url,function_run);
        })
        </script>
    

    
    
   
    <div class="pagin">
    	<div class="message">共<i class="blue">1256</i>条记录，当前显示第&nbsp;<i class="blue">2&nbsp;</i>页</div>
        <ul class="paginList">
        <li class="paginItem"><a href="javascript:;"><span class="pagepre"></span></a></li>
        <li class="paginItem"><a href="javascript:;">1</a></li>
        <li class="paginItem current"><a href="javascript:;">2</a></li>
        <li class="paginItem"><a href="javascript:;">3</a></li>
        <li class="paginItem"><a href="javascript:;">4</a></li>
        <li class="paginItem"><a href="javascript:;">5</a></li>
        <li class="paginItem more"><a href="javascript:;">...</a></li>
        <li class="paginItem"><a href="javascript:;">10</a></li>
        <li class="paginItem"><a href="javascript:;"><span class="pagenxt"></span></a></li>
        </ul>
    </div>
    
    
    <div class="tip">
    	<div class="tiptop"><span>提示信息</span><a></a></div>
        
      <div class="tipinfo">
        <span><img src="images/ticon.png" /></span>
        <div class="tipright">
        <p>是否确认对信息的修改 ？</p>
        <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
        </div>
        </div>
        
        <div class="tipbtn">
        <input name="" type="button"  class="sure" value="确定" />&nbsp;
        <input name="" type="button"  class="cancel" value="取消" />
        </div>
    
    </div>
    
    
    
    
    </div>
    
    <div class="tip">
    	<div class="tiptop"><span>提示信息</span><a></a></div>
        
      <div class="tipinfo">
        <span><img src="images/ticon.png" /></span>
        <div class="tipright">
        <p>是否确认对信息的修改 ？</p>
        <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
        </div>
        </div>
        
        <div class="tipbtn">
        <input name="" type="button"  class="sure" value="确定" />&nbsp;
        <input name="" type="button"  class="cancel" value="取消" />
        </div>
    
    </div>
    
<script type="text/javascript">
	$('.imgtable tbody tr:odd').addClass('odd');
	</script>
    
</body>

</html>
<script>
    $("button[name='modify']").click(function(){
        var gid=$(this).attr('gid');
        var act=$(this).attr('act');
            if(act=='up'){
                $.ajax({
                    "url":"{{url('back/goods_modify')}}",
                    "type":"post",
                    "data":{"_token":"{{csrf_token()}}","gid":gid,"act":act},
                    "success":function(rew){
                        $("button[gid='"+gid+"']").parent().prev().text('正常');
                        $("button[gid='"+gid+"']").text("下架");
                        $("button[gid='"+gid+"']").attr("act","down");
                    }
                })

            }else{
                $.ajax({
                "url":"{{url('back/goods_modify')}}",
                "type":"post",
                "data":{"_token":"{{csrf_token()}}","gid":gid,"act":act},
                "success":function(rew){
                    $("button[gid='"+gid+"']").parent().prev().text('下架');
                    $("button[gid='"+gid+"']").text("上架");
                    $("button[gid='"+gid+"']").attr("act","up");
                }
            })

        }
    });

    $("button[name='delete']").click(function(){
        var gid=$(this).attr('did');
        var act=$(this).attr('act');
        $.ajax({
            "url":"{{url('back/goods_modify')}}",
            "type":"post",
            "data":{"_token":"{{csrf_token()}}","gid":gid,"act":act},
            "success":function(rew){
                $("button[did='"+gid+"']").parents('tr').remove();
            }
        })
    })

    $("button[name='modifytrue']").click(function(){
        var gid=$(this).attr('mid');
        window.location.href="{{url('back/goods_modify_hide')}}?gid="+gid;
    });
</script>