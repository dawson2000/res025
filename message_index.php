<!--<?php
if($mbpagelist){
	require_once template('modular/message/ajax');
}else{
	if(!$class_list[$classnow]['releclass'])$sidebarnone = 1;
	require_once template('head');
	$message_submit_w=$message_list?'col-md-4':'col-md-6';
echo <<<EOT
-->
<section class="met-message animsition">
	<div class="container">
		<div class="row">
<!--
EOT;
	if($message_list){
echo <<<EOT
-->
			<div class="col-md-8">
				<div class="row">
					<div class="met-message-body">
						<ul class="list-group list-group-dividered list-group-full met-page-ajax">
<!--
EOT;
		require_once template('modular/message/ajax');
echo <<<EOT
-->
						</ul>
<!--
EOT;
		$pagenorerresh = true;
		require_once template('modular/page');
echo <<<EOT
-->
					</div>
				</div>
			</div>
<!--
EOT;
	}
echo <<<EOT
-->
			<div class="{$message_submit_w}">
				<div class="row">
				<div class="met-message-submit">
					<form method='POST' class="met-form met-form-validation"  enctype="multipart/form-data" action='{$_M[url][site]}{$class_list[$classnow][foldername]}/message.php?action=add'>
						<input type='hidden' name='lang' value='{$lang}' />
<!--
EOT;
	$fromarray = $metdispose->formation(metlabel_message(),true);
	require_once template('modular/form');
echo <<<EOT
-->
						<div class="form-group margin-bottom-0">
							<button type="submit" class="btn btn-primary btn-block btn-squared">{$lang_submit}</button>
						</div>
					</form>
				</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--
EOT;
	require_once template('foot');
}
?>