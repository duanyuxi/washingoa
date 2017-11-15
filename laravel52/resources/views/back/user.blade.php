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
    <li><a href="#">商品列表</a></li>
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
    <th>序号</th>
    <th>酒店名</th>
    <th>负责人</th>
    <th>创建时间</th>
    <th>状态</th>
    <th>操作</th>
    </tr>
    </thead>
    
    <tbody>
    @foreach($rew as $v)
    <tr>
    <td>{{time().$v->id}}</td>
    <td>{{$v->restuarant_name}}</td>
    <td>{{$v->username}}</td>
    <td>{{date('Y-m-d H:i:s',$v->create_time)}}</td>
        @if($v->state==1)
            <td>正常</td>
            <td><button act="down" name="modify" uid="{{$v->id}}">限制</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button act="delete" name="delete" did="{{$v->id}}">删除</button></td>
        @else
            <td>限制</td>
            <td><button act="up" name="modify" uid="{{$v->id}}">解禁</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button act="delete" name="delete" did="{{$v->id}}">删除</button></td>
        @endif
    </tr>
    @endforeach
    </tbody>
    
    </table>
    
    
    
    
    
   
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

        var uid=$(this).attr('uid');
        var act=$(this).attr('act');
            if(act=='up'){
                $.ajax({
                    "url":"{{url('back/user_modify')}}",
                    "type":"post",
                    "data":{"_token":"{{csrf_token()}}","uid":uid,"act":act},
                    "success":function(rew){
                        $("button[uid='"+uid+"']").parent().prev().text('正常');
                        $("button[uid='"+uid+"']").text("限制");
                        $("button[uid='"+uid+"']").attr("act","down");
                    }
                })

            }else{
                $.ajax({
                "url":"{{url('back/user_modify')}}",
                "type":"post",
                "data":{"_token":"{{csrf_token()}}","uid":uid,"act":act},
                "success":function(rew){
                    $("button[uid='"+uid+"']").parent().prev().text('限制');
                    $("button[uid='"+uid+"']").text("解禁");
                    $("button[uid='"+uid+"']").attr("act","up");
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