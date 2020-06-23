<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>头部-有点</title>
    <link rel="stylesheet" type="text/css" href="/admin/css/css.css" />
    <script type="text/javascript" src="/admin/js/jquery.min.js"></script>
</head>
<body>
@csrf
<div id="app">
    <div id="pageAll">
        <div class="pageTop">
            <div class="page">
                <img src="/admin/img/coin02.png" /><span><a href="#">首页</a>
            </div>
        </div>
        <div class="page ">
            <!-- 上传广告页面样式 -->
            <div>
                <div class="baTop">
                    <span>修改</span>
                </div>
                <div class="baBody">
                    <div class="bbD">
                        名称：<input type="text" class="input1" name="name" value="{{$arr->name}}"/>
                    </div>
                    <div class="bbD">
                        链接：<input type="text" class="input1" value="{{$arr->url}}" name="url"/>
                    </div>
                    <input type="hidden" name="id" value="{{$arr->id}}">
                    <div class="bbD">
                        是否显示：<label><input type="radio" name="hidden" value="是"/>是</label>
                        <label><input type="radio" name="hidden" checked value="否"/>否</label>
                    </div>
                    <div class="bbD">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;排序：<input class="input2" value="{{$arr->sorts}}" name="sorts" type="text"/>
                    </div>
                    <div class="bbD">
                        <p class="bbDP">
                            <button class="btn_ok btn_yes" id="do_upd">提交</button>
                            <a class="btn_ok btn_no" href="#">取消</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- 上传广告页面样式end -->
    </div>
</div>
</body>
</html>
<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
<script>
    $(function(){
        $(document).on('click','#do_upd',function(){
            var data = {};
            data.name = $('input[name=name]').val();
            data.url = $('input[name=url]').val();
            data.hidden = $('input[name=hidden]').val();
            data.sorts = $('input[name=sorts]').val();
            data.id = $('input[name=id]').val();
            $.ajax({
                data:data,
                type:'post',
                dataType:'json',
                url:'/banner/do_upd',
                success:function(res){
                    if(res.errno == '00000'){
                        location.href = '/banner/list'
                    }
                }
            });
        });
    })
</script>
