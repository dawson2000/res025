<?php
$news_list_md=methtml_getarray($news_list_md_id,$news_list_md_type,'','',$news_list_md_num,'','',1);
echo <<<EOT
-->
						<div class="recommend news-list-md">
							<h3>{$news_list_md_title}</h3>
							<ul class="list-group list-group-bordered">
<!--
EOT;
foreach($news_list_md as $key=>$val){
echo <<<EOT
-->
								<li class="list-group-item"><a href="{$val[url]}" title="{$val[title]}" {$metblank}>{$val[title]}</a></li>
<!--
EOT;
}
echo <<<EOT
-->
							</ul>
						</div>
<!--
EOT;
?>