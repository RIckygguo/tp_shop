<?php
namespace app\admin\validate;
use think\Validate;

class City extends Validate {
	//验证规则设置
	protected $rule = [
		['id', "number", "id必须为数字"],
		['name', "require|max:10", '地区名不能为空|地区名长度不能超过10个字符'],
		['list_order', 'number|between:0,1000', '排序号必须为数字|排序号必须在0-1000内'],
		['status', 'number|in:-1,0,1', '状态号必须为数字|未知状态'],
		['parent_id', 'require|number', '一级分类名不能为空|一级分类名发生错误'],
	];
	//验证场景设置
	protected $scene = [
		'add'	=> ['name', 'parent_id'],	
		'update' => ['name', 'parent_id'],
		'change_status' => ['id', 'status'],
		'change_order'	=> ['id', 'list_order'],

	];
}