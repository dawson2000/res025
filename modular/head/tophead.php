<?php
echo <<<EOT
-->
	<div class="header">
		<div class="container">
			<div class="header-main">
				<a href="{$index_url}" class="navbar-logo pull-left vertical-align" title="{$met_webname}">
					<h{$index_h1} class='hide'>{$met_webname}</h{$index_h1}>
					<div class="vertical-align-middle"><img src="{$met_logo}" alt="{$met_webname}" title="{$met_webname}" /></div>
				</a>
				<div class="pull-right top_tel">
					<p>{$lang_top_tell}</p>
				</div>
				
	     </div>
	   </div>
	</div>
<!--
EOT;
?>