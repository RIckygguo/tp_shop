<?php
namespace app\api\controller;
use think\Controller;
use think\File;
use think\Request;
class Image extends Controller
{
	public function upload() {
		$file = Request::instance()->file('file');
		$info = $file->move('upload');
		if($info && $info->getPathName()) {
			return show(0, '上传成功', '/'.$info->getPathName());
		}
		return show(1, '上传失败');
	}
}