<?php
namespace app\admin\validate;
use think\Validate;

class Category extends Validate {
	//规则设置
	protected $rule = [
		['name', 'require|max:10', '分类名不能为空|分类名长度不能超过10个字符'],
		['parent_id', 'require|number', '一级分类名不能为空|一级分类名发生错误'],
		['status', 'number|in:-1,0,1'],
		['id', 'number'],
		['list_order', 'number|between:0,1000'],
	];
	//场景设置
	protected $scene = [
		'add' => ['name', 'parent_id'],
		'edit' => ['name', 'parent_id', 'id'],
		'change_status' => ['id', 'status'],
		'change_list'	=> ['id', 'list_order'],
	];
}
