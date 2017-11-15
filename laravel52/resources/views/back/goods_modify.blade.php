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
    <li><a href="#">商品修改</a></li>
    </ul>
    </div>
    <div class="formbody" >

    <div class="formtitle"><span>商品修改</span></div>

    <ul class="forminfo">
        <form action="{{url('back/goods_adddata')}}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
    <li><label>名称</label><input name="goodsname" type="text" class="dfinput" value="{{$rew->goodsname}}"/><i></i></li>
    <li><label>序号</label><input name="snum" type="text" class="dfinput" value="{{$rew->snum}}"/><i></i></li>
            <li><label>单位</label><input name="format" type="text" class="dfinput" value="{{$rew->format}}"/><i></i></li>
            <li><label>单价</label><input name="price" type="text" class="dfinput" value="{{$rew->price}}"/><i>最多一位小数</i></li>
    <li><label>是否上架</label><cite><input name="state" type="radio" value="1" checked="checked" />是&nbsp;&nbsp;&nbsp;&nbsp;<input name="state" type="radio" value="2" />否</cite></li>
    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认保存"/></li>
        </form>
    </ul>


    </div>


</body>

</html>
<script>
</script>
