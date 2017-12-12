<?php
$patternshow = $patternshow?'pattern-show':'';
echo <<<EOT
-->
<div class="met-position {$bordernone} {$patternshow}">
	<div class="container">
		<div class="row">
			<ol class="breadcrumb">
				<li>
					<a href="{$index_url}" title="{$lang_home}">
						<i class="icon wb-home" aria-hidden="true"></i>{$lang_home}
					</a>
				</li>
				<li class="dropdown">
<!--
EOT;
if(count($nav_list2[$class1])){//存在下级栏目
echo <<<EOT
-->
						<a href="{$class1_info['url']}" 
							title="{$class1_info['name']}" 
							class="dropdown-toggle" 
							data-toggle="dropdown" 
							aria-expanded="false"
						>{$class1_info['name']} <i class="caret"></i></a>
						<ul class="dropdown-menu {$bullet}">
<!--
EOT;
if($class1_info['isshow']){
	$navname = $class1_info['module']==1?$class1_info['name']:$lang_all;
echo <<<EOT
-->	
							<li><a href="{$class1_info[url]}" {$class1_info[new_windows]} title="{$navname}">{$navname}</a></li>
<!--
EOT;
}
echo <<<EOT
-->	
<!--
EOT;
foreach($nav_list2[$class1] as $val){
echo <<<EOT
-->
							<li><a href="{$val['url']}" title="{$val['name']}">{$val['name']}</a></li>
<!--
EOT;
}
echo <<<EOT
-->
						</ul>
<!--
EOT;
}else{//无下级栏目
echo <<<EOT
-->
					<a href="{$class1_info['url']}" title="{$class1_info['name']}">
						{$class1_info['name']}
					</a>
<!--
EOT;
}
echo <<<EOT
-->
				</li>
<!--
EOT;
if($class2){
echo <<<EOT
-->
				<li class="dropdown">
<!--
EOT;
if(count($nav_list3[$class2])){//存在下级栏目
echo <<<EOT
-->
						<a  href="{$class2_info['url']}" 
							title="{$class2_info['name']}" 
							class="dropdown-toggle" 
							data-toggle="dropdown" 
							aria-expanded="false"
						>{$class2_info['name']} <i class="caret"></i></a>
						<ul class="dropdown-menu {$bullet}">
<!--
EOT;
if($class2_info['isshow']){
	$navname = $class2_info['module']==1?$class2_info['name']:$lang_all;
echo <<<EOT
-->	
							<li><a href="{$class2_info[url]}" {$class2_info[new_windows]} title="{$navname}">{$navname}</a></li>
<!--
EOT;
}
echo <<<EOT
-->	
<!--
EOT;
foreach($nav_list3[$class2] as $val){
echo <<<EOT
-->
							<li><a href="{$val['url']}" title="{$val['name']}">{$val['name']}</a></li>
<!--
EOT;
}
echo <<<EOT
-->
						</ul>
<!--
EOT;
}else{
echo <<<EOT
-->
					<a href="{$class2_info['url']}" title="{$class2_info['name']}">
						{$class2_info['name']}
					</a>
<!--
EOT;
}
echo <<<EOT
-->
				</li>
<!--
EOT;
}
echo <<<EOT
-->
<!--
EOT;
if($class3){
echo <<<EOT
-->
				<li>
					<a href="{$class3_info['url']}" title="{$class3_info['name']}">
						{$class3_info['name']}
					</a>
				</li>
<!--
EOT;
}
echo <<<EOT
-->
			</ol>
		</div>
	</div>
</div>
<!--
EOT;
?>