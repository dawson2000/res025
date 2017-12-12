<?php
foreach($job_list as $key=>$val){
	$val['count'] = $val['count']==0?$lang_several:$val['count'];
echo <<<EOT
-->
<div class="widget widget-article widget-shadow">
	<div class="widget-body">
		<h3 class="widget-title font-weight-300">
			{$val[position]}
		</h3>
<!--
		<p class="widget-metas">
			<span>{$val[addtime]}</span>
			<span><i class="icon wb-map margin-right-5" aria-hidden="true"></i>{$val[place]}</span>
			<span><i class="icon wb-user margin-right-5" aria-hidden="true"></i>{$val[count]}</span>
			<span><i class="icon wb-payment margin-right-5" aria-hidden="true"></i>{$val[deal]}</span>
		</p>
-->
		<hr>
		<div class="met-editor lazyload clearfix">{$val[content]}</div>
		<hr>
		<div class="widget-body-footer margin-top-0">
			<a class="btn btn-outline btn-squared btn-primary met-job-cvbtn" href="javascript:void(0)" data-jobid="{$val[id]}" data-cvurl="cv.php?lang={$met_langok[$lang][lang]}&selected">{$lang_cvtitle}</a>
		</div>
	</div>
</div>
<!--
EOT;
}
?>