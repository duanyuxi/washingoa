<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="{{asset('css')}}/style.css" rel="stylesheet" type="text/css" />
    <script language="JavaScript" src="{{asset('js')}}/jquery.js"></script>
</head>

<body>
@if(!empty(session('error')))
    <script>alert('{{session('error')}}');</script>
    @elseif(!empty(session('success')))
    <script>alert('{{session('success')}}');</script>
@endif
	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">新增人员</a></li>
    </ul>
    </div>
    <button class="button" style="width:120px;height:40px;background:aliceblue;">添加客户</button>
    <div class="formbody formbody_user" style="display:none;">
    
    <div class="formtitle"><span>新增客户</span></div>
    
    <ul class="forminfo">
        <form action="{{url('back/user_adddata')}}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <li><label>酒店名</label><input name="rname" type="text" class="dfinput" /><i>不能超过30个字符</i></li>
    <li><label>负责人</label><input name="uname" type="text" class="dfinput" /><i></i></li>
    <li><label>是否激活</label><cite><input name="state" type="radio" value="1" checked="checked" />是&nbsp;&nbsp;&nbsp;&nbsp;<input name="state" type="radio" value="2" />否</cite></li>
    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认保存"/></li>
        </form>
    </ul>
    
    
    </div>
    <div class="formbody formbody_admin" >

    <div class="formtitle"><span>新增管理员</span></div>

    <ul class="forminfo">
        <form action="{{url('back/admin_adddata')}}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
    <li><label>姓名</label><input name="uname" type="text" class="dfinput" /><i></i></li>
            <li><label>密码</label><input name="password" type="text" class="dfinput" /><i></i></li>
            <li><label>确认密码</label><input name="rpassword" type="text" class="dfinput" /><i></i></li>
    <li><label>是否激活</label><cite><input name="state" type="radio" value="1" checked="checked" />是&nbsp;&nbsp;&nbsp;&nbsp;<input name="state" type="radio" value="2" />否</cite></li>
    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认保存"/></li>
        </form>
    </ul>


    </div>


</body>

</html>
<script>
    $('.button').toggle(function(){
        $(this).text('添加管理员');
        $('.formbody_user').show();
        $('.formbody_admin').hide();
    },function(){
        $(this).text('添加客户');
        $('.formbody_user').hide();
        $('.formbody_admin').show();
    })

</script>
