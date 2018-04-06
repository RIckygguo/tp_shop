<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:78:"D:\xampp\htdocs\tp_shop\public/../application/shopper\view\register\index.html";i:1522981188;s:77:"D:\xampp\htdocs\tp_shop\public/../application/shopper\view\Public\footer.html";i:1522839327;}*/ ?>
<!DOCTYPE HTML>
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
<!-- <link rel="stylesheet" type="text/css" href="__STATIC__/admin/hui/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/admin/hui/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/admin/hui/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/admin/hui/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="__STATIC__/admin/hui/static/h-ui.admin/css/style.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/admin/css/common.css" /> -->
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.bootcss.com/normalize/8.0.0/normalize.min.css" rel="stylesheet">
<link href="__STATIC__/uploadify/uploadify.css">
	<title>商户注册页面</title>


	<style type="text/css">
		.header {
			height: 10%;
			padding-top: 15px;
			padding-bottom: 15px;
			border-bottom: 1px solid rgba(0,0,0,.1);
		}
		.divider {
			margin:0 15px;
			width:1px;
			height: 20px;
			border-left: 1px solid rgba(0,0,0,.3);
		}
		.nav-left span {
			font-size:18px;
			font-weight: bold;
		}
		.content h2 {
			width:100%;
			height: 60px;
			background-color: #E0FFFF;
			margin:0;
			padding:15px;
			padding-left: 50px;
			font-family: '微软雅黑';
		}
		.form-group {
			margin-top: 30px;
			margin-bottom: 30px;
		}
		.c-red {
			color: red;
		}
	</style>
