<!--
 edit.blade.php
 Name：blog
 Author：wangsen
 Date: 2017
 -->
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8"/>
	<title>编辑分类</title>
	<!-- layui.css -->
	<link href="{{ asset('admin/plugin/layui/css/layui.css') }}" rel="stylesheet" />
	<style>
		.layui-form {
            width:60%;
            margin:0 auto;
            padding-top:30px;
		}
		.layui-form-label{
            color:#000;
        }
		body {
            font: 16px "宋体","Arial Narrow",HELVETICA;
		}
	</style>
</head>
<body>
<form class="layui-form" action="{{url('admin/category/'.$field->id)}}" method="post">
    <input type="hidden" name="_method" value="put">
{{csrf_field()}}
    <div class="layui-form-item">
        <label class="layui-form-label">分类名称</label>
        <div class="layui-input-block">
            <input type="text" name="name" placeholder="请输入分类名称" class="layui-input" value="{{$field->name}}">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">顶级分类</label>
        <div class="layui-input-block">
            <select name="parent_id">
                @foreach($cate as $v)
                <option value="{{$v->id}}"
                       @if($v->id == $field->parent_id)  selected="" @endif
                ><?php echo str_repeat('-',8*$v['level']);?>{{$v->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">排序</label>
        <div class="layui-input-block">
            <input type="text" name="sort" placeholder="排序" class="layui-input" value="{{$field->sort}}">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit="" lay-filter="formadd">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>
<!-- layui.js -->
<script src="{{asset('admin/plugin/layui/layui.js')}}"></script>
<script src="{{asset('admin/js/currency.js')}}"></script>
<script src="{{asset('admin/js/jquery-3.2.1.min.js')}}"></script>
<script>
    layui.use(['form'], function(){
        var form = layui.form()
                ,layer = layui.layer;

        form.on('submit(formadd)', function(data){
            params = data.field;
            $.ajax({
                type: 'POST',
                url: "{{url('admin/category/'.$field->id)}}",
                data: params,
                dataType: 'json',
                success: function(html){
                    layer.msg('操作成功',{icon:1,time:800});
                    setTimeout(function(){
                        window.parent.location.reload();
                        var index = parent.layer.getFrameIndex(window.name); //获取当前窗体索引
                        parent.layer.close(index); //执行关闭
                    },1000);
                },
                error:function(data){
                    layer.alert("数据库添加失败111", {
                        title: '添加结果'
                    })
                    console.log(data.msg);
                },
            });
            return false;
        });
    });
</script>
</body>
</html>