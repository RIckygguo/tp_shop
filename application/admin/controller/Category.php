<?php
namespace app\admin\controller;
use think\Controller;

class Category extends Controller {
	private $db;
	private $validate;
	public function _initialize() {
		$this->db = model('Category');
		$this->validate = validate('Category');
	}
	//返回分类列表页
	public function index() {
		$parentId = input('get.parent_id', 0, 'intval');
		$cate = $this->db->getCate($parentId);
		$count = $this->db->getCount($parentId);
		$this->assign('cate', $cate);
		$this->assign('count', $count);
		return $this->fetch();
	}
	//添加分类页
	public function add() {
		$firstCate = $this->db->getSelectCate();
		$this->assign('firstCate', $firstCate);
		return $this->fetch();
	}

	public function update($data) {
		$res = $this->db->save($data, ['id' => $data['id']]);
		if($res) {
			show(0,'更新成功');
		}
		else {
			show(1,'更新失败');
		}
	}

	//保存数据
	public function save() {

		$data = request()->post();
		if(isset($data['id'])) {
			//修改数据

			//验证提交数据
			if(!$this->validate->scene('update')->check($data)) {
				show(1, $this->validate->getError());
			}
			return $this->update($data);
		}
		else {
			//新增数据

			//验证提交数据
			if(!$this->validate->scene('add')->check($data)) {
				show(1, $this->validate->getError());
			}
			//将数据提交至model层
			$res = $this->db->add($data);
			if($res) {
				show(0, '添加分类成功');
			}
			else {
			 	show(1, '添加分类失败');
			}
		}
		
	}


	public function edit($id) {
		$firstCate = $this->db->getSelectCate();
		$cate = $this->db->get($id);
		return $this->fetch('', [
			'cate' => $cate,
			'firstCate' => $firstCate,
		]);
	}

	public function changeStatus() {
		$data = request()->post();
		if(!$this->validate->scene('change_status')->check($data)) {
			show(1, $this->validate->getError());
		}
		$res =  $this->db->changeStatus($data);
		if($res) {
			show(0, '状态修改成功');
		}
		else {
			show(1, '状态修改失败');
		}
	}	

	public function changeList() {
		$data = request()->post();
		if(!$this->validate->scene('change_list')->check($data)) {
			show(1, $this->validate->getError());
		}
		$res = $this->db->changeList($data);
		if($res) {
			show(0, '排序修改成功');
		}
		else {
			show(1, '排序修改失败');
		}

	}

	public function delete() {
		$res = $this->db->softDelete(request()->post());
		if($res) {
			show(0, '删除成功');
		}
		else {
			show(1, '删除失败');
		}
	}
}
