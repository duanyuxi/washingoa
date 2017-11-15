<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="{{asset('css')}}/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="{{asset('js')}}/jquery.js"></script>

<script type="text/javascript">
$(function(){	
	//导航切换
	$(".menuson .header").click(function(){
		var $parent = $(this).parent();
		$(".menuson>li.active").not($parent).removeClass("active open").find('.sub-menus').hide();
		
		$parent.addClass("active");
		if(!!$(this).next('.sub-menus').size()){
			if($parent.hasClass("open")){
				$parent.removeClass("open").find('.sub-menus').hide();
			}else{
				$parent.addClass("open").find('.sub-menus').show();	
			}
			
			
		}
	});
	
	// 三级菜单点击
	$('.sub-menus li').click(function(e) {
        $(".sub-menus li.active").removeClass("active")
		$(this).addClass("active");
    });
	
	$('.title').click(function(){
		var $ul = $(this).next('ul');
		$('dd').find('.menuson').slideUp();
		if($ul.is(':visible')){
			$(this).next('.menuson').slideUp();
		}else{
			$(this).next('.menuson').slideDown();
		}
	});
})	
</script>


</head>

<body style="background:#fff3e1;">
	<div class="lefttop"><span></span>通讯录</div>
    
    <dl class="leftmenu">
    <dd>
    <div class="title">
    <span><img src="{{asset('images')}}/leftico02.png" /></span>用户管理
    </div>
    <ul class="menuson">
        <li><cite></cite><a href="{{url('back/admin')}}" target="rightFrame">管理员</a><i></i></li>
        <li><cite></cite><a href="{{url('back/user')}}" target="rightFrame">客户</a><i></i></li>
        <li><cite></cite><a href="{{url('back/user_add')}}" target="rightFrame">添加人员</a><i></i></li>
        </ul>     
    </dd>
    <dd>
    <div class="title">
    <span><img src="{{asset('images')}}/leftico02.png" /></span>商品管理
    </div>
    <ul class="menuson">
        <li><cite></cite><a href="{{url('back/goods')}}" target="rightFrame">商品列表</a><i></i></li>
        <li><cite></cite><a href="{{url('back/goods_modify_show')}}" target="rightFrame">商品查询</a><i></i></li>
        <li><cite></cite><a href="{{url('back/goods_add')}}" target="rightFrame">商品添加</a><i></i></li>
        </ul>
    </dd>
    <dd>
    <div class="title">
    <span><img src="{{asset('images')}}/leftico02.png" /></span>订单管理
    </div>
    <ul class="menuson">
        <li><cite></cite><a href="{{url('back/orders')}}" target="rightFrame">订单列表</a><i></i></li>
        {{--<li><cite></cite><a href="橙色/web/project.html" target="rightFrame">修改订单</a><i></i></li>--}}
        {{--<li><cite></cite><a href="橙色/web/search.html" target="rightFrame">订单详情</a><i></i></li>--}}
        <li><cite></cite><a href="{{url('back/orders_add')}}" target="rightFrame">创建订单</a><i></i></li>
        </ul>
    </dd>
    </dl>
    
</body>
</html>
