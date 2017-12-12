<?php
echo <<<EOT
-->
					<div class="panel product-detail">
						<div class="panel-body">
							<ul class="nav nav-tabs nav-tabs-line met-showproduct-navtabs affix-nav">
								<li class="active"><a data-toggle="tab" href="#product-details" data-get="product-details">{$met_productTabname}</a></li>
<!--
EOT;
foreach($productTablist as $key=>$val){
	if($val[content]){
echo <<<EOT
-->
								<li><a data-toggle="tab" href="#product-content{$key}" data-get="product-content{$key}">{$val['title']}</a></li>
<!--
EOT;
	}
}
echo <<<EOT
-->
							</ul>
							<div class="tab-content">
								<div class="tab-pane met-editor lazyload clearfix active" id="product-details">
<!--
EOT;
if($_M['url']['shop']){
	require_once template('modular/showproduct/head_right');
}
echo <<<EOT
-->
									{$product[content]}
								</div>
<!--
EOT;
foreach($productTablist as $key=>$val){
	if($val[content]){
echo <<<EOT
-->
								<div class="tab-pane met-editor lazyload clearfix" id="product-content{$key}">
									{$val[content]}
								</div>
<!--
EOT;
	}
}
echo <<<EOT
-->
							</div>
						</div>
					</div>
<!--
EOT;
?>