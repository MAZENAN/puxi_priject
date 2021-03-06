<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="{{asset('admin/lib/html5shiv.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/lib/respond.min.js')}}"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="{{asset('admin/static/h-ui/css/H-ui.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('admin/static/h-ui.admin/css/H-ui.admin.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('admin/lib/Hui-iconfont/1.0.8/iconfont.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('admin/static/h-ui.admin/skin/default/skin.css')}}" id="skin" />
<link rel="stylesheet" type="text/css" href="{{asset('admin/static/h-ui.admin/css/style.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('public/page.css')}}">
<!--[if IE 6]>
<script type="text/javascript" src="{{asset('admin/lib/DD_belatedPNG_0.0.8a-min.js')}}" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>期刊列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 期刊管理 <span class="c-gray en">&gt;</span> 期刊列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c">
		<input type="text" name="" id="" placeholder=" 期刊名称" style="width:250px" class="input-text">
		<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜期刊</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a class="btn btn-primary radius" onclick="picture_add('添加期刊','{{url('admin/periodical/add')}}')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加期刊</a></span> <span class="r">共有数据：<strong>{{$periodicals->total()}}</strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">
					<th width="80">ID</th>
					<th width="150">分类</th>
					<th width="100">封面</th>
					<th width="100">期刊名称</th>
					<th width="100">cn</th>
					<th width="150">更新时间</th>
					<th width="60">期刊周期</th>
					<th width="60">发布状态</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
				@foreach($periodicals as $periodical)
				<tr class="text-c">
					<td>{{$periodical->id}}</td>
					<td>{{$periodical->tystrToName()}}</td>
					<td><div style="width: 100px;height: 130px;"><img width="100" class="picture-thumb" src="{{$periodical->imageUrl()}}"></div></td>
					<td class="text-l"><a class="maincolor" href="javascript:;" onClick="periodical_edit('查看详情','/admin/periodical/detail/{{$periodical->id}}','10001')">{{$periodical->title}}</a></td>
					<td class="text-c">{{$periodical->cn}}</td>
					<td>{{$periodical->updated_at}}</td>
					<td>{{$periodical->getCycle()}}</td>
					<td class="td-status"><span class="label @if($periodical->status==2) label-success @endif radius">{{$periodical->getStatus()}}</span></td>
					<td class="td-manage">@if($periodical->status==2)<a style="text-decoration:none" onClick="picture_stop(this,{{$periodical->id}})" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a> @else <a style="text-decoration:none" onClick="picture_start(this,{{$periodical->id}})" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a> @endif<a style="text-decoration:none" class="ml-5" onClick="periodical_edit('更改期刊信息','/admin/periodical/edit/{{$periodical->id}}',{{$periodical->id}})" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="picture_del(this,{{$periodical->id}})" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{$periodicals->appends($_GET)->links()}}
	</div>
</div>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{asset('admin/lib/jquery/1.9.1/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/lib/layer/2.4/layer.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/static/h-ui/js/H-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/static/h-ui.admin/js/H-ui.admin.js')}}"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{asset('admin/lib/My97DatePicker/4.8/WdatePicker.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/lib/datatables/1.10.0/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/lib/laypage/1.2/laypage.js')}}"></script>
<script type="text/javascript">
// $('.table-sort').dataTable({
// 	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
// 	"bStateSave": true,//状态保存
// 	"aoColumnDefs": [
// 	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
// 	  {"orderable":false,"aTargets":[0,8]}// 制定列不参与排序
// 	]
// });

/*期刊-添加*/
function picture_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}

/*期刊-查看*/
function picture_show(title,url,id){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}

/*期刊-审核*/
function picture_shenhe(obj,id){
	layer.confirm('审核文章？', {
		btn: ['通过','不通过'],
		shade: false
	},
	function(){
		$(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="picture_start(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
		$(obj).remove();
		layer.msg('已发布', {icon:6,time:1000});
	},
	function(){
		$(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="picture_shenqing(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">未通过</span>');
		$(obj).remove();
    	layer.msg('未通过', {icon:5,time:1000});
	});
}

/*期刊-下架*/
function picture_stop(obj,id){
	layer.confirm('确认要下架吗？',function(index){
		$.ajax({
			url:'/admin/periodical/statusOff/'+id,
			type:'get',
			error:function () {
					layer.msg('请重新尝试!',{icon: 5,time:1000});
			},
			success:function (data) {
				if (data==1) {
					$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="picture_start(this,'+id+')" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
					$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
					$(obj).remove();
					layer.msg('已下架!',{icon: 5,time:1000});
				}else{
					layer.msg('请重新尝试!',{icon: 5,time:1000});
				}
			}
		})

	});
}

/*期刊-发布*/
function picture_start(obj,id){
	layer.confirm('确认要发布吗？',function(index){
		$.ajax({
			url:'/admin/periodical/statusOn/'+id,
			type:'get',
			error:function () {

			},
			success:function (data) {
				if (data==1) {
					$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="picture_stop(this,'+id+')" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
					$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
					$(obj).remove();
					layer.msg('已发布!',{icon: 6,time:1000});
				}
			}
		})
	});
}

/*期刊-申请上线*/
function picture_shenqing(obj,id){
	$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">待审核</span>');
	$(obj).parents("tr").find(".td-manage").html("");
	layer.msg('已提交申请，耐心等待审核!', {icon: 1,time:2000});
}

/*期刊-编辑*/
function periodical_edit(title,url,id){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}

/*期刊-删除*/
function picture_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'GET',
			url: '/admin/periodical/delete/'+id,
			dataType: 'json',
			success: function(data){
				if (data.code==1){
					$(obj).parents("tr").remove();
					layer.msg(data.message,{icon:5,time:2000});
				}else{
					layer.msg(data.message,{icon:5,time:2000});
				}
			},
			error:function(data) {
				layer.msg('操作失败请重试!',{icon:5,time:2000});
			},
		});
	});
}
</script>
</body>
</html>