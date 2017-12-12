<?php
$met_foot_txt = metlabel_foot();
if($lang_foot_navok) require_once template('modular/foot/nav');
if($index&&$lang_foot_linksok) require_once template('modular/foot/links');
echo <<<EOT
-->
<footer>
    <div class="container text-center">
		{$met_foot_txt}
		<div class="powered_by_metinfo">Powered by <a href="http://www.MetInfo.cn/#copyright 

" target="_blank" title="{$lang_Info1}">MetInfo</a> {$metcms_v}</div>
<!--
EOT;
if($met_lang_mark&&count($met_langok)>1&&$lang_langlist_position) require_once template('modular/foot/langlist');
echo <<<EOT
-->
    </div>
</footer>
<button type="button" class="btn btn-icon btn-primary btn-squared met-scroll-top hide"><i class="icon wb-chevron-up" aria-hidden="true"></i></button>
<!--
EOT;
require_once template('modular/footer');
?>