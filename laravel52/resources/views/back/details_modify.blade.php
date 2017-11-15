<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="{{asset('css')}}/style.css" rel="stylesheet" type="text/css" />
    <script language="JavaScript" src="{{asset('js')}}/jquery.js"></script>
</head>

    @if(!empty($mark))
    <script>alert({{$mark}});</script>
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
    
    <div class="formtitle"><span>添加商品服务</span></div>
    
    <ul class="forminfo">
        <form action="{{url('back/details_adddata')}}" method="post" class="form">
            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <li><label>订单号</label><input name="oid" type="text" readonly="true" class="dfinput" value="{{$orderid}}"/><i></i></li>

            <li><label>商品服务</label><cite>
                    @foreach($rew as $v)
                    <input name="gid" style="margin:5px;" class="radio" type="radio" value="{{$v->id}}" checked="" />{{$v->goodsname}}&nbsp;&nbsp;&nbsp;&nbsp;                 @endforeach
                </cite></li>
            <li><label>价格</label><input name="price" type="text" readonly="true" class="dfinput" value=""/><i></i></li>
            <li><label>数量</label><input name="num" type="text" class="dfinput" /><i></i></li>
    <li><label>&nbsp;</label><input name="" type="button" class="btn" value="确认添加"/></li>
        </form>
    </ul>
    
    
    </div>


</body>
<script>
    $('.btn').click(function(){
        $("input[type='radio']").each(function(){
            if($(this).attr('checked')){
                $(".form").submit();
            }
        })
    });

    $("input[type='radio']").click(function(){
        var gid=$(this).attr('value');
        $.ajax({
            url:"{{url('back/details_price')}}",
            type:"post",
            data:{"_token":"{{csrf_token()}}","gid":gid},
            datatype:"text",
            success:function(rew){
                $("input[name='price']").attr('value',rew);
            }

        })
    })
</script>

</html>
