<?php
namespace app\admin\controller;
use think\Controller;

class Shop extends Controller {
	private $db;
	public function _initialize() {
		$this->db = model('Shop');
	}
	public function index() {
		return $this->fetch();
	}

	public function apply() {
		$list = $this->db->getShop(0);
		$count = $this->db->getCount(0);
		$this->assign('list', $list);
		$this->assign('count', $count);
		return $this->fetch();
	}

	public function changeStatus() {
		$data = request()->post();	
		$res = $this->db->where(['id' => $data['id']])->update(['status' => $data['status']]);
		if($res) {
			show(0, '审核成功');
		}
		show(1, '审核操作失败');
	}

	public function getCityPath($str) {
		if(preg_match('/,/', $str)){
			$cityPath = explode(',', $str);
			$city = model('City')->getCityName($cityPath[0]);
			$se_city = model('City')->getCityName($cityPath[1]);
			return $city[0].','.$se_city[0];
		}
		else {
			$city = model('City')->getCityName($str);
			return $city[0];
		}
	}
	public function getSeCate($str) {
		if(preg_match('/,/', $str)) {
			$catePath = explode(',', $str);
			$cate[0] = model('Category')->getCateName($catePath[0])[0];
			$cate[1] = "";
			$se_cate = explode('|', $catePath[1]);	
			foreach ($se_cate as $key => $value) {
				$cate[1] .= model('Category')->getCateName($value)[0].' ';
			}
			return $cate;
		}
		else {
			$cate = model('Category')->getCateName($str);
			return $cate;
		}
	}
	public function detail() {
		$data = request()->get();
		$shopDetail = $this->db->get($data['id']);
		$shopLocDetail = model('ShopLocation')->where(['is_main' => 1, 'shop_id' => $data['id']])->select();
		$shopDetail['city_path'] = $this->getCityPath($shopDetail['city_path']); 
		$shopLocDetail[0]['cate_path'] = $this->getSeCate($shopLocDetail[0]['cate_path']);
		$this->assign('shop',$shopDetail);
		$this->assign('loc', $shopLocDetail[0]);
		return $this->fetch();
	}
}