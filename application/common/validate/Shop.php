<?php
namespace app\common\validate;
use think\Validate;

class Shop extends Validate {
	protected $rule  = [
		['name', 'require|max:20' ,'商户名不能为空|商户名不能超过20个字符'],
		['email', 'require|email' ,'邮箱不能为空|不是合法邮箱'],
		['logo', 'require' ,'商户logo不能为空'],
		['license', 'require' ,'营业执照不能为空'],
		['description', 'max:5000' ,'商户介绍不能超过5000字'],
		['city_id', 'require|number' ,'城市不能为空|城市id应该为数字'],
		['city_path', 'require' ,'城市路径不能为空'],
		['bank_info', 'require' ,'银行账号不能为空'],
		['bank_user', 'require' ,'银行用户不能为空'],
		['bank_name', 'require' ,'银行名不能为空'],
		['responser', 'require|max:10' ,'法人姓名不能为空'],
		['responser_tel', 'require' ,'法人手机不能为空'],
	];
	protected $scene = [
		'add' => ['name','email','logo','license','description','city_id','city_path','bank_info','bank_user','bank_name','responser','responser_tel'],
	];
}