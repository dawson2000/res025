<!--<?php
if($mbpagelist){
    //无刷新翻页获取数据
    require_once template('modular/product/ajax_'.$lang_product_listtype);
}else{
    $bordernone=1;
    $product_search = $lang_product_search;
    require_once template('head');
    $fluid = $lang_product_listtype>1?'-fluid':'';
    $nospace=$lang_product_listtype==2?'no-space':'';
    $scale=$met_productimg_y/$met_productimg_x;
    $pro_column_res=list_column_res($lang_pro_column_xs,$lang_pro_column_sm,$lang_pro_column_md,$lang_pro_column_xlg);
echo <<<EOT
-->
<div class="met-product animsition type-{$lang_product_listtype}">
	<div class="container{$fluid}">
        <ul class="{$pro_column_res}{$nospace} met-page-ajax met-grid" id="met-grid" data-scale='{$scale}'>
<!--
EOT;
    require_once template('modular/product/ajax_'.$lang_product_listtype);
echo <<<EOT
-->
        </ul>

<!--
EOT;
    if(!$product_list && $content && $search=='search'){
    // 没有找到搜索结果的情况
echo <<<EOT
-->
        <div class='bg-white height-400 padding-top-50 text-center'>
            <h1 class="page-search-title">
                {$lang_SearchInfo3} "{$content}" {$lang_SearchInfo4}
            </h1>
        </div>
<!--
EOT;
    }
    $pagetxt = $lang_product_moretxt;
    require_once template('modular/page');
echo <<<EOT
-->
	</div>
</div>
<!--
EOT;
    require_once template('foot');
}
?>