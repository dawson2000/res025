<?php
require_once template('min/metdispose.class');
$tmppath=$metdispose->tmppath;
$tmpvendor="{$tmppath}min/static/vendor/";
$tmpwidget="{$tmppath}min/widget/";
$tmpjs="{$tmppath}min/js/";

// $config  内置UI
// $paths[] 自定义引用文件
$config = array(
	//表单验证
	'formvalidation'			=> true,
	//按钮加载状态
	'ladda'						=> true,
	//响应式表格
	'tablesaw'					=> true
);
// 图片懒加载
$paths[] = "{$tmpwidget}lazyload/jquery.lazyload.min.js";
// 瀑布流
$config['masonry'] = true;
// 瀑布流增强
$paths[] = "{$tmpwidget}masonry-extend/imagesloaded.js";
$paths[] = "{$tmpwidget}masonry-extend/classie.js";
$paths[] = "{$tmpwidget}masonry-extend/AnimOnScroll.js";
// 图片画廊
$paths[] = "{$tmpwidget}lightGallery/css/lightgallery.min.css";
$paths[] = "{$tmpwidget}lightGallery/js/lightgallery-all.min.js";
// 等高
$paths[] = "{$tmpvendor}matchheight/jquery.matchHeight-min.js";
// 滑动插件
$paths[] = "{$tmpwidget}swiper/swiper-3.3.1.min.css";
$paths[] = "{$tmpwidget}swiper/swiper-3.3.1.jquery.min.js";
// slick
$paths[] = "{$tmpwidget}slick/slick.css";
$paths[] = "{$tmpwidget}slick/slick-theme.css";
$paths[] = "{$tmpwidget}slick/slick.min.js";

//滚动条
$paths[] = "{$tmpwidget}scrollbar/jquery.mCustomScrollbar.concat.min.js";
$paths[] = "{$tmpwidget}scrollbar/jquery.mCustomScrollbar.css";

// 商城模块支持
//$paths[] = "{$tmpjs}shop.js";
$config['asscrollable'] = true;// 滚轴
$config['bootstrap-touchspin'] = true;// 商品数量调整
$config['alertify'] = true;// alert美化
// 导航下拉菜单鼠标经过
$config['bootstrap_hover_dropdown'] = true;
// 底部导航右侧微信弹框
$config['webuiPopover'] = true;// webui弹出
// 底部语言切换国旗图标
$config['flag-icon'] = true;
// 表单验证
$paths[] = "{$tmpjs}form.js";
// 招聘模块
$paths[] = "{$tmpjs}job.js";
// 图片模块
$paths[] = "{$tmpjs}img.js";
// 产品模块
$paths[] = "{$tmpjs}product.js";
// 文章模块
$paths[] = "{$tmpjs}news.js";
// 分页
$paths[] = "{$tmpjs}page.js";
// 编辑器
$paths[] = "{$tmpjs}editor.js";
// 首页
// 出现
$config['appear'] = true;
// 分类筛选动画效果
$paths[] = "{$tmpvendor}isotope/isotope.pkgd.min.js";
$paths[] = "{$_M['url']['static']}js/components/filterable.min.js";
$paths[] = "{$tmpjs}index.js";

//
$paths[] = "{$tmpwidget}hoverdir/jquery.hoverdir.js";

// 公共
$paths[] = "{$tmpjs}own.js";
$paths[] = "{$tmpjs}sys.js";// 访问统计、在线客服等系统支持
// 字体图标
$paths[] = "{$tmpvendor}7-stroke/7-stroke.min.css";
// 样式
$paths[] = "{$tmppath}min/css/metinfo.css";

// UI注册
$metdispose->config = $config;
// 缓存
$metdispose->cache = true;
if($metdispose->cache){
	$metdispose->uiVersion[css]='?20171012112118';
	$metdispose->uiVersion[js]='?20171012112118';
}
// 执行合并
$resui = $metdispose->getUi($paths);
// 兼容商城V3
$resui[js]=array($resui[js]);
if($_M['config']['shopv2_open']){
    $is_shopv3=isset($_M['config']['shopv2_logistics_open']);
    if($is_shopv3){
        // 新商城前台语言参数js
        $shoplang_fileurl="{$navurl}app/app/shop/lang/shop_lang_{$lang}.js";
        $shoplang_fileurl="{$shoplang_fileurl}?".date('YmdHis',filemtime($shoplang_fileurl));
        array_unshift($resui[js],$shoplang_fileurl);
        if($product){
            // 新商城兼容css
            $shop_css_fileurl="{$navurl}templates/{$met_skin_user}/min/css/shop_v3.css";
            $resui[shop_css]="{$shop_css_fileurl}?".date('YmdHis',filemtime($shop_css_fileurl));
        }
    }
    // 新老商城js选择
    $shop_js=$is_shopv3?'shop_v3':'shop';
    $shop_js_fileurl="{$navurl}templates/{$met_skin_user}/min/js/{$shop_js}.js";
    $resui[js][]="{$shop_js_fileurl}?".date('YmdHis',filemtime($shop_js_fileurl));
}
?>