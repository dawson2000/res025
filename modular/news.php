<?php
if($lang_home_news_ok){
	$news=tmpcentarr($lang_home_news_id);
	$news_module=$class_list[$news['id']][module];
	$news_img_size=modular_img_size($news_module);
	$scale=520/344;
echo <<<EOT
-->
	<div class="met-index-news met-index-body">
		<div class="container">
			<div class="invisible clearfix" data-plugin="appear" data-animate="slide-top" data-repeat="false">
			<h2 class="pull-left">
				{$lang_home_news_title}
				<span class="desc">{$lang_home_news_desc}</span>
			</h2>
			<a href="{$news[url]}" title="{$news[name]}" class="more pull-right">{$lang_more}</a>
			</div>
			<div class="row">
			<ul class="slider  col-md-5" id="newsad" data-scale='{$scale}'>
<!--
EOT;
	if(in_array($news_module,array(2,3,5))){
		$list=methtml_getarray($lang_home_news_id,$lang_home_news_type,'','',$lang_home_news_num,'','',1);
		foreach($list as $key=>$val){
			$val[imgurl_pc] = "{$thumb_src}dir={$val['imgurl']}&x=520&y=334";
			$val[imgurl_m]="{$thumb_src}dir={$val['imgurl']}&x=320&y=140";
echo <<<EOT
-->        	
            		<li>
	                    <a href="{$val[url]}" target="_blank" title="{$val[title]}">
<img class="cover-image" src="{$val[imgurl_pc]}" srcset='{$val[imgurl_m]} 767w,{$val[imgurl_pc]}' sizes="(max-width: 767px) 767px" alt="{$val[alt]}">
	                    </a>
	                    <h4 class="news_name">
		                    <a href="{$val[url]}" target="_blank" title="{$val[title]}">
		                    {$val[title]}
		                    </a>
	                    </h4>
	                </li>
<!--
EOT;
if($key>=2)break;
}
echo <<<EOT
-->
            	</ul>			
			<ul class="newslist content col-md-7">
<!--
EOT;
		foreach($list as $key1=>$val1){
			if($key1>2){
			if(!$val1['issue'])$val1['issue'] = $met_webname;
			$val1['description'] = mb_substr($val1['description'],0,$lang_home_news_des_max,'utf-8').'...';
echo <<<EOT
-->
				<li>
					<div class="media media-lg">
						<div class="media-body">
							<h4 class="media-heading">
								<a href="{$val1[url]}" title="{$val1[title]}" {$metblank}>
									{$val1['title']}
								</a>
							</h4>
							<p class="des">{$val1['description']}</p>
						</div>
					</div>
				</li>
<!--
EOT;
			}
		}
	}
echo <<<EOT
-->
			</ul>
		</div>
	</div>
</div>
<!--
EOT;
}
?>