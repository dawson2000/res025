<?php
echo <<<EOT
-->
				<!--右侧开始-->
				<div class="col-md-3">
					<div class="row">
						<div class="panel product-hot">
							<div class="panel-body">
								<h2 class="margin-bottom-15 font-size-16 font-weight-300">{$lang_product_recommend}</h2>
								<ul class="blocks-2 blocks-sm-3 mob-masonry" data-scale='1'>
<!--
EOT;
$metlist_array=methtml_getarray('',$lang_product_hot_type,'','product',$lang_product_hot_num);
foreach($metlist_array as $key=>$val){
	$val['imgurl']="{$thumb_src}dir={$val[imgurl]}&x=250&y=250";
	if($_M['url']['shop']){
		$val['shopinfo'] = get_goods($val['id']);
		$val['price_str_html'] = "<p class='margin-bottom-0 red-600'>{$val['shopinfo']['price_str']}</p>";
	}
echo <<<EOT
-->
									<li>
										<a href="{$val[url]}" target="_blank" class="img" title="{$val[title]}">
											<img data-original="{$val[imgurl]}" class="cover-image" style='height:200px;' alt="{$val[title]}">
										</a>
										<a href="{$val[url]}" target="_blank" class="txt" title="{$val[title]}">{$val[title]}</a>
										{$val['price_str_html']}
									</li>
<!--
EOT;
}
echo <<<EOT
-->
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!--右侧结束-->
<!--
EOT;
?>