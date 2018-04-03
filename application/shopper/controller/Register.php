<?php
namespace app\shopper\controller;
use think\Controller;

class Register extends Controller {
	public function index() {
		return $this->fetch();
	}
}