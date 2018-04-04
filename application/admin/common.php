<?php

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