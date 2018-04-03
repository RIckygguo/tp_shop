<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:72:"D:\xampp\htdocs\tp_shop\public/../application/admin\view\city\index.html";i:1522766096;s:75:"D:\xampp\htdocs\tp_shop\public/../application/admin\view\Public\header.html";i:1521882563;s:75:"D:\xampp\htdocs\tp_shop\public/../application/admin\view\public\footer.html";i:1521010733;}*/ ?>
﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="__STATIC__/admin/hui/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/admin/hui/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/admin/hui/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/admin/hui/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="__STATIC__/admin/hui/static/h-ui.admin/css/style.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/admin/css/common.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>O2O管理平台</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 地区管理 <span class="c-gray en">&gt;</span> 地区列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"> <a href="javascript:;" onclick="addRecord('添加地区','<?php echo url('City/add'); ?>','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加地区</a></span> <span class="r">共有数据：<strong><?php echo $count; ?></strong> 条</span> </div>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="9">地区列表</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="40">ID</th>
				<th width="150">地区名</th>
				<th width="90">排列序号</th>
				<th width="150">加入时间</th>
				<th width="100">状态</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($citys) || $citys instanceof \think\Collection): $i = 0; $__LIST__ = $citys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<tr class="text-c">
				<td><input type="checkbox" value="" name=""></td>
				<td><?php echo $vo['id']; ?></td>
				<td><?php echo $vo['name']; ?></td>
				<td onClick="changeOrder(this, <?php echo $vo['id']; ?>)"><?php echo $vo['list_order']; ?></td>
				<td><?php echo date('y-m-d H:i', $vo['create_time']); ?></td>
				<td class="td-status">
					<?php if(strpos($vo['status'], '正常') != FALSE): ?>
						<a style="text-decoration: none;" href="javascript:;" onClick="stopStatus(this, <?php echo $vo['id']; ?>)" title="下审"><?php echo $vo['status']; ?></a>
					<?php else: ?>
						<a style="text-decoration: none;" href="javascript:;" onClick="startStatus(this, <?php echo $vo['id']; ?>)" title="通过审核"><?php echo $vo['status']; ?></a>
					<?php endif; ?>

					
				</td>
				
					<td class="td-manage">
							<a style="text-decoration: none" onclick="" href="<?php echo url('City/index', ['parent_id' => $vo['id']]); ?>" title="获取子栏目">获取子地区</a>
								<a title="编辑" href="javascript:;" onclick="editRecord('地区编辑', '<?php echo url('City/edit', ['id'=> $vo['id']]); ?>','2','800','500')" class="ml-5" style="text-decoration:none">
									<i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;" onclick="deleteStatus(this,<?php echo $vo['id']; ?>)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i>
									</a>
								</td>
			</tr>
			<?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
	<div class="cl pd-5 bg-1 bk-gray mt-20 tp-shop"><?php echo $citys->render();; ?></div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="__STATIC__/admin/hui/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="__STATIC__/admin/hui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__STATIC__/admin/hui/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="__STATIC__/admin/hui/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="__STATIC__/admin/hui/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="__STATIC__/admin/hui/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="__STATIC__/admin/hui/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript" src="__STATIC__/admin/js/common.js"></script>

<script type="text/javascript">
var SCOPE = {
	change_status_url : "<?php echo url('City/changeStatus'); ?>",
	list_url : "<?php echo url('City/changeOrder'); ?>",
}
/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/
</script>
</body>
</html>