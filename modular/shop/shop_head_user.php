<?php
// 兼容商城V3
if(!$_M[user][head]) $_M[user][head]=get_met_cookie('metinfo_member_head');
if(strstr($_M[user][head],$_M[url][site])){
    $_M[user][head]=str_replace($_M[url][site],$navurl,$_M[user][head]);
}else{
    $_M[user][head]=$navurl.$_M[user][head];
}
$metinfo_member_name = get_met_cookie('metinfo_member_name');
if($metinfo_member_name){
echo <<<EOT
-->
<ul class="nav navbar-nav navbar-right met-nav-right-shop">
	<li class="dropdown">
		<a 
			class="navbar-avatar dropdown-toggle" 
			data-toggle="dropdown"
			href="#" 
			aria-expanded="false"
		>
			<span class="avatar avatar-online margin-right-5">
				<img src="{$_M['user']['head']}" alt="{$metinfo_member_name}">
			</span>
			{$metinfo_member_name}
			<span class="caret"></span>
		</a>
		<ul class="dropdown-menu dropdown-menu-right animate" role="menu">
			<li role="presentation">
				<a href="{$_M['url']['shop_profile']}" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> {$_M['word']['app_shop_personal']}</a>
			</li>
			<li role="presentation">
				<a href="{$_M['url']['shop_order']}" role="menuitem"><i class="icon wb-order" aria-hidden="true"></i> {$_M['word']['app_shop_myorder']}</a>
			</li>
			<li role="presentation">
				<a href="{$_M['url']['shop_member_base']}&nojump=1" target="_blank" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> {$_M['word']['app_shop_settings']}</a>
			</li>
			<!--
EOT;
// 兼容商城V3
if($is_shopv3){
echo <<<EOT
-->
            <li role="presentation">
                <a href="{$_M['url']['shop_favorite']}" role="menuitem"><i class="icon wb-heart" aria-hidden="true"></i> {$_M['word']['app_shop_myfavorite']}</a>
            </li>
            <li role="presentation">
                <a href="{$_M['url']['shop_discount']}" role="menuitem"><i class="icon wb-bookmark" aria-hidden="true"></i> {$_M['word']['app_shop_mydiscount']}</a>
            </li>
<!--
EOT;
}
echo <<<EOT
-->
			<li class="divider" role="presentation"></li>
			<li role="presentation">
				<a href="{$_M['url']['shop_member_login_out']}" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> {$_M['word']['app_shop_out']}</a>
			</li>
		</ul>
	</li>
	<li class="dropdown">
		<a 
			data-toggle="dropdown" 
			href="javascript:void(0)" 
			title="{$_M['word']['app_shop_cart']}" 
			aria-expanded="false" 
			data-animation="slide-bottom" 
			role="button"
		>
			<i class="icon wb-shopping-cart" aria-hidden="true"></i>
			{$_M['word']['app_shop_cart']}
			<span class="badge badge-danger up hide topcart-goodnum"></span>
		</a>
		<ul class="dropdown-menu dropdown-menu-right dropdown-menu-media topcartremove animation-slide-bottom" role="menu">
			<li class="dropdown-menu-header">
				<h5>{$_M['word']['app_shop_cart']}</h5>
				<span class="label label-round label-danger">{$_M['word']['app_shop_intotal']} <span class="topcart-goodnum"></span> {$_M['word']['app_shop_piece']}{$_M['word']['app_shop_commodity']}</span>
			</li>
			<li class="list-group dropdown-scrollable" role="presentation">
				<div data-role="container">
					<div data-role="content" id="topcart-body"></div>
				</div>
			</li>
			<li class="dropdown-menu-footer" role="presentation">
				<div class="dropdown-menu-footer-btn">
					<a href="{$_M['url']['shop_cart']}" class="btn btn-squared btn-danger margin-bottom-5 margin-right-10">{$_M['word']['app_shop_gosettlement']}</a>
				</div>
				<span class="red-600 font-size-18 topcarttotal"></span>
			</li>
		</ul>
	</li>
</ul>
<!--
EOT;
}else{
echo <<<EOT
-->			
	<div class="navbar-right vertical-align met-nav-login animation-slide-top">
		<div class="vertical-align-middle margin-right-10"><a href="{$_M[url][site]}member/register_include.php?lang={$_M[lang]}" class="btn btn-squared btn-success">{$_M['word']['app_shop_register']}</a></div>
		<div class="vertical-align-middle"><a href="{$_M[url][site]}member/login.php?lang={$_M[lang]}" class="btn btn-squared btn-primary btn-outline">{$_M['word']['app_shop_login']}</a></div>
	</div>
<!--
EOT;
}
echo <<<EOT
-->
<!--
EOT;
?>