<?php
echo <<<EOT
-->
<div class="met-footnav text-center">
    <div class="container">
		<div class="row mob-masonry">
<!--
EOT;
foreach($navfoot_list as $key=> $val){
echo <<<EOT
-->
			<div class="col-md-2 col-sm-3 col-xs-6 list masonry-item">
				<h4><a href="{$val[url]}" {$val[new_windows]} title="{$val[name]}">{$val[name]}</a></h4>
<!--
EOT;
	if($class_list[$val[id]][module]!=6 && $val['module']!=7){
		$sublist = $val['classtype']==1?$nav_list2[$val['id']]:($val['classtype']==2?$nav_list3[$val['id']]:'');
echo <<<EOT
-->
				<ul>
<!--
EOT;
		foreach($sublist as $sub){
echo <<<EOT
-->
					<li><a href="{$sub[url]}" {$sub[new_windows]} title="{$sub[name]}" {$metblank}>{$sub[name]}</a></li>
<!--
EOT;
		}
echo <<<EOT
-->
				</ul>
<!--
EOT;
	}
echo <<<EOT
-->
			</div>
<!--
EOT;
	if($key>=3) break;
}
echo <<<EOT
-->
			<div class="col-md-3 col-ms-12 col-xs-12 info masonry-item">
				<em><a href="tel:{$lang_foot_info_tel}" title="{$lang_foot_info_tel}" {$metblank}>{$lang_foot_info_tel}</a></em>
				<p>{$lang_foot_info_dsc}</p>
<!--
EOT;
require_once template('modular/foot/social');//社交元素
echo <<<EOT
-->
			</div>
		</div>
	</div>
</div>
<!--
EOT;
?>