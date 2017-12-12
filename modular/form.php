<?php
$simplify=0;
echo <<<EOT
-->
<!--
EOT;
foreach($fromarray as $key=>$val){
echo <<<EOT
-->
				<div class="form-group">
<!--
EOT;
if(!$val['simplify']){
	if($val['type']<4)$simplify=1;
echo <<<EOT
-->
					<label class="control-label">{$val[name]}</label>
<!--
EOT;
}
echo <<<EOT
-->
					<div>
						{$val[type_html]}
					</div>
				</div>
<!--
EOT;
}
echo <<<EOT
-->
<!--
EOT;
if($met_memberlogin_code==1){
echo <<<EOT
-->
				<div class="form-group">
<!--
EOT;
if($simplify){
echo <<<EOT
-->
					<label class="control-label">{$lang_memberImgCode}</label>
<!--
EOT;
}
echo <<<EOT
-->
					<div class="input-group input-group-icon">
						<input
							name='code'
							type="text"
							class="form-control"
							placeholder = "{$lang_memberImgCode}"
							data-fv-notempty = "true"
							data-fv-message = "{$lang_Empty}"
						>
						<span class="input-group-addon">
							<img
								src="{$_M[url][site]}member/ajax.php?action=code"
								data-url="{$_M[url][site]}member/ajax.php?action=code"
								class="met-form-codeimg"
								alt="{$lang_memberTip1}"
								title="{$lang_memberTip1}"
								onclick='codeimgRefresh();'
							/>
						</span>
					</div>
				</div>
<!--
EOT;
}
echo <<<EOT
-->
<!--
EOT;
?>