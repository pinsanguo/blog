<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<title>不落阁后台管理系统</title>
	<link rel="shortcut icon" href="{{ asset('admin/images/Logo_40.png') }}" type="image/x-icon">
	<!-- layui.css -->
	<link href="{{ asset('admin/plugin/layui/css/layui.css') }}" rel="stylesheet" />
	<!-- 本页样式 -->
	<link href="{{ asset('admin/css/index.css') }}" rel="stylesheet" />
</head>
<body>
<div class="mask"></div>
<div class="main">
	<h1><span style="font-size: 84px;">B</span><span style="font-size:30px;">log</span></h1>
	<p id="time"></p>
	<div class="enter">
		Please&nbsp;&nbsp;Click&nbsp;&nbsp;Enter
	</div>
</div>
<!-- layui.js -->
<script src="{{ asset('admin/plugin/layui/layui.js') }}"></script>
<!-- layui规范化用法 -->
<script type="text/javascript">
	layui.config({
		base: '{{ asset('../admin/js/') }}'
	}).use('/index');
</script>
</body>
</html>
<script>
	layui.define(['layer', 'form'], function (exports) {
		var form = layui.form();
		//监听登陆提交
		form.on('submit(login)', function (data) {
			var index = layer.load(1);
			setTimeout(function () {
				//模拟登陆
				layer.close(index);
				if (data.field.account != 'lyblogscn' || data.field.password != '111111') {
					layer.msg('账号或者密码错误', { icon: 5 });
				} else {
					layer.msg('登陆成功，正在跳转......', { icon: 6 });
					layer.closeAll('page');
					setTimeout(function () {
						location.href = "{{ url('admin/main') }}";
					}, 1000);
				}
			}, 400);
			return false;
		});

	});
</script>