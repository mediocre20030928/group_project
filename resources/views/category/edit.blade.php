<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>头部-有点</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="/admin/css/css.css" />
    <script type="text/javascript" src="/admin/js/jquery.min.js"></script>
</head>
<body>
<div id="pageAll">
    <div class="pageTop">
        <div class="page">
            <img src="/admin/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
                        href="#">分类管理</a>&nbsp;-</span>&nbsp;分类添加
        </div>
    </div>
    <div class="page ">
        <!-- 上传广告页面样式 -->
        <div>
            <div class="baTop">
                <span>导航栏</span>
            </div>
            <div class="baBody">
                <div class="bbD">
                    分类名称：<input type="text" class="input1" name="cate_name" value="{{$res->cate_name}}"/>
                    <input type="hidden" name="id" value="{{$res->id}}"/>
                </div>
                <div class="bbD">
                    是否显示：<label><input type="radio" value="1" name="hidden" {{$res->hidden==1?"checked":''}}/>是</label>
                              <label><input type="radio" value="2" name="hidden" {{$res->hidden==2?"checked":''}}/>否</label>
                </div>
                <div class="bbD">
                    <p class="bbDP">
                        <button class="btn_ok btn_yes" href="#"id="btn">提交</button>
                        <a class="btn_ok btn_no" href="#">取消</a>
                    </p>
                </div>
            </div>
        </div>

        <!-- 上传广告页面样式end -->
    </div>
</div>
</body>
</html>
<script>
    $(document).ready(function(){
        $("#btn").click(function(){
            var data={};
            data.cate_name=$("input[name='cate_name']").val();
            data.hidden=$("input[name='hidden']:checked").val();
            data.id=$("input[name='id']").val();
            var url="/category/update";
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
        })
    })
</script>
