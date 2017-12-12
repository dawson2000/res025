<?php
echo <<<EOT
-->
                    <div class="met-news-bar">
<!--
EOT;
require_once template('modular/md/search');
if($lang_img_bar_list_open){
    $news_list_md_id=$lang_img_bar_list_id?$lang_img_bar_list_id:$class1;
    $news_list_md_title=$lang_img_bar_list_title;
    $news_list_md_num=$lang_img_bar_list_num;
    $news_list_md_type=$lang_img_bar_list_type;
    require_once template('modular/md/newslist');
}
$bar_allcolumn=$lang_img_allcolumn;
require_once template('modular/md/columnlist');
echo <<<EOT
-->
                    </div>
<!--
EOT;
?>