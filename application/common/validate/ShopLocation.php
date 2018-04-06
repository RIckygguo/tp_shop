<?php
namespace app\common\validate;
use think\Validate;

class ShopLocation extends Validate {
	protected $rule = [
		['name', 'require', '商户名不能为空'],
		['logo', 'require', 'logo不能为空'],
		['address', 'require', '地址不能为空'],
		['tel', 'require', '总店联系电话不能为空'],
		['contact', 'require', '总店联系人不能为空'],
		['shop_id', 'require', '商户不能为空'],
		['open_time', 'require', '营业时间不能为空'],
		['is_main', 'in:0,1', '总店参数错误'],
		['city_id', 'require', '城市不能为空'],
		['city_path', 'require', '地区不能为空'],
		['cate_id', 'require', '一级分类不能为空'],
		['cate_path', 'require', '分类不能为空'],
	];
	protected $scene = [
		'add' => ['name','logo','address','tel','contact','shop_id','open_time','is_main','city_id','city_path','cate_id','cate_path'],
	];
}