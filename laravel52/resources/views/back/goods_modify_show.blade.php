<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="{{asset('css')}}/style.css" rel="stylesheet" type="text/css" />
<link href="{{asset('css')}}/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{{asset('js')}}/jquery.js"></script>
<script type="text/javascript" src="{{asset('js')}}/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="{{asset('js')}}/select-ui.min.js"></script>
<script type="text/javascript" src="{{asset('editor')}}/kindeditor.js"></script>

<script type="text/javascript">
    KE.show({
        id : 'content7',
        cssPath : './index.css'
    });
  </script>
  
<script type="text/javascript">
$(document).ready(function(e) {

	$(".select3").uedSelect({
		width : 152
	});
});
</script>
</head>

<body class="sarchbody">

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">商品查询</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    
    <div id="usual1" class="usual"> 
    
    
    
    <ul class="seachform1">
    
    <li><label>序列号</label><input name="snum" type="text" class="scinput1" /></li>

    <li><label>商品名</label>
    <div  class="vocation">
    <select name="goodsname" class="select3">
    <option>全部</option>
        @foreach($gname as $gv)
    <option>{{$gv->goodsname}}</option>
            @endforeach
    </select>
    </div>
    </li>
    
    <li><label>价格</label>
    <div class="vocation" >
    <select name='price' class="select3">
    <option>全部</option>
        @foreach($price as $pv)
    <option>{{$pv->price}}</option>
            @endforeach
    </select>
    </div>
    </li>    

    
    </ul>
    

    
    <ul class="seachform1">
    <li class="sarchbtn"><label>&nbsp;</label><input name="" type="button" class="scbtn" value="查询"/> </li>
    </ul>
    
    <script language="javascript">
            $('.scbtn').click(function(){
                alert('11');
                var gname=$("select[name='goodsname']").attr('value');
                var price=$("select[name='price']").attr('value');
                var snum=$("input[name='snum']").attr('value');
                var act="search";
                $.ajax({
                    "url":"{{url('back/goods_modify')}}",
                    "type":"post",
                    "data":{"_token":"{{csrf_token()}}","gname":gname,"price":price,"snum":snum,"act":act},
                    "datatype":"json",
                    success:function(data){
                        alert('success');
                        $("tbody").html('');
                        var state;
                        var state1;
                        $.each(data,function(k,v){
                            if(v.state=='1'){
                                state="正常";
                                act="down"
                                state1="下架"
                            }else{
                                state="下架"
                                state1="上架"
                                act="up"
                            }
                            $("tbody").append("<tr><td class=\'asd\'>"+v.snum+"</td><td>"+v.goodsname+"</td><td>"+v.format+"</td><td>"+v.price+"</td><td>"+state+"</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button><a href=\"{{url('back/goods_modify_hide')}}?gid="+v.id+"\">修改</a></button></td></tr>");
                        })


                    }
                })


            });




	
	</script>
    
    
    <script type="text/javascript">
$(document).ready(function(){
  $(".scbtn1").click(function(){
  $(".seachform2").fadeIn(200);
  }); 


});
</script>

    
    
    
    <div class="formtitle"><span>项目列表</span></div>
    
    <table class="tablelist">
    	<thead>
    	<tr>
            <th>序号</th>
            <th>商品名</th>
            <th>商品规格</th>
            <th>商品价格</th>
            <th>商品状态</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>


    
        </tbody>
    </table>
    

       
	</div> 
 

    
    
    </div>


</body>

</html>
