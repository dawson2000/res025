<?php
$bannermain=$index||$met_bannerpagetype;
if($bannermain){
	$bn = array('ok','img','link','title','titlecolor','desc','desccolor','position','btn_title');//字段
	//第一个为变量关键词
	//第二个参数为需要获取哪些字段
	//第三个参数为
	$banner = $metdispose->varsToArr('banner',$bn);
}else{
	$banner = array();
	$i=0;
	foreach($met_flashimgall as $key=>$val){
		$banner[$i]['img'] = $val['img_path'];
		$banner[$i]['title'] = $val['img_title'];
		$banner[$i]['link'] = $val['img_link'];
		$i++;
	}
	$banner_page=' banner-ny-h';
}
$page_top_bgcolor=$lang_page_top_bgcolor?"background-color:{$lang_page_top_bgcolor};":'';
$bnum = count($banner);
if($bnum){
	if($index){
		if($lang_bannertype){
			$bannertype=' fixedheight';
			$banner_height="{$met_flash_y}|{$lang_banner_height_sm}|{$lang_banner_height_xs}";

		}
	}else if($lang_bannersubtype){
		$bannertype=' fixedheight';
		$banner_height="{$met_flash_y}|{$lang_bannersub_height_sm}|{$lang_bannersub_height_xs}";
	}
	$banner_cut_xs='&x=767';
	if($banner_height){//固定高度模式
		$banner_cut_y=explode('|',$banner_height);
		switch (useragent()) {
			case 'mobile':
				$banner_height_load=$banner_cut_y[2];
				break;
			case 'tablet':
				$banner_height_load=$banner_cut_y[1];
				break;
			default:
				$banner_height_load=$banner_cut_y[0];
				break;
		}
		$banner_height_load=$banner_height_load?"height:{$banner_height_load}px;":'';//预设固定高度
		$banner_cut_pc_y=$banner_cut_y[0]?$banner_cut_y[0]:($bannermain?300:150);
		$banner_cut_sm_y=$banner_cut_y[1]?$banner_cut_y[1]:($bannermain?150:100);
		$banner_cut_xs_y=$banner_cut_y[2]?$banner_cut_y[2]:($bannermain?150:100);
		$banner_cut_xs.="&y={$banner_cut_xs_y}";
	}
	$is_tablet=useragent('tablet');
echo <<<EOT
-->
<div class="met-banner{$banner_page}{$bannertype}" data-height='{$banner_height}' style='{$page_top_bgcolor}{$banner_height_load}'>
<!--
EOT;
	$i=0;
	foreach($banner as $key=>$val){
		$src=$i<2?'src':'data-lazy';
		$srcset=$i<2?'srcset':'data-srcset';
		$val[img_pc]=$val[img];
		if($banner_height){//固定高度模式
			$val[img_pc]="{$thumb_src}dir={$val[img]}&x=1920&y={$banner_cut_pc_y}";
			if($is_tablet) $val[imgurl_sm]="{$thumb_src}dir={$val[img]}&x=991&y={$banner_cut_sm_y} 991w,";
		}
		$val['img_xs'] = "{$thumb_src}dir={$val[img]}".$banner_cut_xs;
		$val[alt]=$val[title]?$val[title]:$class_list[$classnow][name];
		$i++;
echo <<<EOT
-->
		<div class="slick-slide">
			<img class="cover-image" {$src}="{$val[img_pc]}" {$srcset}='{$val['img_xs']} 767w,{$val[imgurl_sm]}{$val[img_pc]}' sizes="(max-width: 767px) 767px" alt="{$val[alt]}">
<!--
EOT;
		if($val['title']){
			$val[titlecolor]=$bannermain?$val[titlecolor]:$lang_bannersub_color;
			$val[titlecolor]=$val[titlecolor]?" style='color:{$val[titlecolor]}'":'';
			$val[desccolor]=$val[desccolor]?" style='color:{$val[desccolor]}'":'';
echo <<<EOT
-->
			<div class="banner-text p-{$val['position']}">
				<div class='container'>
					<div class='banner-text-con'>
						<div>
							<h4 class="animation-slide-top"{$val[titlecolor]}>{$val['title']}</h4>
<!--
EOT;
			if($val['desc']){
echo <<<EOT
-->
							<p class="animation-slide-bottom animation-delay-300"{$val[desccolor]}>{$val['desc']}</p>
<!--
EOT;
			}
echo <<<EOT
-->
						</div>
					</div>
				</div>
            </div>
<!--
EOT;
		}
		if($val['link']){
echo <<<EOT
-->
			<a href="{$val[link]}" title="{$val[title]}" {$metblank}></a>
<!--
EOT;
		}
echo <<<EOT
-->
		</div>
<!--
EOT;
	}
echo <<<EOT
-->
</div>
<!--
EOT;
}else if(!$index){
	$h=$id?'h2':'h1';
	$bannersub_color=$lang_bannersub_color?" style='color:{$lang_bannersub_color};'":'';
echo <<<EOT
-->
<div class="met-banner-ny vertical-align text-center" style='{$page_top_bgcolor}'>
	<{$h} class="vertical-align-middle"{$bannersub_color}>{$class_list[$class1][name]}</{$h}>
</div>
<!--
EOT;
}
?>