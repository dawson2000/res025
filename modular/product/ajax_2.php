<?php
echo <<<EOT
-->
<!--
EOT;
$i=0;
foreach($product_list as $key=>$val){
	$val['imgurl'] = "{$thumb_src}dir={$val[imgurl]}&x={$met_productimg_x}&y={$met_productimg_y}";
	if($_M['url']['shop']){
		$val['shopinfo'] = get_goods($val['id']);
		$val['price_str_html'] = "<p class='margin-bottom-0 margin-top-5 red-600'>{$val['shopinfo']['price_str']}</p>";
	}
	$val['page'] = $mbpagelist?'page'.$page:'';
	$original = 'data-original';
	if($i<4&&!$mbpagelist) $original = 'src';
	$shown=$i<4&&!$mbpagelist?'shown':'';
	$i++;
echo <<<EOT
-->
				<li class="widget {$val['page']} {$shown}">
					<div class="cover-body">
						<div class="cover overlay overlay-hover animation-hover">
							<a href="{$val[url]}" title="{$val[title]}" {$metblank}>
								<img class="cover-image overlay-scale" {$original}="{$val['imgurl']}" alt="{$val[title]}" style='height:200px;'>
								<figcaption class="overlay-panel overlay-background overlay-fade text-center vertical-align">
									<div class="vertical-align-middle">
										<h4 class="animation-slide-bottom">
											{$val[title]}
											{$val['price_str_html']}
										</h4>
									</div>
								</figcaption>
							</a>
						</div>
					</div>
				</li>
<!--
EOT;
}
echo <<<EOT
-->
<!--
EOT;
?>