<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"D:\xampp\htdocs\tp_shop\public/../application/admin\view\shop\detail.html";i:1523008830;}*/ ?>
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
	<title>商户详情</title>


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
				<span>商户入驻申请详情页</span>
			</div>
		</div>
		<div class="content row">
			<h2>基本信息</h2>
			<div class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-md-3">商户名称：</label>
					<div class="col-md-4">
						<span class="form-control"><?php echo $shop['name']; ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="city">所属城市：</label>
					<div class="col-md-2">
						<span class="form-control"><?php echo $shop['city_path']; ?></span>
					</div>
					<div class="col-md-2">
						
					</div>
				</div>
				<div class="form-group">
					<label class= "control-label col-md-3" for="cate">商店分类：</label>
					<div class="col-md-2">
						<span class="form-control"><?php echo $loc['cate_path'][0]; ?></span>
					</div>
					<div class="col-md-3">
						<div name="se_cate_id" id="se_cate_id">
							<span class="form-control"><?php echo $loc['cate_path'][1]; ?></span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="logo_val">商户LOGO：</label>
					<div class="col-md-4">
							<img src="<?php echo $shop['logo']; ?>"  width="150" height="150">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="name">营业执照：</label>
					<div class="col-md-4">
							<img src="<?php echo $shop['license']; ?>" id="upload_license_img" width="150" height="150">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="introduce">商户介绍：</label>
					<div class="col-md-6">
						<?php echo $shop['description']; ?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="bank_info">银行账户：</label>
					<div class="col-md-4">
						<span class="form-control"><?php echo $shop['bank_info']; ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="bank_name">开户行名称：</label>
					<div class="col-md-4">
						<span class="form-control"><?php echo $shop['bank_name']; ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="bank_user">开户人姓名：</label>
					<div class="col-md-4">
						<span class="form-control"><?php echo $shop['bank_user']; ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="responser">法人姓名：</label>
					<div class="col-md-4">
						<span class="form-control"><?php echo $shop['responser']; ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="responser_tel">法人电话：</label>
					<div class="col-md-4">
						<span class="form-control"><?php echo $shop['responser_tel']; ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="email">邮箱：</label>
					<div class="col-md-4">
						<span class="form-control"><?php echo $shop['email']; ?></span>
					</div>
				</div>
				<h2>总店信息</h2>
				<div class="form-group">
					<label class="control-label col-md-3" for="contact">负责人：</label>
					<div class="col-md-4">
						<span class="form-control"><?php echo $loc['contact']; ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="tel">联系电话：</label>
					<div class="col-md-4">
						<span class="form-control"><?php echo $loc['tel']; ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="address">商户地址：</label>
					<div class="col-md-4">
						<span class="form-control"><?php echo $loc['address']; ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="open_time">营业时间：</label>
					<div class="col-md-4">
						<span class="form-control"><?php echo $loc['open_time']; ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="description">门店介绍：</label>
					<div class="col-md-6">
						<?php echo $loc['description']; ?>
					</div>
				</div>
				<div class="col-md-4 col-md-offset-3">
					<button class="btn btn-primary radius btn-block " type="submit">申请入驻</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>