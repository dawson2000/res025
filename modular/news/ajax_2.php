<?php
foreach($news_list as $key=>$val){
	$k=$news_headlines?$lang_news_headlines_num:0;//从指定条数
	if($key>=$k){
		if(!$val['issue'])$val['issue'] = $met_webname;
		$val['imgurl'] = "{$thumb_src}dir={$val['imgurl']}&x={$met_newsimg_x}&y={$met_newsimg_y}";
		$val['page'] = $mbpagelist?'page'.$page:'';
		$val['desc']=mb_substr($val['description'],0,$lang_news_des_max,'utf-8').'...';
		$original = 'data-original';
		if($key<4+$k&&!$mbpagelist) $original = 'src';
echo <<<EOT
-->
<li class="{$val['page']}">
	<div class="media media-lg">
		<div class="media-left">
			<a href="{$val[url]}" title="{$val[title]}" {$metblank}>
				<img class="media-object" {$original}="{$val[imgurl]}" style='height:150px;' alt="{$val[title]}">
			</a>
		</div>
		<div class="media-body">
			<h4 class="media-heading">
				<a href="{$val[url]}" title="{$val[title]}" {$metblank}>
					{$val['title']}
				</a>
			</h4>
			<p class="des">{$val['desc']}</p>
			<p class="info">
				<span>{$val['updatetime']}</span>
				<span>{$val['issue']}</span>
				<span><i class="icon wb-eye margin-right-5" aria-hidden="true"></i>{$val['hits']}  {$val['tag']}</span>
			</p>
		</div>
	</div>
</li>
<!--
EOT;
	}
}
?>