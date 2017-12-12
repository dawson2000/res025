<?php
echo <<<EOT
-->
<!--
EOT;
if($_M['url']['shop']){
require_once template('modular/shop/shop_fashion_modal');
}
echo <<<EOT
-->
	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
<!--
EOT;
if($_M['url']['shop']){
require_once template('modular/shop/shop_fashion_btn');
}
echo <<<EOT
-->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-target="#navbar-showproduct-pagetype2"
				data-toggle="collapse">
					<span class="sr-only">Toggle navigation</span>
					<i class="icon wb-chevron-down" aria-hidden="true"></i>
				</button>
				<h1 class="navbar-brand">{$product['title']}</h1>
			</div>
			<div class="collapse navbar-collapse navbar-collapse-toolbar" id="navbar-showproduct-pagetype2">
				<ul class="nav navbar-toolbar navbar-right met-showproduct-navtabs">
					<li class="active"><a href="#content-1">{$met_productTabname}</a></li>
<!--
EOT;
$i=1;
foreach($productTablist as $key=>$val){
	if($val[content]){
		$i++;
echo <<<EOT
-->
					<li><a href="#content-{$i}">{$val['title']}</a></li>
<!--
EOT;
	}
}
echo <<<EOT
-->
<!--
EOT;
$i++;
if(count($product_paralist)){
echo <<<EOT
-->	
					<li><a href="#content-{$i}">{$lang_specpara}</a></li>
<!--
EOT;
}
echo <<<EOT
-->	
				</ul>
			</div>
		</div>
	</nav>
<!--
EOT;
?>