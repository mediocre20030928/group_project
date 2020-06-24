<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>广告-有点</title>
    <link rel="stylesheet" type="text/css" href="/admin/css/css.css" />
    <script type="text/javascript" src="/admin/js/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>

<body>
<div id="pageAll">
    <div class="pageTop">
        <div class="page">
            <img src="/admin/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
                        href="#">分类管理</a>&nbsp;-</span>&nbsp;分类列表
        </div>
    </div>
    <div class="page">
        <!-- banner页面样式 -->
        <div class="banner">
            <div class="add">
                <a class="addA" href="/category/add">上传分类&nbsp;&nbsp;+</a>
            </div>
            <!-- banner 表格 显示 -->
            <div class="banShow">
                <table border="1" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="66px" class="tdColor tdC">序号</td>
                        <td width="308px" class="tdColor">分类名称</td>
                        <td width="215px" class="tdColor">是否显示</td>
                        <td width="125px" class="tdColor">操作</td>
                    </tr>
                    @foreach($res as $k=>$v)
                    <tr id="{{$v->id}}">
                        <td>{{$v->id}}</td>
                        <td>{{$v->cate_name}}</td>
                        {{--<td filed="brand_url">--}}
                            {{--<span class="span_name">{{$v->brand_url}}</span>--}}
                            {{--<input type="text" value="{{$v->brand_url}}" style="display: none" class="inp"/>--}}
                        {{--</td>--}}
                        {{--<td field="brand_name">
                            <span class="span_name">{$v.brand_name}</span>--}}
                            {{--<input type="text" value="{$v.brand_name}"style="display: none" class="inp">--}}
                        {{--</td>--}}
                        @if($v->hidden==1)
                        <td>是</td>
                        @else
                            <td>否</td>
                        @endif
                        <td>
                            <a href="{{url('/category/edit/'.$v->id)}}"><img class="operation" src="/admin/img/update.png"></a>
                            <img class="operation delban" src="/admin/img/delete.png" data-id="{{$v->id}}"></td>
                    </tr>
                    @endforeach
                </table>
                <div class="paging">{{$res->links()}}</div>
            </div>
            <!-- banner 表格 显示 end-->
        </div>
        <!-- banner页面样式end -->
    </div>

</div>


<!-- 删除弹出框 -->
<div class="banDel">
    <div class="delete">
        <div class="close">
            <a><img src="/admin/img/shanchu.png" /></a>
        </div>
        <p class="delP1">你确定要删除此条记录吗？</p>
        <p class="delP2">
            <a href="#" class="ok yes" >确定</a><a class="ok no">取消</a>
        </p>
    </div>
</div>
<!-- 删除弹出框  end-->
</body>

{{--<script type="text/javascript">--}}
    {{--// 广告弹出框--}}
    {{--$(".delban").click(function(){--}}
        {{--$(".banDel").show();--}}
    {{--});--}}
    {{--$(".close").click(function(){--}}
        {{--$(".banDel").hide();--}}
    {{--});--}}
    {{--$(".no").click(function(){--}}
        {{--$(".banDel").hide();--}}
    {{--});--}}
    {{--// 广告弹出框 end--}}

    {{--function del(){--}}
        {{--var input=document.getElementsByName("check[]");--}}
        {{--for(var i=input.length-1; i>=0;i--){--}}
            {{--if(input[i].checked==true){--}}
                {{--//获取td节点--}}
                {{--var td=input[i].parentNode;--}}
                {{--//获取tr节点--}}
                {{--var tr=td.parentNode;--}}
                {{--//获取table--}}
                {{--var table=tr.parentNode;--}}
                {{--//移除子节点--}}
                {{--table.removeChild(tr);--}}
            {{--}--}}
        {{--}--}}
    {{--}--}}
{{--</script>--}}
</html>
<script>
    $(document).ready(function(){
        $(".delban").click(function(){
            var id = $(this).attr('data-id');
            $(".banDel").show();
            $(".yes").click(function(){
                var url="/category/delete";
                var data={};
                data.id=id;
                $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
                $.ajax({
                    type:"post",
                    data:data,
                    url:url,
                    dataType:"json",
                    success:function(res){
                        alert(res.result.message);
                        if(res.message=='success'){
                            window.location.href="/category/index";
                        }
                    }
                })
            });
            $(".no").click(function(){
                $(".banDel").hide();
            });
        });
        $(".span_name").click(function(){
                var _this=$(this);
                var as=$(this).text();
                $(this).hide();
                var xd= _this.next().val(as).show();
        });
        $('.inp').blur(function() {
            var _this = $(this);
            var data={};
            data.brand_url = _this.val();
            data.id = _this.parents('tr').attr('id');
            data.field = _this.parent().attr('field');
            // console.log(brand_id);
            // console.log(brand_name);
            // console.log(field);
            var url="/banner/jidian";
            $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
            $.ajax({
                type:"post",
                data:data,
                url:url,
                dataType:"json",
                success:function(res){
                    if(res.code==000000){
                        _this.hide();
                        //console.log(as);
                        _this.prev().text(data.brand_url).show();
                        alert(res.result.message);
                    }else{
                        _this.hide();
                        _this.prev().show();
                        alert(res.result.message);
                    }
//                    console.log(res);
//                    alert(res.result.message);
//                    if(res.message=='success'){
//                        window.location.href="/banner/index";
//                    }
                }
            })
        })
    })
</script>
