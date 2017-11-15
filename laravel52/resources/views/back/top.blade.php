<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="{{asset('css')}}/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="{{asset('js')}}/jquery.js"></script>
<script type="text/javascript">
$(function(){	
	//顶部导航切换
	$(".nav li a").click(function(){
		$(".nav li a.selected").removeClass("selected")
		$(this).addClass("selected");
	})	
})	
</script>


</head>

<body style="background:url({{asset('images/topbg.gif')}}) repeat-x;">

    <div class="topleft">
    <a href="main.blade.php" target="_parent"><img src="{{asset('images')}}/logo.png" title="系统首页" /></a>
    </div>
        
    <ul class="nav">
    <li><a href="橙色/web/default.html" target="rightFrame" class="selected"><img src="{{asset('images')}}/icon01.png" title="工作台" /><h2>工作台</h2></a></li>
    <li><a href="details.blade.php" target="rightFrame"><img src="{{asset('images')}}/icon02.png" title="模型管理" /><h2>模型管理</h2></a></li>
    <li><a href="橙色/web/imglist.html" target="rightFrame"><img src="{{asset('images')}}/icon03.png" title="模块设计" /><h2>模块设计</h2></a></li>
    <li><a href="橙色/web/tools.html" target="rightFrame"><img src="{{asset('images')}}/icon04.png" title="常用工具" /><h2>常用工具</h2></a></li>
    <li><a href="橙色/web/computer.html" target="rightFrame"><img src="{{asset('images')}}/icon05.png" title="文件管理" /><h2>文件管理</h2></a></li>
    <li><a href="橙色/web/tab.html" target="rightFrame"><img src="{{asset('images')}}/icon06.png" title="系统设置" /><h2>系统设置</h2></a></li>
    </ul>
            
    <div class="topright">    
    <ul>
    <li><span><img src="{{asset('images')}}/help.png" title="帮助"  class="helpimg"/></span><a href="#">帮助</a></li>
    <li><a href="#">关于</a></li>
    <li><a href="橙色/web/login.html" target="_parent">退出</a></li>
    </ul>
     
    <div class="user">
    <span>admin</span>
    <i>消息</i>
    <b>5</b>
    </div>    
    
    </div>

</body>
</html>
