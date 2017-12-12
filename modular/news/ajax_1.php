<?php
foreach($news_list as $key=>$val){
	$k=$news_headlines?$lang_news_headlines_num:0;//从指定条数
	if($key>=$k){
		if(!$val['issue'])$val['issue'] = $met_webname;
		$val['desc']=mb_substr($val['description'],0,$lang_news_des_max,'utf-8').'...';
echo <<<EOT
-->
<li>
	<h4>
		<a href="{$val[url]}" title="{$val[title]}" {$metblank}>
			{$val['title']}
		</a>
	</h4>
	<p class="des">{$val['desc']}</p>
	
</li>
<!--
EOT;
	}
}
?>