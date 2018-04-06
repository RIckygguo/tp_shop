<?php
/**
 * File: Map.php
 * Writer: RickyGuo
 * Date: 2018-3-15
 * Description: 百度地图相关业务封装
 **/

class Map {
/**
 * Function: getLngLat
 * Writer: RickyGuo
 * Date: 2018-3-15
 * Description: 根据地址获取经纬度
 * @param $address 地址
 **/
	public static function getLngLat($address) {
		if(!$address) {
			return "";
		}
		// http://api.map.baidu.com/geocoder/v2/?address=北京市海淀区上地十街10号&output=json&ak=您的ak&callback=showLocation //GET请求
		$data = [
			'address' => $address,
			'output' => 'json',
			'ak'	=> config('map.ak'),
		];
		$api_url = config('map.baidu_map_url').config('map.geocoder')."?".http_build_query($data);
		// 1.file_get_contents($url)
		// 2.curl
		$res = doCurl($api_url);
		return json_decode($res,true);
	}


/**
 * Function: getStaticMap
 * Writer: RickyGuo
 * Date: 2018-3-15
 * Description: 根据坐标点/地址
 * @param 
 **/
	public static function getStaticMap($center) {
		if(!$center) {
			return "";
		}
		//http://api.map.baidu.com/staticimage/v2?ak=E4805d16520de693a3fe707cdc962045&mcode=666666&center=116.403874,39.914888&width=300&height=200&zoom=11  
		$data = [
			'center' => $center,
			'markers' => $center,
			'ouput'	=> 'json',
			'width' => config('map.width'),
			'height' => config('map.height'),
			'ak'	=> config('map.ak')
		];
		$api_url = config('map.baidu_map_url').config('map.staticimage')."?".http_build_query($data);
		$res = doCurl($api_url);
		return $res;
	}
}
