<?php
$class3_ok='&class3='.$class3;
if($class_list[$classnow][module]!=$class_list[$class1][module]){
    $class1=$class2;
    $class2=$class3;
    $class3_ok='';
}
$moreurl = "{$_M[url][site]}{$class_list[$classnow][foldername]}/?lang={$_M[lang]}&class1={$class1}&class2={$class2}{$class3_ok}&mbpagelist=1";
$hx = 'hidden-xs';
$vxb = 'visible-xs-block';
if($pagenorerresh){//是否所有设备无刷新翻页
	$hx = 'hide';
	$vxb = '';
}
$pagetxt = $pagetxt?$pagetxt:$lang_ajaxpagemore;
echo <<<EOT
-->
<div class="{$hx}">{$page_list}</div>
<div class="met-page-ajax-body {$vxb} invisible" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">
	<button type="button" class="btn btn-default btn-block btn-squared ladda-button" id="met-page-btn" data-style="slide-left" data-url="{$moreurl}" data-page="{$page}"><i class="icon wb-chevron-down margin-right-5" aria-hidden="true"></i>{$pagetxt}</button>
</div>
<!--
EOT;
?>