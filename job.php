<!--<?php
if($mbpagelist){
	//无刷新翻页获取数据
	require_once template('modular/job/ajax');
}else{
	if(!$class_list[$classnow]['releclass'])$sidebarnone = 1;
	require_once template('head');
echo <<<EOT
-->
<section class="met-job animsition">
	<div class="container">
		<div class="row">
			<div class="met-job-list met-page-ajax">
<!--
EOT;
	require_once template('modular/job/ajax');
echo <<<EOT
-->
			</div>
<!--
EOT;
	//分页
	require_once template('modular/page');
echo <<<EOT
-->
		</div>
	</div>
</section>
<!--
EOT;
	//应聘表单
	require_once template('modular/job/job_form');
	require_once template('foot');
}
?>