<?php
namespace app\shopper\controller;
use think\Controller;

class Register extends Controller {
	public function index() {
		$citys = model('City')->getCity();
		$cates = model('Category')->getAllCate();
		$this->assign('citys', $citys);
		$this->assign('cates', $cates);
		return $this->fetch();
	}
}