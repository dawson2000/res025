<?php
$bullet = $lang_navbulletok?'bullet':'animate';
if($lang_navhoverok){
	$navhover = 'data-hover="dropdown"';
	$navname_block='visible-xs';
}else{
	$navname_block='block';
}
$navnow =$classnow==10001?'active':'';
echo <<<EOT
-->
<ul class="nav navbar-nav navlist">
	<li><a href="{$index_url}" title="{$lang_home}" class="link {$navnow}">{$lang_home}</a></li>
<!--
EOT;
$prohibit = explode('|',$lang_navbarprohibit);
foreach($nav_list as $key=>$val){
	$navnow = $val['id']==$navdown?'active':'';
	$sub_list=$nav_list2[$val['id']];
	if($val['classtype']==2) $sub_list = $nav_list3[$val['id']];
echo <<<EOT
-->
<!--
EOT;
	$prohibits=$prohibit?!in_array($val['name'],$prohibit):true;
	if(count($sub_list) && $lang_navbarok && $val['module']!=6 && $val['module']!=7 && $prohibits){
		//6为招聘模块，没必要展示下拉菜单
		//$prohibit为栏目下拉菜单的禁用开关
echo <<<EOT
-->
	<li class="dropdown margin-left-{$lang_navmarginleft}">
		<a
			class="dropdown-toggle link {$navnow}"
			data-toggle="dropdown"
			{$navhover}
			href="{$val[url]}"
			aria-expanded="false"
			{$val[new_windows]}
			title="{$val[name]}"
		>{$val[name]} <span class="caret"></span></a>
		<ul class="dropdown-menu dropdown-menu-right {$bullet}">
<!--
EOT;
	if($val['isshow']){
		$navname = $val['module']==1?$val['name']:$lang_all;
echo <<<EOT
-->
			<li class='nav-parent {$navname_block}'><a href="{$val[url]}" {$val[new_windows]} title="{$navname}">{$navname}</a></li>
<!--
EOT;
	}
	foreach($sub_list as $key=>$val2){
		$navnow = $val2['id']==$class2?'active':'';
		if(count($nav_list3[$val2['id']])){
			$navname = $val['module']==1?$val2['name']:$lang_all;
echo <<<EOT
-->
			<li class="dropdown-submenu">
				<a href="{$val2[url]}" class="{$navnow}" {$val2[new_windows]}>{$val2[name]}</a>
				<ul class="dropdown-menu animate">
<!--
EOT;
			foreach($nav_list3[$val2['id']] as $val3){
				$navnow = $val3['id']==$class3?'active':'';
echo <<<EOT
-->
					<li><a href="{$val3[url]}" class="{$navnow}">{$val3[name]}</a></li>
<!--
EOT;
			}
echo <<<EOT
-->
				</ul>
			</li>
<!--
EOT;
		}else{
echo <<<EOT
-->
			<li><a href="{$val2[url]}" class="{$navnow}" {$val2[new_windows]} title="{$val2[name]}">{$val2[name]}</a></li>
<!--
EOT;
		}
	}
echo <<<EOT
-->
		</ul>
	</li>
<!--
EOT;
	}else{
echo <<<EOT
-->
	<li class="margin-left-{$lang_navmarginleft}"><a href="{$val[url]}" {$val[new_windows]} title="{$val[name]}" class="link {$navnow}">{$val[name]}</a></li>
<!--
EOT;
	}
}
echo <<<EOT
-->
</ul>
<!--
EOT;
?>