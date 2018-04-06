<?php
namespace app\common\model;
use think\Model;

class City extends Model {
	protected $autoWriteTimestamp = true;

	/**
	 * Function: getCity
	 * Writer: RickyGuo
	 * Date: 2018-3-24
	 * Description: 获取parent_id下有关的地区记录
	 * @param parent_id=0 一级地区
	 **/
	public function getCity($parent_id = 0) {
		$data = [
			'parent_id' => $parent_id,
		];
		$order = [
			'status' => 'desc',
			'list_order' => 'desc',
			'id' => 'desc',
		];
		return $this->where($data)->order($order)->paginate(7);
	}
	/**
	 * Function: getAllCity
	 * Writer: RickyGuo
	 * Date: 2018-4-3
	 * Description: 获取所有城市
	 * @param 
	 **/
	public function getAllCity($parent_id = 0) {
		$data = [
			'parent_id' => $parent_id,
			'status'	=> 1,
		];
		$order = [
			'list_order' => 'desc',
			'id' => 'desc',
		];
		return $this->where($data)->order($order)->select();
	}
	/**
	 * Function: getSelectCity
	 * Writer: RickyGuo
	 * Date: 2018-3-29
	 * Description: 添加页中获取地区名
	 * @param 
	 **/
	public function getSelectCity() {
		//return $this->where('parent_id', 0)->column('id', 'name');
		return $this->where('parent_id', 0)->select();
	}

	/**
	 * Function: getCount
	 * Writer: RickyGuo
	 * Date: 2018-3-24
	 * Description: 获取所有记录的条数
	 * @param parent_id=0 一级地区
	 **/
	public function getCount($parent_id = 0) {
		$data = [
			'parent_id' => $parent_id,
		];
		return $this->where($data)->count();
	}

	/**
	 * Function: getStatusAttr
	 * Writer: RickyGuo
	 * Date: 2018-3-24
	 * Description: 状态修改器
	 * @param 
	 **/
	public function getStatusAttr($value) {
		$status = [
			-1 => '<span class="label radius">禁用</span>',
		 	0 => '<span class="label radius label-warning">待审</span>',
		  	1 => '<span class="label radius label-success">正常</span>' 
		];
		return $status[$value];

	}

	/**
	 * Function: add
	 * Writer: RickyGuo
	 * Date: 2018-3-24
	 * Description: 将数据保存至数据库
	 * @param $data 所有获取的数据
	 **/
	public function add($data) {
		$data['status'] = 1;
		return $this->save($data);
	}

	/**
	 * Function: updateRecord
	 * Writer: RickyGuo
	 * Date: 2018-3-30
	 * Description: 更新数据
	 * @param  $data 所有获取的数据
	 **/ 
	public function updateRecord($data) {
		return $this->save($data, ['id' => $data['id']]);
	}

	/**
	 * Function: getCityName
	 * Writer: RickyGuo
	 * Date: 2018-4-6
	 * Description: 获取城市名
	 * @param id 城市id
	 **/
	public function getCityName($id) {
		return $this->where(['id'=>$id])->column('name');
	}
}