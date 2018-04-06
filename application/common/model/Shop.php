<?php
namespace app\common\model;
use think\Model;

class Shop extends BaseModel {
	/**
	 * Function: 获取某状态下商户
	 * Writer: RickyGuo
	 * Date: 2018-4-6
	 * Description: 获取某状态下的商户记录
	 * @param status
	 **/
	public function getShop($status) {
		$data = [
			'status'	=> $status,
		];
		$order = [
			'list_order' => 'desc',
			'id'	=> 'desc',
		];
		return $this->where($data)->order($order)->paginate(7);
	}
	/**
	 * Function: getStatusAttr
	 * Writer: RickyGuo
	 * Date: 2018-4-6
	 * Description: status的状态修改器
	 * @param 
	 **/
	public function getStatusAttr($value) {
		$status = [	
			-1 => '<span class="label radius label-danger">不通过</span>',
			0 => '<span class="label radius label-warning">待审</span>',
			1 => '<span class="label radius label-success">通过</span>' ,
		];
		return $status[$value];
	}

	/**
	 * Function: getCount
	 * Writer: RickyGuo
	 * Date: 2018-4-6
	 * Description: 获取某状态下的记录数
	 * @param status 状态
	 **/
	public function getCount($status) {
		$data = [
			'status' => $status,
		];
		return $this->where($data)->count();
	}
}