<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8"/>
	<title>添加文章</title>
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
<form class="layui-form" action="{{url('admin/article')}}" method="post">
	{{csrf_field()}}
	<div class="layui-form-item">
		<label class="layui-form-label">标题</label>
		<div class="layui-input-block">
			<input type="text" name="name" placeholder="请输入标题" class="layui-input">
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">摘要</label>
		<div class="layui-input-block">
			<input type="text" name="abstract" placeholder="请输入摘要" class="layui-input">
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">分类</label>
		<div class="layui-input-block">
			<select name="category">
				@foreach($cate as $v)
					<option value="{{$v->id}}"><?php echo str_repeat('-',8*$v['level']);?>{{$v->name}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="layui-form-item layui-form-text">
		<label class="layui-form-label">文本域</label>
		<div class="layui-input-block">
			<textarea placeholder="请输入内容" class="layui-textarea" name="content"></textarea>
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">封面</label>
		<div class="layui-input-block">
			<input type="text" name="logo" placeholder="上传图片" class="layui-input">
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">选项</label>
		<div class="layui-input-block">
			<input type="checkbox" name="option" title="置顶" value="1">
			<input type="checkbox" name="option" title="推荐" value="2" checked="">
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-input-block">
			<button class="layui-btn" lay-submit="" lay-filter="formadd">立即提交</button>
			<button type="reset" class="layui-btn layui-btn-primary">重置</button>
		</div>
	</div>
</form>
<script>
	layui.use(['form'], function(){
		var form = layui.form()
				,layer = layui.layer;

		form.on('submit(formadd)', function(data){
			params = data.field;
			$.ajax({
				type: 'POST',
				url: "{{url('admin/article')}}",
				data: params,
				dataType: 'json',
				success: function(html){
					var data = $.parseJSON(html);
					layer.msg('操作成功',{icon:1,time:800});
					setTimeout(function(){
						window.parent.location.reload();
						var index = parent.layer.getFrameIndex(window.name); //获取当前窗体索引
						parent.layer.close(index); //执行关闭
					},1000);

				},
				error:function(data){
					layer.alert("数据库添加失败", {
						title: '添加结果'
					})
					console.log(data.msg);
				},
			});
			return false;
		});
	});
</script>
<!-- layui.js -->
<script src="{{asset('admin/plugin/layui/layui.js')}}"></script>
<script src="{{asset('admin/js/currency.js')}}"></script>
<script src="{{asset('admin/js/jquery-3.2.1.min.js')}}"></script>
<!-- layui规范化用法 -->
<script type="text/javascript">
	layui.config({
		base: '{{ asset('admin/js//') }}'
	}).use('/datalist');
</script>
</body>
</html>