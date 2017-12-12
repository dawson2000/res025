<?php
echo <<<EOT
-->
                    <div class="met-news-bar">
<!--
EOT;
require_once template('modular/md/search');
if($lang_download_bar_list_open){
    $news_list_md_id=$lang_download_bar_list_id?$lang_download_bar_list_id:$classnow;
    $news_list_md_title=$lang_download_bar_list_title;
    $news_list_md_num=$lang_download_bar_list_num;
    $news_list_md_type=$lang_download_bar_list_type;
    require_once template('modular/md/newslist');
}
$bar_allcolumn=$lang_download_allcolumn;
require_once template('modular/md/columnlist');
echo <<<EOT
-->
                    </div>
<!--
EOT;
?>