<?php
//如果二次开发需要增加新的主题设置选项，可以修改此函数，也可将此文件放到子主题里面覆盖修改，切勿修改函数名
function modown_custom_options(){
	$options = array();
	//选项示例，获取值的方法就是 _MBT('child_test1')

	/*$options[] = array(
		'name' => '子选项',
		'type' => 'heading');

	$options[] = array(
		'name' => '测试1',
		'id' => 'child_test1',
		'type' => "checkbox",
		'std' => false,
		'desc' => '开启');

	$options[] = array(
		'name' => '测试2',
		'id' => 'child_test2',
		'type' => "text",
		'desc' => '');*/

	return $options;
}