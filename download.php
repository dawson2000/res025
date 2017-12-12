<?php
if($mbpagelist){
	//无刷新翻页获取数据
	require_once template('modular/download/ajax');
}else{
	if(!$class_list[$classnow]['releclass'])$sidebarnone = 1;
	require_once template('head');
echo <<<EOT
-->
<section class="met-download animsition">
	<div class="container">
		<div class="row">
			<div class="col-md-9 met-download-body">
				<div class="row">
					<div class="met-download-list">
						<ul class="list-group list-group-dividered list-group-full met-page-ajax">
<!--
EOT;
	require_once template('modular/download/ajax');
echo <<<EOT
-->
						</ul>
<!--
EOT;
	//分页
	require_once template('modular/page');
echo <<<EOT
-->
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="row">
<!--
EOT;
	require_once template('modular/download/bar');
echo <<<EOT
-->
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