</head>
<body>
	<div class="wrapper">
		<div class="header row">
			<div class="col-md-4 col-md-offset-1 nav-left">
				<img src="__STATIC__/images/logo.png" width="150" height="45">
				<span class="divider"></span>
				<span>商户入驻申请</span>
			</div>
		</div>
		<div class="content row">
			<h2>基本信息</h2>
			<form class="form-horizontal" action="<?php echo url('Register/add'); ?>" method="post">
				<div class="form-group">
					<label class="control-label col-md-3" for="name"><span class="c-red">*</span>商户名称：</label>
					<div class="col-md-4">
						<input type="text" name="name"  class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="city"><span class="c-red">*</span>所属城市：</label>
					<div class="col-md-3">
						<select name="city_id" class="form-control" id="city_id">
							<option value="0">--请选择--</option>
							<?php if(is_array($citys) || $citys instanceof \think\Collection): $i = 0; $__LIST__ = $citys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?> 
							<option value="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></option>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</div>
					<div class="col-md-3">
						<select name="se_city_id" class="form-control" id="se_city_id">
							<option value="0">--请选择--</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class= "control-label col-md-3" for="cate"><span class="c-red">*</span>商店分类：</label>
					<div class="col-md-3">
						<select name="cate_id" class="form-control" id="cate_id">
							<option value="0">--请选择--</option>
							<?php if(is_array($cates) || $cates instanceof \think\Collection): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
							<option value="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></option>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</div>
					<div class="col-md-3">
						<!-- <select name="se_cate_id" class="form-control" id="se_cate_id">
							<option value="0">--请选择--</option>
						</select> -->
						<div name="se_cate_id" id="se_cate_id">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="logo_val"><span class="c-red">*</span>商户LOGO：</label>
					<div class="col-md-4">
						<input type="file" name="upload_logo" id="upload_logo">
						<input type="hidden" name="logo_val" id="logo_val" value="">
						<div style="display: none;">
							<img src="" id="upload_logo_img" width="150" height="150">
							<span class="help-block">缩略图</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="name"><span class="c-red">*</span>营业执照：</label>
					<div class="col-md-4">
						<input type="file" name="license" id="upload_license" multiple="true">
						<input type="hidden" name="license_val" id="license_val" value="">
						<div style="display: none">
							<img src="" id="upload_license_img" width="150" height="150">
							<span class="help-block">缩略图</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="introduce"><span class="c-red">*</span>商户介绍：</label>
					<div class="col-md-6">
						<script type="text/javascript" id="editor1" name="introduce"></script>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="bank_info"><span class="c-red">*</span>银行账户：</label>
					<div class="col-md-4">
						<input type="text" name="bank_info" id="bank_info" class="form-control" >
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="bank_name"><span class="c-red">*</span>开户行名称：</label>
					<div class="col-md-4">
						<input type="text" name="bank_name" id="bank_name" class="form-control" >
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="bank_user"><span class="c-red">*</span>开户人姓名：</label>
					<div class="col-md-4">
						<input type="text" name="bank_user" id="bank_user" class="form-control" >
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="responser"><span class="c-red">*</span>法人姓名：</label>
					<div class="col-md-4">
						<input type="text" name="responser" id="responser" class="form-control" >
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="responser_tel"><span class="c-red">*</span>法人电话：</label>
					<div class="col-md-4">
						<input type="text" name="responser_tel" id="responser_tel" class="form-control" >
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="email"><span class="c-red">*</span>邮箱：</label>
					<div class="col-md-4">
						<input type="text" name="email" id="email" class="form-control" >
					</div>
				</div>
				<h2>总店信息</h2>
				<div class="form-group">
					<label class="control-label col-md-3" for="contact"><span class="c-red">*</span>负责人：</label>
					<div class="col-md-4">
						<input type="text" name="contact" id="contact" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="tel"><span class="c-red">*</span>联系电话：</label>
					<div class="col-md-4">
						<input type="text" name="tel" id="tel" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="address"><span class="c-red">*</span>商户地址：</label>
					<div class="col-md-4">
						<input type="text" name="address" id="address" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="open_time"><span class="c-red">*</span>营业时间：</label>
					<div class="col-md-4">
						<input type="text" name="open_time" id="open_time" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="description"><span class="c-red">*</span>门店介绍：</label>
					<div class="col-md-6">
						<script type="text/javascript" id="editor2" name="description"></script>
					</div>
				</div>
				<h2>管理员账号信息</h2>
				<div class="form-group">
					<label class="control-label col-md-3" for="username"><span class="c-red">*</span>用户名：</label>
					<div class="col-md-4">
						<input type="text" name="username" id="username" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="password"><span class="c-red">*</span>密码：</label>
					<div class="col-md-4">
						<input type="password" name="password" id="password" class="form-control">
					</div>
				</div>
				<div class="col-md-4 col-md-offset-3">
					<button class="btn btn-primary radius btn-block " type="submit">申请入驻</button>
				</div>
			</form>
		</div>
	</div>

	<!--_footer 作为公共模版分离出去-->
<!-- <script type="text/javascript" src="__STATIC__/admin/hui/lib/jquery/1.9.1/jquery.min.js"></script>  -->
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>

<script src="__STATIC__/shopper/js/common.js"></script>



	<script type="text/javascript" src="__STATIC__/ueditor/ueditor.config.js"></script>
	<script type="text/javascript" src="__STATIC__/ueditor/ueditor.all.js"></script>
	<script src="__STATIC__/uploadify/jquery.uploadify.min.js"></script>
	<script src="__STATIC__/shopper/js/image.js"></script>
	<script>
		var SCOPE = {
			'city_url' : "<?php echo url('api/City/getCity'); ?>",
			'cate_url' : "<?php echo url('api/Category/getCate'); ?>",
			'upload_url' : "<?php echo url('api/Image/upload'); ?>",
			'swf'	: "__STATIC__/uploadify/uploadify.swf",
		}
	</script>
	<script type="text/javascript">
		$(function(){
			var ue1 = UE.getEditor('editor1', {
				autoFloatEnabled: false,
				initialFrameHeight : 300
			});
			var ue2 = UE.getEditor('editor2', {
				autoFloatEnabled: false,
				initialFrameHeight : 300
			});
		});
	</script>
</body>
</html>