<?php
if($lang_home_about_ok){
echo <<<EOT
-->
	<div class="met-index-about met-index-body">
		<div class="container">
			<h2 class="invisible" data-plugin="appear" data-animate="slide-top" data-repeat="false">{$lang_home_about_title}</h2>
			<p class="desc invisible" data-plugin="appear" data-animate="fade" data-repeat="false">{$lang_home_about_desc}</p>
			<div class="met-content clearfix">
				{$lang_home_about_content}
			</div>
		</div>
	</div>
<!--
EOT;
}
?>