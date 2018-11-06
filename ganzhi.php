<?php 
//日干支计算
//2018-11-06
//wontind@qq.com
//http://wontind.com
//兵玄科技
// $_cen//世纪数century
// $_year//年
// $_mon//月
// $_day//日
// $_gan//天干
// $_zhi//地支
// $_oe日为奇数则为0，偶数为6
//  1  2  3  4  5  6  7  8  9  10 11 12
// 子 丑 寅  卯 辰 巳 午 未 申 酉 戌 亥
// 甲 乙 丙  丁 戊 己 庚 辛 壬 癸
$_year =20180;
$_mon =14;
$_day =16;
$gan_arr=array('癸','甲','乙','丙','丁','戊','己','庚','辛','壬');
$zhi_arr =array('亥','子','丑','寅','卯','辰','巳','午','未','申','酉','戌');
//时间		正确		测错误   相差
//2017-3-10 丙申日		丙申
//2016-4-11 癸亥日		癸巳      +6
//2014-5-22 癸巳日		癸巳
//2014-5-12 癸未日		癸未
//2014-5-11	壬午日		壬午
//2011-7-7	癸亥日		癸亥
//2011-8-7	甲午日		甲子	  +6

$show =_day_gan_zhi(2016,4,11);
print_r($show);
echo $gan_arr[$show['gan']];
echo $zhi_arr[$show['zhi']];
// echo _odd_even(21);
// echo floor(($_cen-1)/4);
/**
 * 日干支计算方法
 * 
 * [_day_gan_zhi description]
 * @param  [type] $_year [description]
 * @param  [type] $_mon  [description]
 * @param  [type] $_day  [description]
 * @return [type]  array      [description]
 */
function _day_gan_zhi($_year,$_mon,$_day){
	$_gan_zhi=array();
	$_cen =_year_to_century($_year);
	$_year_end =$_year -($_cen -1)*100;
	$_oe =_odd_even($_mon);//奇偶计算
	
	$_gan_zhi['gan'] =(4*($_cen-1)+floor(($_cen-1)/4) + (5*$_year_end) + floor($_year_end/4) + floor(3*($_mon+1)/5) + $_day -3)%10;
	$_gan_zhi['zhi'] =(8*($_cen-1)+floor(($_cen-1)/4) + (5*$_year_end) + floor($_year_end/4) + floor(3*($_mon+1)/5) + $_day +7 +$_oe )%12;
	return $_gan_zhi;
}
/**
 * 年转换成世纪
 * [_year_to_century description]
 * @param  [type] $year [description]
 * @return [type]       [description]
 */
function _year_to_century($year){
	$cen =floor($year/100) +1;
	return $cen;
}

/**
 * 日地支专用
 * [_odd_even description]月为奇数则为0，偶数为6
 * @param  [type] $day [description]
 * @return [type]      [description]
 */
function _odd_even($mon){
	if($mon%2!=0){
		return 0;
	}
	else{
		return 6;
	}
}



 ?>

