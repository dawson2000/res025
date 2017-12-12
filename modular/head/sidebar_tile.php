<?php
$tileok = count($nav_list2[$class1])?1:0;
if($tileok||$product_search){
echo <<<EOT
-->
		<div class="met-column-nav {$bordernone}">
			<div class="container">
				<div class="row">
<!--
EOT;
	if($tileok){
echo <<<EOT
-->
					<div class="sidebar-tile">
						<ul class="met-column-nav-ul invisible-xs">
<!--
EOT;
		if($class_list[$class1]['isshow']){
			$navname = $class_list[$class1]['module']==1?$class_list[$class1]['name']:$lang_all;
echo <<<EOT
-->
							<li><a href="{$class_list[$class1][url]}" class="link" {$class_list[$class1][new_windows]} title="{$navname}">{$navname}</a></li>
<!--
EOT;
		}
echo <<<EOT
-->
<!--
EOT;
		foreach($nav_list2[$class1] as $key=>$val){
			$active = $val['id'] == $class2?'active':'';
			$dropdown=count($nav_list3[$val['id']])?' class="dropdown"':'';
echo <<<EOT
-->
							<li{$dropdown}>
<!--
EOT;
			if(count($nav_list3[$val['id']])){
echo <<<EOT
-->
								<a href="{$val[url]}" title="{$val[name]}" class="dropdown-toggle link {$active}" data-toggle="dropdown">
									{$val[name]} <span class="caret"></span>
								</a>
								<ul class="dropdown-menu {$bullet}">
<!--
EOT;
				if($val['isshow']){
					$navname = $val['module']==1?$val['name']:$lang_all;
echo <<<EOT
-->
									<li><a href="{$val[url]}" {$val[new_windows]} title="{$navname}">{$navname}</a></li>
<!--
EOT;
				}
echo <<<EOT
-->
<!--
EOT;
				foreach($nav_list3[$val['id']] as $key=>$val2){
				$active = $val2['id'] == $class3?'class="active"':'';
echo <<<EOT
-->
									<li><a href="{$val2[url]}" {$active} title="{$val2[name]}">{$val2[name]}</a></li>
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
								<a href="{$val[url]}" title="{$val[name]}" class="link {$active}">{$val[name]}</a>
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
						</ul>
					</div>
<!--
EOT;
	}
echo <<<EOT
-->
<!--
EOT;
	if($product_search){
echo <<<EOT
-->
					<div class="product-search">
						<form method="get" action="{$_M[url][site]}{$class_list[$classnow][foldername]}/">
							<input type="hidden" name="search" value="search">
							<input type="hidden" name="lang" value="{$_M[lang]}">
							<input type="hidden" name="class1" value="{$class1}">
							<div class="form-group">
								<div class="input-search">
									<button type="submit" class="input-search-btn"><i class="icon wb-search" aria-hidden="true"></i></button>
									<input
										type="text"
										class="form-control"
										name="content"
										value="{$content}"
										placeholder="{$lang_product_placeholder}"
									>
								</div>
							</div>
						</form>
					</div>
<!--
EOT;
	}
echo <<<EOT
-->
				</div>
			</div>
		</div>
<!--
EOT;
}
?>