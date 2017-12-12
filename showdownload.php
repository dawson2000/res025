<?php
$sidebarnone = 1;
require_once template('head');
//让内容支持图片懒加载
$download['content'] = $metdispose->lazyload($download['content']);
if(!$download['issue'])$download['issue'] = $met_webname;
echo <<<EOT
-->
<section class="met-download animsition">
	<div class="container">
		<div class="row">
			<div class="col-md-9 met-download-body">
				<div class="row">
					<div class="met-download-header">
						<h1>{$download[title]}</h1>
						<div class="info">
							<span>
								{$download['updatetime']}
							</span>
							<span>
								{$download['issue']}
							</span>
							<span>
								<i class="icon wb-eye margin-right-5" aria-hidden="true"></i>{$download['hits']}
							</span>
						</div>
					</div>
					<div class="paralist">
						<dl class="dl-horizontal clearfix">
<!--
EOT;
foreach($download_paralist as $key=>$val){
echo <<<EOT
-->
							<dt>{$val[name]} :</dt>
							<dd>{$download[$val[para]]}</dd>
<!--
EOT;
}
echo <<<EOT
-->
						</dl>
						<a class="btn btn-outline btn-primary btn-squared met-download-btn" href="{$download[downloadurl]}" title="{$download[title]}">{$lang_download}</a>
					</div>
					<div class="met-editor lazyload clearfix">
						{$download[content]}
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
?>