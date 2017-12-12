<?php
$i=0;
foreach($search_list as $key=>$val){
	if(!strstr($val['title'],$lang_SearchInfo1)){
		if($val['url']!=$_M['url']['site']){
		$i++;
		$val['urlhrml'] = $_M['url']['site'].str_replace("../","",$val[url]);
echo <<<EOT
-->
					<li class="list-group-item">
						<h4>
							<a href="{$val[url]}">
							{$val[title]}
							</a>
						</h4>
						<a class="search-result-link" href="{$val[url]}">{$val[urlhrml]}
						</a>
						<p>{$val[content]}</p>
					</li>
<!--
EOT;
		}
	}
}
?>