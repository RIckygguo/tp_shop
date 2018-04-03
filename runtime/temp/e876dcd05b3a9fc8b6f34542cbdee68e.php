<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:70:"D:\xampp\htdocs\tp_shop\public/../application/admin\view\city\add.html";i:1522766094;s:75:"D:\xampp\htdocs\tp_shop\public/../application/admin\view\Public\header.html";i:1521882563;s:75:"D:\xampp\htdocs\tp_shop\public/../application/admin\view\public\footer.html";i:1521010733;}*/ ?>
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
<article class="page-container">
    <form class="form form-horizontal" id="form-city-add">
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>地区名称：</label>
        <div class="formControls col-xs-8 col-sm-9" style="width: 350px;">
            <input type="text" class="input-text" value="" placeholder="" id="cityName" name="name">
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">地区分类：</label>
        <div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:300px;">
            <select class="select" name="parent_id" size="1">
                <option value="0">一级地区</option>
                <?php if(is_array($list) || $list instanceof \think\Collection): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
            </span> </div>
    </div>
    <div class="row cl">
        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
            <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;保存&nbsp;&nbsp;">
            <button class="btn radius" onClick="layer_close();">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
        </div>
    </div>
    </form>
</article>


<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="__STATIC__/admin/hui/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="__STATIC__/admin/hui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__STATIC__/admin/hui/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="__STATIC__/admin/hui/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="__STATIC__/admin/hui/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="__STATIC__/admin/hui/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="__STATIC__/admin/hui/lib/jquery.validation/1.14.0/messages_zh.js"></script> 
<script type="text/javascript">
var SCOPE = {
    'add_url' : "<?php echo url('City/save'); ?>",
};
$(function(){
    $('.skin-minimal input').iCheck({
        checkboxClass: 'icheckbox-blue',
        radioClass: 'iradio-blue',
        increaseArea: '20%'
    });
    $("#form-city-add").validate({
        rules:{
            cityName:{
                required:true,
                maxlength:16
            },
            parent_id:{
                required:true,
            },
        },
        onkeyup:false,
        focusCleanup:true,
        success:"valid",
        submitHandler:function(form) {
            $(form).ajaxSubmit({
                type :'post',
                'url' : SCOPE.add_url,
                'dataType' : 'json',
                success: function(result) {
                        if(result.status == 0) {
                            layer.msg(result.message, {icon:1, time:1000});
                            setInterval(function() {
                              var index = parent.layer.getFrameIndex(window.name);
                              parent.$('.btn-refresh').click();
                              parent.location.reload();
                              parent.layer.close(index);
                          }, 1000);
                        }
                        else {
                            layer.msg(result.message, {icon:2, time: 1000, width: 1000});
                        }
                }
            });
        }
    });
});

</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>