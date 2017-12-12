<?php
if($lang_bar_column_open){
    $bar_allcolumn=$bar_allcolumn?$bar_allcolumn:$class1_info[name];
echo <<<EOT
-->
                        <ul class="column">
                            <li><a href="{$class1_info['url']}" title="{$bar_allcolumn}" {$metblank}>{$bar_allcolumn}</a></li>
<!--
EOT;
    foreach($nav_list2[$navdown] as $val){
        $active = $val['id']==$classnow?'class="active"':'';
echo <<<EOT
-->
                            <li><a href="{$val['url']}" {$active} title="{$val['name']}">{$val['name']}</a></li>
<!--
EOT;
        if($lang_bar_column3_open){
            foreach($nav_list3[$val['id']] as $list3){
            $active = $list3['id']==$classnow?'class="active"':'';
echo <<<EOT
-->
                            <li><a href="{$list3['url']}" {$active} title="{$list3['name']}">{$list3['name']}</a></li>
<!--
EOT;
            }
        }
    }
echo <<<EOT
-->
                        </ul>
<!--
EOT;
}
?>