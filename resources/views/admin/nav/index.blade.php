<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8"/>
	<title>数据列表页面</title>
	<!-- layui.css -->
	<link href="{{ asset('admin/plugin/layui/css/layui.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin/css/list.css') }}" rel="stylesheet" />
	<style>
		.layui-btn-small {
			padding: 0 15px;
		}
		.layui-form-checkbox {
			margin: 0;
		}
		tr td:not(:nth-child(0)),
		tr th:not(:nth-child(0)) {
			text-align: center;
		}
		#dataConsole {
			text-align: center;
		}
		/*分页页容量样式*/
		/*可选*/
		.layui-laypage {
			display: block;
		}
		/*可选*/
		.layui-laypage > * {
			float: left;
		}
		/*可选*/
		.layui-laypage .laypage-extend-pagesize {
			float: right;
		}
		/*可选*/
		.layui-laypage:after {
			content: ".";
			display: block;
			height: 0;
			clear: both;
			visibility: hidden;
		}
		/*必须*/
		.layui-laypage .laypage-extend-pagesize {
			height: 30px;
			line-height: 30px;
			margin: 0px;
			border: none;
			font-weight: 400;
		}
		/*分页页容量样式END*/
		.layui-layer-title {
			font-size: 18px!important;
			color: #000!important;
			font: 18px "宋体","Arial Narrow",HELVETICA;
		}
		/*搜索框居中显示*/
		#articleIndexTop{
			width:50%;
			margin:0 auto;
		}
	</style>
</head>
<body>
<fieldset class="layui-elem-field layui-field-title">
	<legend>控制台</legend>
	<div class="layui-field-box">
		<div id="articleIndexTop">
			<form class="layui-form layui-form-pane" action="">
				<div class="layui-form-item" style="margin:0;margin-top:15px;">
					<div class="layui-inline">
						<label class="layui-form-label">分类</label>
						<div class="layui-input-inline">
							<select name="city">
								<option value="0"></option>
								<option value="1">类别1</option>
								<option value="2">类别2</option>
								<option value="3">类别3</option>
							</select>
						</div>
						<label class="layui-form-label">关键词</label>
						<div class="layui-input-inline">
							<input type="text" name="keywords" autocomplete="off" class="layui-input">
						</div>
						<div class="layui-input-inline" style="width:auto">
							<button class="layui-btn" lay-submit lay-filter="formSearch">搜索</button>
						</div>
					</div>
					<div class="layui-inline">
						<div class="layui-input-inline" style="width:auto">
							<a id="add" class="layui-btn layui-btn-normal">添加分类</a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</fieldset>
<fieldset class="layui-elem-field layui-field-title sys-list-field">
	<legend style="text-align:center;">文章列表</legend>
	<div class="layui-field-box">
		<div id="dataContent" class="">
			<table style="" class="layui-table" lay-even="">
				<thead>
				<tr>
					<th width="10%">id</th>
					<th>分类名称</th>
					<th>父级分类</th>
					<th width="10%">创建时间</th>
					<th width="10%">排序</th>
					<th colspan="2" width="8%">操作</th>
				</tr>
				</thead>
				<tbody>
				@foreach($data as $v)
				<tr>
					<td>{{$v->id}}</td>
					<td style="text-align:left;"><?php echo str_repeat('-',8*$v->level);?>{{$v->name}}</td>
					<td>{{$v->parent_id}}</td>
					<td>{{$v->create_time}}</td>
					<td>{{$v->sort}}</td>
					<td>
						<button class="layui-btn layui-btn-small layui-btn-normal" onclick="edit({{$v->id}})"><i class="layui-icon">&#xe642;</i></button>
					</td>
					<td>
						<button class="layui-btn layui-btn-small layui-btn-danger"><i class="layui-icon">&#xe640;</i></button>
					</td>
				</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</fieldset>
<!-- layui.js -->
<script src="{{asset('admin/plugin/layui/layui.js')}}"></script>
<script src="{{asset('admin/js/pagesize.js')}}"></script>
<script src="{{asset('admin/js/currency.js')}}"></script>
<script src="{{asset('admin/js/jquery-3.2.1.min.js')}}"></script>
<script>
	layui.use(['form'], function(){
		var form = layui.form
				,layer = layui.layer;
	});
</script>
<script>
	$('#add').click(function (){
		var title="添加分类";
		var url="{{ url('admin/category/create') }}";
		var w="100%";
		var h="100%";
		openurl(url,title,w,h);
	});
	function edit(act_id){
		var title="编辑分类";
		var u="{{url('admin/category/')}}";
		var u1=u+"/"+act_id+"/edit";
		console.log(u1);
		var w="100%";
		var h="100%";
		openurl(u1,title,w,h);
	}
</script>
</body>
</html>