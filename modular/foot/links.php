<?php
echo <<<EOT
-->
<div class="met-links text-center">
    <div class="container">
		<ol class="breadcrumb">
			<li>{$lang_foot_links_title}</li>
<!--
EOT;
$link_list=$link_img?$link_img:$link_text;
foreach($link_list as $val){
echo <<<EOT
-->
            <li>
                <a href="{$val[weburl]}" title="{$val[info]}" target="_blank">
<!--
EOT;
if($link_img){
echo <<<EOT
-->
                    <img src="{$val[weblogo]}" alt="{$val[webname]}">
<!--
EOT;
}else{
echo <<<EOT
-->
                    {$val[webname]}
<!--
EOT;
}
echo <<<EOT
-->
                </a>
            </li>
<!--
EOT;
}
echo <<<EOT
-->
		</ol>
	</div>
</div>
<!--
EOT;
?>