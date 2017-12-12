<?php
require_once template('head');
//让内容支持图片懒加载
$show['content'] = $metdispose->lazyload($show['content']);
if($lang_showstyle1&&$class_list[$classnow][index_num]==5){
echo <<<EOT
-->
<section class="met-show animsition">
	<div class="met-show1 container">
		<div class="row">
			<div class="col-md-4 about-left">
				<div class="ab-top">
					<h4>{$show[keywords]}</h4>
					<h4>{$show[description]}</h4>
				</div>
			</div>
			<div class="col-md-8 about-right">
				<div class="met-editor padding-0 lazyload clearfix">
					{$show[content]}
				</div>
			</div>
		</div>
	</div>
<!--
EOT;
foreach ($nav_list2[$classnow] as $key=>$val){
if($val[module]==5){
echo <<<EOT
-->
	<div class="gallery" id="gallery{$key}">
		<div class="container">
			<h3>{$val[name]}</h3>
			<div class="gallery-grids">
			<section>
				<ul id="da-thumbs{$key}" class="row da-thumbs">
<!--
EOT;
$metlist_array=methtml_getarray($val[id],'com','','','8','','',1);
foreach ($metlist_array as $key1 => $val1) {
echo <<<EOT
-->
	<li class="col-md-3 col-xs-6" data-src="{$val1[imgurl]}">
		<a class="b-link-stripe b-animate-go  thickbox">
			<img src="{$thumb_src}dir={$val1[imgurl]}&x={$val1[img_x]}&y={$val1[img_y]}" alt="{$val1[title]}">
			<div style="display: block; left: 0px; top: -100%;overflow: hidden; transition: all 300ms ease;">
				<div style="display: table; vertical-align:middle; text-align:center;">
					<h5>{$val1[title]}</h5>
					<p>{$val1[description]}</p>
				</div>
			</div>
		</a>
	</li>
<!--
EOT;
}
echo <<<EOT
-->
					
					
				</ul>
			</section>
			<a href="{$val[url]}" title="{$val[name]}" class="more">{$lang_more}</a>
        </div>
	</div>
</div>
<!--
EOT;
}else{
echo <<<EOT
-->
	<div class="news" style="background-image: url({$val[columnimg]});">
		<div class="container">
			<h3>{$val[name]}</h3>
<!--
EOT;
	foreach ($nav_list3[$val[id]] as $key2=>$val2) {
echo <<<EOT
-->
			<div class="news-info agileits">	
				<div class="col-md-4 col-xs-6 news-grids">
<!--
EOT;
if($lang_showlink){
echo <<<EOT
-->
	<a href="{$val2[url]}" title="{$val2[name]}">
<!--
EOT;
}
echo <<<EOT
-->
					<h4>{$val2[name]}</h4>
<!--
EOT;
if($lang_showlink){
echo <<<EOT
-->
	</a>
<!--
EOT;
}
echo <<<EOT
-->
					<div class="content">
					{$val2[description]}
					</div>

				</div>
			</div>
<!--
EOT;

	}
echo <<<EOT
-->
</div>
	</div>
<!--
EOT;
}
}
echo <<<EOT
-->
		
	
</section>
<!--
EOT;
}else{
echo <<<EOT
-->
<section class="met-show animsition">
	<div class="container">
		<div class="row">
			<div class="met-editor lazyload clearfix">
				{$show[content]}
			</div>
		</div>
	</div>
</section>
<!--
EOT;
}
require_once template('foot');
?>