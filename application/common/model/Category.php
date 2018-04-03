<?php
namespace app\common\model;

use think\Model;

class Category extends Model
{
	protected $autoWriteTimestamp = true;
	//添加数据
	public function add($data) {
		$data['status'] = 1;
		return $this->save($data);
	}
	//获取一级分类
	public function getSelectCate() {
		$data = [
			'status' => 1,
			'parent_id' => 0,
		];
		$order = [
			'list_order' => 'desc',
			'id' 		=> 'desc',
		];
		return $this->where($data)->order($order)->select();
	}

	public function getCount($parent_id = 0) {
		$where = [
			'parent_id' => $parent_id,
		];
		return $this->where($where)->count();
	}
	//状态获取器
	public function getStatusAttr($value) {
		$status = [
			-1 => '<span class="label radius">禁用</span>',
		 	0 => '<span class="label radius label-warning">待审</span>',
		  	1 => '<span class="label radius label-success">正常</span>'
		  ];
		return $status[$value];
	}
	//获取所有分类
	public function getAllCate($parent_id = 0) {
		$order = [
			'status' => 'desc',
			'list_order' => 'desc',
			'id' => 'desc',
		];
		$where = [
			'parent_id' => $parent_id,
		];
		return $this->where($where)->order($order)->paginate(7);
	}

	public function changeStatus($data) {
		return $this->update($data);
	}
	public function changeList($data) {
		return $this->update($data);
	}

	//删除记录
	public function softDelete($where) {
		return $this->where($where)->delete(); 
	}
}