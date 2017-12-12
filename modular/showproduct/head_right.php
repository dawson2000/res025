<?php
if(count($product_paralist)){
	$blocks=$_M['url']['shop'] || $lang_product_pagetype ==2?'blocks-2 blocks-md-4':'blocks-2';
echo <<<EOT
-->
				<ul class="para {$blocks}">
<!--
EOT;
    foreach($product_paralist as $key=>$val){
		if($product[$val[para]]){
echo <<<EOT
-->
					<li>
						{$val[name]}：{$product[$val[para]]}
					</li>
<!--
EOT;
		}
    }
echo <<<EOT
-->
				</ul>
<!--
EOT;
}
?>