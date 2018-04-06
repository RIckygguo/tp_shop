<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
//ajax返回给前端，数据以json格式传输
function show($status, $message, $data=array()) {
	$result = array(
		'status'	=> $status,
		'message'	=> $message,
		'data'		=> $data
	);
	exit(json_encode($result));
}


/**
 * Function: doCurl
 * Writer: RickyGuo
 * Date: 2018-3-15
 * Description: 使用Curl进行url请求
 * @param url 请求地址
 * @param type=0 0代表get 1代表post
 * @param data=[] 用于放置post请求携带的参数
 **/

function doCurl($url, $type=0, $data=[]) {
	$ch = curl_init();	//初始化
	//设置选项
	 curl_setopt($ch, CURLOPT_URL, $url);	//设置url
	 curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);	//不输出数据
	 curl_setopt($ch, CURLOPT_HEADER, FALSE);			//不输出header信息

	 if($type == 1) {
	 	//post方法
	 	curl_setopt($ch, CURLOPT_POST, TRUE);
	 	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	 }
	$output = curl_exec($ch);
	curl_close($ch);
	return $output;
}