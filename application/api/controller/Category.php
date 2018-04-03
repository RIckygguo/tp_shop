<?php
namespace app\api\controller;
use think\Controller;

class Category extends Controller {
	private $db;
	public function _initialize() {
		$this->db = model('Category');
	}
	public function getCate() {
		$id = input('post.id', 0, 'intval');
		if(!$id) {
			show(1, 'id类型出错');
		} else {
			$cates = $this->db->getAllCate($id);
			if($cates) {
				show(0, '获取子分类成功', $cates);
			}
			else {
				show(1, '该分类下没有子分类');
			}
		}
	}
}