<!--<?php
$sidebarnone = 1;
$lang_navfixedok = 0;
require_once template('head');
//让内容支持图片懒加载
$product['content'] = $metdispose->lazyload($product['content']);
for($i=1;$i<=($met_productTabok-1);$i++){
	$ptbname = 'met_productTabname_'.$i;
	$productTablist[$i]['title']   = $$ptbname;
	$productTablist[$i]['content'] = $metdispose->lazyload($product['content'.$i]);
}
echo <<<EOT
-->
<div class="page met-showproduct pagetype2 animsition" id="content-1">
<!--
EOT;
require_once template('modular/showproduct/fashion/navbar');
echo <<<EOT
-->
<!--
EOT;
require_once template('modular/showproduct/fashion/side');
echo <<<EOT
-->
<!--
EOT;
require_once template('modular/showproduct/fashion/content');
echo <<<EOT
-->
</div>
<!--
EOT;
require_once template('foot');
?>