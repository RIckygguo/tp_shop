<?php
/**
 * File: City.php
 * Writer: RickyGuo
 * Date: 2018-3-24
 * Description: 城市管理控制器
 **/
namespace app\admin\controller;
use think\Controller;

class City extends Controller {
	private $db;
	private $validate;
	public function _initialize() {
		$this->db = model('City');
		$this->validate = validate('City');
	}

	/**
	 * Function: index
	 * Writer: RickyGuo
	 * Date: 2018-3-24
	 * Description: 首页 
	 * @param 
	 **/
	public function index() {
		// $parentId = request()->get();
		$parentId = input('get.parent_id', 0, 'intval');
		$citys = $this->db->getCity($parentId);
		$count = $this->db->getCount($parentId);
		$this->assign('citys', $citys);
		$this->assign('count', $count);
		return $this->fetch();
	}

	/**
	 * Function: add
	 * Writer: RickyGuo
	 * Date: 2018-3-29
	 * Description: 添加页
	 * @param 
	 **/
	public function add() {
		$list = $this->db->getSelectCity();
		$this->assign('list', $list);
		return $this->fetch();
	}

	/**
	 * Function: edid
	 * Writer: RickyGuo
	 * Date: 2018-3-30
	 * Description: 编辑页
	 * @param 
	 **/
	public function edit($id) {
		$list = $this->db->getSelectCity();
		$this->assign('list', $list);
		$city = $this->db->get($id);
		$this->assign('city', $city);
		return $this->fetch();
	}

	/**
	 * Function: changeStatus
	 * Writer: RickyGuo
	 * Date: 2018-3-30
	 * Description: 更改记录状态
	 * @param 
	 **/
	public function changeStatus() {
		$data = request()->post();
		if(!$this->validate->scene('change_status')->check($data)) {
			show(1, $this->validate->getError);
		}
		else {
			$res = $this->db->updateRecord($data);
			if($res) {
				show(0, '修改状态成功');
			}
			else {
				show(1, '修改状态失败');
			}
		}
	}

	/**
	 * Function: changeOrder
	 * Writer: RickyGuo
	 * Date: 2018-3-30
	 * Description: 改变记录排序次序
	 * @param 
	 **/
	public function changeOrder() {
		$data = request()->post();
		if(!$this->validate->scene('change_order')->check($data)) {
			show(1, $this->validate->getError());
		}
		else {
			$res = $this->db->updateRecord($data);
			if($res) {
				show(0, '修改状态成功');
			}
			else {
				show(1, '修改状态失败');
			}
		}
	}

	/**
	 * Function: save
	 * Writer: RickyGuo
	 * Date: 2018-3-30
	 * Description: 保存记录，包括记录的添加和修改
	 * @param 
	 **/
	public function save() {
		$data = request()->post();
		if(isset($data['id'])) {
			if(!$this->validate->scene('update')->check($data)) {
				show(1, $this->validate->getError());
			}
			else {
				$res = $this->db->updateRecord($data);
				if($res) {
					show(0, '修改地区成功');
				}
				else {
					show(1, '修改地区失败');
				}
			}
		} else {
			if(!$this->validate->scene('add')->check($data)) {
				show(1, $this->validate->getError());
			}
			else {
				$res = $this->db->add($data);
				if($res) {
					show(0, '新增地区成功');
				}
				else {
					show(1, '新增地区失败');
				}
			}
		}	
	}
}
