<?php
$topicArrays=array(
"1"=>array('info'=>$lang_topic_info_1,'url'=>$lang_topic_info_1_url,'img'=>$lang_topic_info_1_img),
"2"=>array('info'=>$lang_topic_info_2,'url'=>$lang_topic_info_2_url,'img'=>$lang_topic_info_2_img),
"3"=>array('info'=>$lang_topic_info_3,'url'=>$lang_topic_info_3_url,'img'=>$lang_topic_info_3_img),
"4"=>array('info'=>$lang_topic_info_4,'url'=>$lang_topic_info_4_url,'img'=>$lang_topic_info_4_img),
"5"=>array('info'=>$lang_topic_info_5,'url'=>$lang_topic_info_5_url,'img'=>$lang_topic_info_5_img),
"6"=>array('info'=>$lang_topic_info_6,'url'=>$lang_topic_info_6_url,'img'=>$lang_topic_info_6_img),
"7"=>array('info'=>$lang_topic_info_7,'url'=>$lang_topic_info_7_url,'img'=>$lang_topic_info_7_img),
"8"=>array('info'=>$lang_topic_info_8,'url'=>$lang_topic_info_8_url,'img'=>$lang_topic_info_8_img)
);
if($lang_home_product_ok){

	$scale=$lang_topic_img_x/$lang_topic_img_y;
	$home_procolumn_res=list_column_res($lang_home_procolumn_xs,$lang_home_procolumn_sm,$lang_home_procolumn_md,$lang_home_procolumn_xlg);
echo <<<EOT
-->
	<div class="met-index-topic met-index-body">
		<div class="container">
			<div class="navigation">
				<h2 class="i-themetitle col-md-4">{$lang_home_product_title}<span class="tu">{$lang_home_product_desc}</span></h2>
<!--
EOT;
if($lang_home_topic_ok){
echo <<<EOT
-->
				<div class="slider col-md-8" id="topic">
<!--
EOT;
		foreach($nav_list2[$product['id']] as $key=>$val){
echo <<<EOT
-->
				<a href="{$val[url]}" title="{$val[name]}">{$val[name]}</a>
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
			<ul class="{$home_procolumn_res}" data-scale="{$scale}">
<!--
EOT;
foreach($topicArrays as $key=>$val){
if($val[url] && $val[info]){
echo <<<EOT
-->
				<li>
					<a href="{$val[url]}" title="{$val[info]}">
						<img data-original="{$thumb_src}dir={$val['img']}&x={$lang_topic_img_x}&y={$lang_topic_img_y}"alt="{$val[info]}" style="width:100%;"/>
					</a>
					<h4>
						<a href="{$val[url]}" title="{$val[info]}">{$val[info]}</a>
					</h4>
				</li>
<!--
EOT;
}
}
echo <<<EOT
-->
		</ul>
		</div>
	</div>
<!--
EOT;
}
?>