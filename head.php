<?php
require_once template('modular/meta');
if($lang_yourcolors_ok)require_once template('modular/head/yourcolors');
$nav_shop=$_M['url']['shop']?' nav-shop':'';
$nav_langlist=$met_lang_mark && count($met_langok)>1 && !$lang_langlist_position?' nav-langlist':'';
if($lang_navfixedok){
	$fixed = 'navbar-fixed-top';
	$fixedbody =' class="met-navfixed"';
}
$index_h1=$index?1:3;
echo <<<EOT
-->
<body{$fixedbody}>
<!--[if lte IE 8]>
	<div class="text-center padding-top-50 padding-bottom-50 bg-blue-grey-100">
	<p class="browserupgrade font-size-18">你正在使用一个<strong>过时</strong>的浏览器。请<a href="http://browsehappy.com/" target="_blank">升级您的浏览器</a>，以提高您的体验。</p>
	</div>
<![endif]-->
<!--
EOT;
require_once template('modular/head/tophead');
echo <<<EOT
-->
<nav class="navbar navbar-default met-nav {$fixed}" role="navigation">
    <div class="container">
		<div class="row">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle hamburger hamburger-close collapsed"
				data-target="#navbar-default-collapse" data-toggle="collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="hamburger-bar"></span>
				</button>
<!--
EOT;
if($met_lang_mark && count($met_langok)>1 && !$lang_langlist_position) require_once template('modular/foot/langlist');
if((!$index && !$id)||$class_list[$classnow][module]==1){
echo <<<EOT
-->

				<h1 class='hide'>{$class_list[$classnow][name]}</h1>
<!--
EOT;
	if($class_list[$classnow][classtype]!=1){
echo <<<EOT
-->
				<h2 class='hide'>{$class_list[$class1][name]}</h2>

<!--
EOT;
	}
}else{
echo <<<EOT
-->
				<h2 class='hide'>{$class_list[$classnow][name]}</h2>
<!--
EOT;
}
echo <<<EOT
-->
			</div>
			<div class="collapse navbar-collapse navbar-collapse-toolbar{$nav_shop}{$nav_langlist}" id="navbar-default-collapse">
<!--
EOT;
if($_M['url']['shop']){
	require_once template('modular/shop/shop_head_user');
}
require_once template('modular/head/topnav');
echo <<<EOT
-->
			</div>
		</div>
	</div>
</nav>
<!--
EOT;
if(!$index){
	if($id){
		$banner_modular_hide=$lang_bannersubdet_modular_hide;
	}else{
		$banner_modular_hide=$lang_bannersub_modular_hide;
	}
	$modular_list = explode('|',$banner_modular_hide);
	foreach ($modular_list as $key => $val) {
		$module_list[$key]=modular_to_module($val);
	}
}
if(!in_array($class_list[$classnow][module],$module_list))require_once template('modular/head/banner');
if(!$index&&!$sidebarnone)require_once template('modular/head/sidebar');
?>