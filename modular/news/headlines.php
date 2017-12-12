<?php
echo <<<EOT
-->
<!--
EOT;
if($page==1&&!$class2){
	$news_headlines=1;
	$news_headlines_x=$lang_news_headlines_x?$lang_news_headlines_x:900;
	$news_headlines_y=$lang_news_headlines_y?$lang_news_headlines_y:300;
	$scale_headlines=$news_headlines_y/$news_headlines_x;
	$news_headlines_height_xs=round(400*$scale_headlines);
echo <<<EOT
-->
<div class="news-headlines" data-scale='{$scale_headlines}'>
<!--
EOT;
	$i=0;
	foreach($news_list as $key=>$val){
		$i++;
		$src=$i<1?'src':'data-lazy';
		$srcset=$i<1?'srcset':'data-srcset';
		$val[imgurl_xs] = "{$thumb_src}dir={$val[imgurl]}&x=400&y={$news_headlines_height_xs}";
		$val[imgurl]="{$thumb_src}dir={$val[imgurl]}&x={$news_headlines_x}&y={$news_headlines_y}";
echo <<<EOT
-->
		<div class='slick-slide'>
			<a href="{$val['url']}" title="{$val['title']}" {$metblank}>
				<img class="width-full" {$src}="{$val[imgurl]}" {$srcset}='{$val['imgurl_xs']} 400w,{$val[imgurl]}' sizes='(max-width:479px) 400px' style='height:200px;' alt="{$val[title]}">
				<div class="headlines-text">
					<h3>{$val['title']}</h3>
				</div>
			</a>
		</div>
<!--
EOT;
		if($i>=$lang_news_headlines_num)break;
	}
echo <<<EOT
-->
</div>
<!--
EOT;
}
echo <<<EOT
-->
<!--
EOT;
?>