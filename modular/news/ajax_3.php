<?php
$news_ccimg_y_xs=round(400*$scale);
foreach($news_list as $key=>$val){
	$val['page'] = $mbpagelist?'page'.$page:'';
	$original='data-original';
	$srcset='data-srcset';
	if($key<1&&!$mbpagelist){
		$original='src';
		$srcset='srcset';
	}
	$height=$key>0 || $mbpagelist?" style='height:300px;'":'';
	if(!$val['issue']) $val['issue'] = $met_webname;
	$val['desc']=mb_substr($val['description'],0,$lang_news_des_max,'utf-8').'...';
	$val['imgurl_xs'] = "{$thumb_src}dir={$val[imgurl]}&x=400&y={$news_ccimg_y_xs}";
	$val[imgurl]="{$thumb_src}dir={$val[imgurl]}&x={$lang_news_ccimg_x}&y={$lang_news_ccimg_y}";
echo <<<EOT
-->
<div class="widget widget-article widget-shadow {$val['page']}">
	<div class="widget-header">
		<a href="{$val[url]}" title="{$val[title]}" {$metblank}>
			<img class="cover-image" {$original}="{$val[imgurl]}" {$srcset}='{$val['imgurl_xs']} 400w,{$val[imgurl]}' sizes='(max-width:479px) 400px,{$lang_news_ccimg_x}px'{$height} alt="{$val[title]}">
		</a>
	</div>
	<div class="widget-body">
		<h4 class="widget-title">
			<a href="{$val[url]}" title="{$val[title]}" {$metblank}>{$val[title]}</a>
		</h4>
		<p class="widget-metas">
			{$val['updatetime']}
			<span>{$val['issue']}</span>
			<span><i class="icon wb-eye margin-right-5" aria-hidden="true"></i>{$val['hits']}</span>
		</p>
		<p class="margin-bottom-0">{$val['desc']}</p>
	</div>
</div>
<!--
EOT;
}
?>