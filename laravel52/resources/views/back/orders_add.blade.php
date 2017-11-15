<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="{{asset('css')}}/style.css" rel="stylesheet" type="text/css" />
    <script language="JavaScript" src="{{asset('js')}}/jquery.js"></script>
</head>

    @if(!empty(session('error')))
    <script>alert("session('error')");</script>
    @elseif(!empty(session('success')))
        <script>alert("session('success')");</script>
        @endif
 <body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">表单</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span>添加订单</span></div>
    
    <ul class="forminfo">
        <form action="{{url('back/orders_adddata')}}" method="post" class="form">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
        <li><label>酒店</label><select name="rname" class="dfinput">
                <option></option>
                @foreach($rew as $v)
                    <option>{{$v->rname}}</option>
                @endforeach
            </select><i></i></li>
    <li><label>&nbsp;</label><input name="" type="button" class="btn" value="确认添加"/></li>
        </form>
    </ul>
    
    
    </div>


</body>
<script>
    $('.btn').click(function(){
        if($('select').val()==""){
            alert("请选择酒店");
        }else{
            $(".form").submit();
        }
    })
</script>

</html>
