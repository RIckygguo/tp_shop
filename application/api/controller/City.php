<?php 
namespace app\api\controller;
use think\Controller;

class City extends Controller {
	private $db;
	public function _initialize() {
		$this->db = model('City');
	}
	public function getCity() {
		$id = input('post.id', 0, 'intval');
		if(!$id) {
			show(1, 'id类型出错');
			return;
		}
		$citys = $this->db->getAllCity($id);
		if($citys) {
			show(0, '获取子城市成功', $citys);
		}
		else {
			show(1, '获取子城市失败');
		}
	}
}