<?php
if($lang_home_service_ok){
echo <<<EOT
-->
	<div class="met-index-allnews met-index-body">
		<div class="container">
		<ul class="tab-list clearfix">
<!--
EOT;
for($i=1;$i<=4;$i++){
	$title="lang_home_allnews_title".$i;
	$$title;
	$desc="lang_home_allnews_desc".$i;
	$$desc;
	$col="lang_home_allnews_id".$i;
	$$col;
	$newslist=tmpcentarr($$col);
	$active=$i==1?"active":"";
echo <<<EOT
-->
	<li class="col-md-3 {$active}">
		<a href="#{$newslist[id]}" data-toggle="tab">
			<h2>
			{$$title}
			<span class="desc">{$$desc}</span>
			</h2>
			<i class="fa fa-sort-desc"></i>
		</a>
	</li>
<!--
EOT;
}
echo <<<EOT
-->
			</ul>
			<div  class="tab-content">
<!--
EOT;
for($i=1;$i<=4;$i++){
	$col="lang_home_allnews_id".$i;
	$$col;
	$newslist=tmpcentarr($$col);
	$news_module=$class_list[$newslist['id']][module];
	
	$w="lang_img_w".$i;
	$w=$$w;
	$h="lang_img_h".$i;
	$h=$$h;
	$scale=$h/$w;
	$active=$i==1?"active":"";
if($news_module==2){
echo <<<EOT
-->
<div class="tab-pane {$active}" id="{$newslist[id]}">
<ul class="row">
<!--
EOT;
	$list=methtml_getarray($newslist[id],$lang_home_newsll_type,'','',$lang_home_newsll_num,'','',1);
	foreach($list as $key=>$val){
		$val['description'] = mb_substr($val['description'],0,$lang_home_newsall_des_max,'utf-8').'...';
		$val['imgurl'] = "{$thumb_src}dir={$val['imgurl']}&x={$w}&y={$h}";
		$animate=$key%2==0?"slide-left":"slide-right";
echo <<<EOT
-->
				<li class="col-md-6">
					<div class="media media-lg">
<!--
EOT;
if($lang_newsll_img_ok){
echo <<<EOT
-->
						<div class="media-left">
							<a href="{$val[url]}" title="{$val[title]}" {$metblank}>
								<img class="media-object" src="{$val[imgurl]}"  alt="{$val[title]}">
							</a>
						</div>
<!--
EOT;
}
echo <<<EOT
-->
						
						<div class="media-body">
							<h4 class="media-heading">
								<a href="{$val[url]}" title="{$val[title]}" {$metblank}>
									{$val['title']}
								</a>
							</h4>
								<p class="des">{$val['description']}</p>
								<p class="info">
									<span>{$val['updatetime']}</span>
									<span class="margin-left-10">{$val['issue']}</span>
									<span class="margin-left-10"><i class="icon wb-eye margin-right-5" aria-hidden="true"></i>{$val['hits']}</span>
								</p>
						</div>
					</div>
				</li>
<!--
EOT;
	}
echo <<<EOT
-->
	</ul>
</div>
<!--
EOT;
}else if($news_module==5||$news_module==3){
echo <<<EOT
-->
<div class="tab-pane {$active}" id="{$newslist[id]}">
<ul class="row imglist imglist{$i}">
<!--
EOT;
$list=methtml_getarray($newslist[id],$lang_home_newsll_type,'','',$lang_home_imgsll_num,'','',1);
foreach($list as $key=>$val){
		$val['description'] = mb_substr($val['description'],0,$lang_home_newsall_des_max,'utf-8').'...';
		$val['imgurl'] = "{$thumb_src}dir={$val['imgurl']}&x={$w}&y={$h}";
		$animate=$key%2==0?"slide-left":"slide-right";
echo <<<EOT
-->
	<li class="col-md-3 col-xs-6">
		<a href="{$val[url]}" title="{$val[title]}" {$metblank}>
			<img class="img-object" src="{$val[imgurl]}"  alt="{$val[title]}">
		</a>
		<h4 class="img-name">
			<a href="{$val[url]}" title="{$val[title]}" {$metblank}>
				{$val['title']}
			</a>
		</h4>
	</li>
<!--
EOT;
}
echo <<<EOT
-->

</ul>
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
	</div>
<!--
EOT;
}
?>