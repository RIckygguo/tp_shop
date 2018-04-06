<?php
namespace app\common\validate;
use think\Validate;

class Shopper extends Validate {
	protected $rule = [
		['username', 'require', '用户名不能为空'],
		['password', 'require', '密码不能为空'],
		['shop_id', 'require', '管理商户不能为空'],
		['is_main', 'in:0,1', '管理员参数错误'],
	];
	protected $scene = [
		'add' => ['username','password','shop_id','is_main'],

	];
}