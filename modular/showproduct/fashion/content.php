<?php
echo <<<EOT
-->
	<div class="content content-1">
		<div class="container">
			<div class="row">
				<div class="met-editor lazyload clearfix">
<!--
EOT;
if($product[description] && $lang_pro_des_open){
echo <<<EOT
-->
				<p class="description">{$product[description]}</p>
<!--
EOT;
}
echo <<<EOT
-->
					{$product[content]}
				</div>
			</div>
		</div>
	</div>
<!--
EOT;
$i=1;
foreach($productTablist as $key=>$val){
	if($val[content]){
		$i++;
echo <<<EOT
-->
	<div class="content content-{$i}" id="content-{$i}">
		<div class="container">
			<div class="row">
				<div class="met-editor lazyload clearfix">
					{$val[content]}
				</div>
			</div>
		</div>
	</div>
<!--
EOT;
	}
}
echo <<<EOT
-->
<!--
EOT;
if(count($product_paralist)){
	$i++;
echo <<<EOT
-->
	<div class="content content-{$i}" id="content-{$i}">
		<div class="container">
<!--
EOT;
	require_once template('modular/showproduct/head_right');
echo <<<EOT
-->
		</div>
	</div>
<!--
EOT;
}
if($lang_sharecode){
echo <<<EOT
-->
	<div class="tools container margin-vertical-15">{$lang_sharecode}</div>
<!--
EOT;
}
?>