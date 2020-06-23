<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>广告-有点</title>
    <link rel="stylesheet" type="text/css" href="/admin/css/css.css" />
    <script type="text/javascript" src="/admin/js/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="/admin/js/page.js" ></script> -->
</head>

<body>
<div id="pageAll">
    <div class="pageTop">
        <div class="page">
            <img src="/admin/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
                    href="#">公共管理</a>&nbsp;-</span>&nbsp;意见管理
        </div>
    </div>
    <div class="page">
        <!-- banner页面样式 -->
        <div class="banner">
            <!-- banner 表格 显示 -->
            <div class="banShow">
                <table border="1" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="66px" class="tdColor tdC">序号</td>
                        <td width="315px" class="tdColor">名称</td>
                        <td width="308px" class="tdColor">链接</td>
                        <td width="180px" class="tdColor">排序</td>
                        <td width="125px" class="tdColor">操作</td>
                    </tr>
                    @foreach($arr as $k => $v)
                    <tr>
                        <td>{{$v->id}}</td>
                        <td>{{$v->name}}</td>
                        <td>{{$v->url}}</td>
                        <td>{{$v->sorts}}</td>
                        <td>
                            <a href="/banner/upd/{{$v->id}}"><img class="operation" i  data-id="{{$v->id}}" src="/admin/img/update.png"></a>
                            <img class="operation delban" id="del"  data-id="{{$v->id}}" src="/admin/img/delete.png">
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            {{$arr->links()}}
            <!-- banner 表格 显示 end-->
        </div>
        <!-- banner页面样式end -->
    </div>
</div>
</body>
</html>
<script type="text/javascript" src="/admin/js/jquery.min.js"></script>
<script>
    $(function(){
        $(document).on('click','#del',function(){
            var id = $(this).attr('data-id');
            var re = confirm("确认删除么?");
            if(re == true){
                $.ajax({
                    data:{id:id},
                    type:'post',
                    dataType:'json',
                    url:'/banner/del',
                    success:function (res) {
                        if(res.errno == '00000'){
                            location.href = '/banner/list';
                        }
                    }
                })
            }
        })
    })
</script>
