<?php
$paddingb=count($displaylist)?'slick-dotted':'';
echo <<<EOT
-->
<div class="section">
    <div class='met-showproduct-list text-center fnGallery {$paddingb} '><!--兼容商城V3-->
            <div class='slick-slide' data-exthumbimage="{$product[imgurl]}">
                <span>
                    <img src="{$product[imgurl]}" data-src='{$product[imgurl]}' class="img-responsive" alt="{$product[title]}" /><!--兼容商城V3-->
                </span>
            </div>
<!--
EOT;
foreach($displaylist as $key=>$val){
    $src='data-lazy';
    $exthumbimage="{$thumb_src}dir={$val[imgurl]}&x=60&y=60";
    if($key==0){
        $src='src';
        $exthumbimage=$val[imgurl];
    }
echo <<<EOT
-->
            <div class='slick-slide' data-exthumbimage="{$exthumbimage}">
                <span>
                    <img {$src}="{$val[imgurl]}" data-src='{$val[imgurl]}' class="img-responsive" alt="{$val[title]}" /><!--兼容商城V3-->
                </span>
            </div>
<!--
EOT;
}
echo <<<EOT
-->
    </div>
    </div>
<!--
EOT;
?>