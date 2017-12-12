<?php
// 兼容商城V3
$lang_num=0;
foreach($met_langok as $val){
	if($val['useok']){
		$lang_num++;
		if($lang_num>1) break;
	}
}
if($lang_num>1){
	$met_lang_icon=$metdispose->iconvga($met_langok[$lang][synchronous]);
echo <<<EOT
-->
<div class="met-langlist vertical-align margin-top-10 text-center">
<!--
EOT;
if($lang_langlist_type==1){
echo <<<EOT
-->
	<div class="inline-block dropup">
		<button type="button" data-toggle="dropdown" class="btn btn-outline btn-default btn-squared">
<!--
EOT;
	if ($lang_langlist_icon_ok) {
echo <<<EOT
-->
			<span class="flag-icon flag-icon-{$met_lang_icon}"></span>
<!--
EOT;
	}
echo <<<EOT
-->
			{$met_langok[$lang][name]}
		</button>
		<ul class="dropdown-menu animate animate-reverse" id="met-langlist-dropdown" role="menu">
<!--
EOT;
foreach($met_langok as $val){
	if($val['useok']){
		$val['iconname'] = $metdispose->iconvga($val['synchronous']);//转VGA国旗图标// 兼容商城V3
echo <<<EOT
-->
			<li>
				<a href="{$val[met_weburl]}index.php?lang={$val['mark']}" title="{$val[name]}">
<!--
EOT;
		if ($lang_langlist_icon_ok) {
echo <<<EOT
-->
					<span class="flag-icon flag-icon-{$val['iconname']}"></span>
<!--
EOT;
		}
echo <<<EOT
-->
					{$val[name]}
				</a>
			</li>
<!--
EOT;
	}
}
echo <<<EOT
-->
		</ul>
	</div>
<!--
EOT;
}else{
echo <<<EOT
-->
<button type="button" class="btn btn-outline btn-default btn-squared" data-toggle="modal" data-target="#met-langlist-modal">
<!--
EOT;
	if ($lang_langlist_icon_ok) {
echo <<<EOT
-->
	<span class="flag-icon flag-icon-{$met_lang_icon}"></span>
<!--
EOT;
	}
echo <<<EOT
-->
	{$met_langok[$lang][name]}
</button>
<div class="modal fade modal-3d-flip-vertical" id="met-langlist-modal" aria-hidden="true" role="dialog" tabindex="-1">
	<div class="modal-dialog modal-center modal-lg">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<div class="row">
<!--
EOT;
foreach($met_langok as $val){
	if($val['useok']){
		$val['iconname'] = $metdispose->iconvga($val['lang']);//转VGA国旗图标
echo <<<EOT
-->
					<div class="col-md-4 col-sm-6 col-xs-12 margin-bottom-20">
						<a href="{$val[met_weburl]}" class="btn btn-block btn-outline btn-default btn-squared text-nowrap" title="{$val[name]}">
<!--
EOT;
		if ($lang_langlist_icon_ok) {
echo <<<EOT
-->
							<span class="flag-icon flag-icon-{$val['iconname']}"></span>
<!--
EOT;
		}
echo <<<EOT
-->
							{$val[name]}
						</a>
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
</div>	
<!--
EOT;
}
}
echo <<<EOT
-->
</div>
<!--
EOT;
?>