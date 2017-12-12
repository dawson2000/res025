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
		$val['price_str_html'] = "<p class='red-600 font-size-20'>{$val['shopinfo']['price_str']}</p>";
	}
	$val['page'] = $mbpagelist?'page'.$page:'';
	$original = 'data-original';
	if($i<4&&!$mbpagelist) $original = 'src';
	$shown=$i<4&&!$mbpagelist?'shown':'';
	$i++;
echo <<<EOT
-->
				<li class="{$val['page']} {$shown}">
					<div class="widget widget-shadow">
						<figure class="widget-header cover">
							<a href="{$val[url]}" title="{$val[title]}" {$metblank}>
								<img class="cover-image" {$original}="{$val['imgurl']}" alt="{$val[title]}" style='height:200px;'>
							</a>
						</figure>
						<div class="widget-body">
							<h4 class="widget-title">{$val['title']}</h4>
							{$val['price_str_html']}
<!--
EOT;
	foreach($product_paralist as $key=>$val2){
		//为了避免手机端无刷新分页出现白屏问题，不显示有权限参数
		if(!strstr($val[$val2[para]],'../include/access.php?metmemberforce=') && $val[$val2[para]]){
echo <<<EOT
-->
							<p class="widget-metas"><span>{$val2[name]} : {$val[$val2[para]]}</span></p>
<!--
EOT;
		}
	}
	if($val['description']){
echo <<<EOT
-->
							<p>{$val['description']}</p>
<!--
EOT;
	}
echo <<<EOT
-->
							<div class="widget-body-footer">
								<div class="widget-actions pull-right">
									<a href="{$val[url]}" title="{$val[title]}" >
										<i class="icon wb-eye" aria-hidden="true"></i>
										<span>{$val[hits]}</span>
									</a>
								</div>
								<a href="{$val[url]}" title="{$val[title]}" {$metblank} class="btn btn-outline btn-primary btn-squared">{$lang_product_listlook}</a>
							</div>
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