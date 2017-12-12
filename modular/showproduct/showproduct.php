<!--<?php
$patternshow = 1;
require_once template('head');
//让内容支持图片懒加载
$product['content'] = $metdispose->lazyload($product['content']);
//获取选项卡数量
for($i=1;$i<=($met_productTabok-1);$i++){
	$ptbname = 'met_productTabname_'.$i;
	$productTablist[$i]['title']   = $$ptbname;
	$product['content'.$i] = $metdispose->lazyload($product['content'.$i]);
	$productTablist[$i]['content'] = $product['content'.$i];
}
echo <<<EOT
-->
<div class="page met-showproduct pagetype1 animsition">
<!--
EOT;
require_once template('modular/showproduct/head');
echo <<<EOT
-->
	<div class="met-showproduct-body">
		<div class="container">
			<div class="row no-space">
				<div class="col-md-9 product-content-body">
					<div class="row">
<!--
EOT;
require_once template('modular/showproduct/tabs');
echo <<<EOT
-->
					</div>
				</div>
<!--
EOT;
require_once template('modular/showproduct/hot');
echo <<<EOT
-->
			</div>
		</div>
	</div>
</div>
<!--
EOT;
require_once template('foot');
?>