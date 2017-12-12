<?php
if($goods['original']){
	$goods['original_html'] = "<del>{$_M['word']['app_shop_original']}{$goods['original_str']}</del>";
}
$shopmax = $goods['stock'];
if($goods['purchase']){
	$goods['purchase_html'] = "<del><span class=\"badge badge-radius badge-default\">{$_M['word']['app_shop_purchase']} {$goods['purchase']} {$_M['word']['app_shop_piece']}</span></del>";
	$shopmax = $goods['purchase'];
}
if($goods['stock_show']){
	$goods['stock_html'] = "{$_M['word']['app_shop_stock']} <span id='stock-num' class=''>{$shopmax}</span> {$_M['word']['app_shop_piece']}";
}
echo <<<EOT
-->
<script>var stockjson = {$stockjson};</script>
<div class="shop-product-intro">
	<div class="shop-product-price">
		<span id="price">{$goods['price_str']}</span>{$goods['original_html']}
	</div>
<!--
EOT;
if($is_shopv3) require_once template('modular/shop/shop_discount_receive');//优惠券（兼容商城V3）
foreach($goods['selectpara'] as $keyselect=>$valselect){
echo <<<EOT
-->
	<div class="form-group margin-top-15">
		<label class="control-label font-weight-unset">{$valselect['name']}</label>
		<div class="selectpara-body">
<!--
EOT;
	foreach($valselect['value'] as $keyvalue=>$valvalue){
echo <<<EOT
-->
			<a href="javascript:;" data-val="{$valvalue}" class="selectpara btn btn-squared btn-default margin-right-10">{$valvalue}</a>
<!--
EOT;
	}
echo <<<EOT
-->
		</div>
	</div>
<!--
EOT;
}
echo <<<EOT
-->
	<div class="form-group margin-top-15 clearfix"><!--兼容商城V3-->
		<label class="control-label font-weight-unset">{$_M['word']['app_shop_number']}</label>
		<div class="btn-num width-150">
			<input type="text" class="form-control text-center" data-min="1" data-max="{$shopmax}" data-plugin="touchSpin" name="buynum" id="buynum" autocomplete="off" value="1">
		</div>
	</div>
	<div class="form-group margin-top-15">
		<p class="shop-purchase">{$goods['stock_html']} {$goods['purchase_html']}</p>
	</div>
<!--
EOT;
// 兼容商城V3
if($is_shopv3){
	$favorite_href=$metinfo_member_name?$_M['url']['shop_favorite_do']:$_M['url']['shop_member_login'];
	if($is_favorite){
		$favorite_class1='success';
		$favorite_class2='fa-heart';
		$favorite_text=$_M['word']['app_shop_favorited'];
	}else{
		$favorite_class1='warning';
		$favorite_class2='fa-heart-o';
		$favorite_text=$_M['word']['app_shop_favorite_add'];
	}
}
$purchase_btn_class=$is_shopv3?' inline-block':'';
echo <<<EOT
-->
	<div class="form-group{$purchase_btn_class} margin-top-30 purchase-btn">
<!--
EOT;
// 兼容商城V3
if($is_shopv3){
echo <<<EOT
-->
		<a href="{$favorite_href}" data-pid='{$goods['pid']}' class='btn btn-squared btn-lg btn-{$favorite_class1} pull-right product-favorite'>
			<i class="icon {$favorite_class2}"></i>
			<span>{$favorite_text}</span>
		</a>
<!--
EOT;
}else{
echo <<<EOT
-->
		<a href="{$_M['url']['shop_tocart_now']}&pid={$goods['pid']}" class="btn btn-lg btn-squared btn-default margin-right-20 product-buynow">{$_M['word']['app_shop_buyimmediately']}</a>
		<div class="visible-xs-block height-10"></div>
<!--
EOT;
}
$favorite_m=$is_shopv3?' margin-right-20':'';
echo <<<EOT
-->
		<a href="{$_M['url']['shop_tocart']}&pid={$goods['pid']}" class="btn btn-lg btn-squared  inline-block btn-primary{$favorite_m} product-tocart">{$_M['word']['app_shop_tocart']}</a>
	</div>
</div>
<!--
EOT;
?>