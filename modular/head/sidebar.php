<?php
$bordernone = $bordernone?'bordernone':'';
if($patternshow){
//面包屑导航
require_once template('modular/head/sidebar_crumbs');
}else{
//平铺导航
if(!$lang_showstyle1||!$class_list[$class1][index_num]==5){
	require_once template('modular/head/sidebar_tile');
}
}
?>