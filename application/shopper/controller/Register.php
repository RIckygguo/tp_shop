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

	public function add() {
		if(!request()->isPost()) {
			return $this->error('系统出错，应该是POST数据');
		}
		$data = input('post.');

		//商户入驻信息入表
		$shopValidate = validate('Shop');
		$shopData = [
			'name'	=> $data['name'],
			'email'	=> $data['email'],
			'logo'	=> $data['logo_val'],
			'license'	=> $data['license_val'],
			'description'	=> empty($data['introduce']) ? "" : $data['introduce'],
			'city_id'	=> $data['city_id'],
			'city_path'	=> empty($data['se_city_id']) ? $data['city_id'] : $data['city_id'].','.$data['se_city_id'],
			'bank_info'	=> $data['bank_info'],
			'bank_user' => $data['bank_user'],
			'bank_name'	=> $data['bank_name'],
			'money'	=> 0,
			'responser'	=> $data['responser'],
			'responser_tel'	=> $data['responser_tel'],
		];
		if(!$shopValidate->scene('add')->check($shopData)) {
			$this->error($shopValidate->getError());
			return;
		}
		$data['shop_id'] = model('Shop')->add($shopData);
		if(!$data['shop_id']) {
			$this->error('商户信息插入失败');
			return;
		}

		//初步信息加工
		//cate_path整理
		if(isset($data['se_cate'])) {
			$data['se_cate'] = implode('|', $data['se_cate']);
		}else {
			$date['se_cate'] = "";
		}
		//获取地址经纬度
		if($data['address']) {
			$map = \Map::getLngLat($data['address']);
			if($map['status'] != 0 || $map['result']['precise'] != 1 || empty($map)) {
				$this->error('地址经纬度获取失败，请输入准确的地址');
				model('Shop')->delete(['id'	=>	$data['shop_id'],]);
				return;
			}
		}else {
			$this->error('地址不能为空');
			model('Shop')->delete(['id'	=>	$data['shop_id'],]);
			return ;
		}
		//检查是否存在多个用户
		if(model('Shopper')->where(['username' => $data['username']])->select()) {
			$this->error('已有该用户名，请重新填写用户名');
			model('Shop')->delete(['id'	=>	$data['shop_id'],]);
			return ;
		}

		// //总店信息数据整理
		$shopLocationData = [
			'name' => $data['name'],
			'logo'	=> $data['logo_val'],
			'address' => $data['address'],
			'tel' => $data['tel'],
			'contact'	=> $data['contact'],
			'shop_id'	=> $data['shop_id'],
			'open_time' => $data['open_time'],
			'description' => empty($data['description']) ? '' : $data['description'],
			'is_main'	=> '1',
			'city_id'	=> $data['city_id'],
			'city_path'	=> empty($data['se_city_id']) ? $data['city_id'] : $data['city_id'].','.$data['se_city_id'],
			'cate_id'	=> $data['cate_id'],
			'cate_path'	=> empty($data['se_cate']) ? $data['cate_id'] : $data['cate_id'].','.$data['se_cate'],
			'xpoint'	=> $map['result']['location']['lng'],
			'ypoint'	=> $map['result']['location']['lat'],
		];
		//管理员信息数据整理
		$code = mt_rand(1, 10000);	//md5加盐值
		$shopperData = [
			'username'	=> $data['username'],
			'code'	=> $code,
			'password'	=> md5($data['password'].$code),
			'shop_id'	=> $data['shop_id'],
			'is_main'	=> 1,
		];


		//validate数据检查	
		$shopLocValidate = validate('shopLocation');
		if(!$shopLocValidate->scene('add')->check($shopLocationData)) {
			model('Shop')->delete(['id'	=>	$data['shop_id'],]);
			$this->error($shopLocValidate->getError());
		}
		$shopperValidate = validate('shopper');
		if(!$shopperValidate->scene('add')->check($shopperData)) {
			model('Shop')->delete(['id'	=>	$data['shop_id'],]);
			$this->error($shopperValidate->getError());
			return;
		}
	
		$res = model('shopLocation')->add($shopLocationData);
		if(!$res) {
			$this->error('总店信息插入失败');
			model('Shop')->delete(['id'	=>	$data['shop_id'],]);
			return;
		}
		$res = model('shopper')->add($shopperData);
		if(!$res) {
			$this->error('商户管理员插入失败');
			model('Shop')->delete(['id'	=>	$data['shop_id'],]);
			return;
		}

		//发送邮件通知用户
		$title = 'o2o商店平台入驻通知';
		$url = request()->domain().url('Shopper/Register/waitting', ['id' => $data['shop_id']]);
		$from = 'o2o商店平台';
		$content = "<h1>尊敬的客户:<h1><p>您的信息已经提交至平台审核。请耐心等待平台审核。点击链接<a href='".$url."' target='_blank'>查看审核进度</a></p>";
		\Email::sendEmail($data['email'], $from, $title, $content);

		$this->success('商户信息提交成功，等待平台审核，点击链接查看', url('Register/waitting', ['id' => $data['shop_id']]));

	}

	public function waitting() {
		$id = input('id', 0, 'intval');
		$res = model('Shop')->getStatus($id);
		if($res) {
			$this->assign('status', $res[0]);
		}
		else {
			$this->assign('status', -2);
		}
		return $this->fetch();
	}
}