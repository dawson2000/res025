<!--<?php
if($mbpagelist){
    //无刷新翻页获取数据
    require_once template('modular/news/ajax_'.$lang_news_listtype);
}else{
    $sidebarnone = 1;
    require_once template('head');
    $type3=$lang_news_listtype==3?'type-3':'';
    if($lang_news_listtype>1){
        if($lang_news_listtype==2){
            $scale=$met_newsimg_y/$met_newsimg_x;
        }else{
            $scale=$lang_news_ccimg_y/$lang_news_ccimg_x;
        }
    }
echo <<<EOT
-->
<section class="met-news animsition {$type3}">
    <div class="container">
        <div class="row">
            <div class="col-md-9 met-news-body">
                <div class="row">
                    <div class="met-news-list">
<!--
EOT;
    if($lang_news_listtype<3 && $lang_news_headlines) require_once template('modular/news/headlines');//头条
echo <<<EOT
-->
                        <ul class="met-page-ajax" data-scale='{$scale}'>
<!--
EOT;
    require_once template('modular/news/ajax_'.$lang_news_listtype);
echo <<<EOT
-->
                        </ul>
<!--
EOT;
    //分页
    $pagetxt = $lang_news_moretxt;
    require_once template('modular/page');
echo <<<EOT
-->
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
<!--
EOT;
    require_once template('modular/news/bar');
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
}
?>