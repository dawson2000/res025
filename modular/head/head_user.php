<?php
$user_head=$navurl.'include/thumb.php?dir='.str_replace($_M[url][site],'',get_met_cookie('metinfo_member_head')).'&x=30&y=30';
$metinfo_member_name = get_met_cookie('metinfo_member_name');
if($metinfo_member_name){
echo <<<EOT
-->
<ul class="navbar-nav navbar-right vertical-align padding-left-0 margin-bottom-0 met-head-user">
    <li class="dropdown">
        <a
            href="javascript:;"
            class="navbar-avatar dropdown-toggle"
            data-toggle="dropdown"
            aria-expanded="false"
        >
            <span class="avatar avatar-online margin-right-5">
                <img src="{$user_head}" alt="{$metinfo_member_name}">
            </span>
            {$metinfo_member_name}
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-right animate">
            <li role="presentation">
                <a href="{$_M['url']['site']}member/basic.php?lang={$lang}" title='{$_M['word']['memberIndex9']}' role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> {$_M['word']['memberIndex9']}</a>
            </li>
            <li role="presentation">
                <a href="{$_M['url']['site']}member/basic.php?lang={$lang}&a=dosafety" title='{$_M['word']['accsafe']}' role="menuitem"><i class="icon wb-lock" aria-hidden="true"></i> {$_M['word']['accsafe']}</a>
            </li>
<!--
EOT;
foreach($_M['html']['app_sidebar'] as $key=>$val){
echo <<<EOT
-->
            <li role="presentation">
                <a href="{$val['url']}" title='{$val['title']}' role="menuitem"><i class="icon fa-money" aria-hidden="true"></i> {$val['title']}</a>
            </li>
<!--
EOT;
}
echo <<<EOT
-->
            <li class="divider" role="presentation"></li>
            <li role="presentation">
                <a href="{$_M['url']['site']}member/login.php?lang={$lang}&a=dologout" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> {$_M['word']['memberIndex10']}</a>
            </li>
        </ul>
    </li>
</ul>
<!--
EOT;
}else{
echo <<<EOT
-->
<div class="navbar-nav navbar-right vertical-align text-xs-center animation-slide-top met-nav-login">
    <div class="vertical-align-middle margin-right-10"><a href="{$_M[url][site]}member/register_include.php?lang={$lang}" class="btn btn-squared btn-success">{$_M['word']['register']}</a></div>
    <div class="vertical-align-middle"><a href="{$_M[url][site]}member/login.php?lang={$lang}" class="btn btn-squared btn-primary btn-outline">{$_M['word']['login']}</a></div>
</div>
<!--
EOT;
}
?>