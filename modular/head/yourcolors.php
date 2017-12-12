<?php
function hex2rgb1( $colour ) { 
    if ( $colour[0] == '#' ) { 
        $colour = substr( $colour, 1 ); 
    } 
    if ( strlen( $colour ) == 6 ) { 
        list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] ); 
    } elseif ( strlen( $colour ) == 3 ) { 
        list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] ); 
    } else { 
        return false; 
    } 
    $r = hexdec( $r ); 
    $g = hexdec( $g ); 
    $b = hexdec( $b ); 
    return array( $r, $g, $b ); 
}
$colors=hex2rgb1($lang_main_colors);
$colors1=hex2rgb1($lang_second_colors);
echo <<<EOT
-->
<style>
	.header {
	    background-color: {$lang_main_colors};
	}
	.met-nav .nav li a.active, .met-nav .dropdown.open > a{
		background-color:{$lang_second_colors};
	}
	.met-nav .nav > li > a:hover, .met-nav .dropdown.open > a{
		background-color:{$lang_second_colors};
	}
	.met-nav .navbar-nav > li:before{
		background-color:{$lang_second_colors};
	}
	.met-index-body h2{
		color:{$lang_main_colors};
	}
	.met-index-news ul.newslist li a{
		color:{$lang_main_colors};
	}
	.met-index-news a.more{
		color:{$lang_second_colors};
	}
	.met-index-news a.more:hover{
		background-color:{$lang_second_colors};
	}
	.met-index-allnews .tab-list li{
		background-color: {$lang_main_colors};
	}
	.met-index-allnews .tab-list li.active{
		background-color:{$lang_second_colors};
	}
	.met-index-allnews .tab-list li i{
		color:{$lang_second_colors};
	}
	.met-index-allnews .tab-list li:hover{
		background-color:{$lang_second_colors};
	}
	.met-index-allnews .tab-content .media-heading a{
		color:{$lang_main_colors};
	}
	.met-index-allnews .met-col-more a{
		color:{$lang_main_colors};
	}
	.met-index-topic .navigation{
		background-color: {$lang_main_colors};
	}
	.met-index-topic ul h4{
		background-color: {$lang_main_colors};
	}
	.met-index-topic ul h4:before{
		background-color:{$lang_second_colors};
	}
	.met-index-news #newsad .slick-dots li.slick-active button:before{
		color: {$lang_second_colors};
	}
	.newslist .mCSB_scrollTools .mCSB_draggerRail{
		border-right: 1px dashed {$lang_main_colors};
	}
	.newslist .mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar{
		background-color: {$lang_main_colors};
	}
	footer,.met-links,.met-footnav{
		background-color: {$lang_main_colors};
		border-top:1px solid rgba(255, 255, 255, 0.1);
	}
	a{
		color: {$lang_second_colors};
	}
	a:focus, a:hover{
		color: {$lang_second_colors};
	}
	.met-footnav h4 a:hover,.met-footnav ul li a:hover{
		color: {$lang_second_colors};
	}
	.met-show .about-left .ab-top{
		background-color: {$lang_main_colors};
	}
	.met-show .about-left .ab-top h4{
		color: {$lang_second_colors};
	}
	.gallery h3{
		color: {$lang_main_colors};
	}
	.da-thumbs li a div{
		background: rgba({$colors[0]}, {$colors[1]}, {$colors[2]}, 0.72);
	}
	.met-show a.more{color: {$lang_main_colors};}
	.news h3{
		color: {$lang_second_colors};
	}
	.gallery{
		background:rgba({$colors1[0]}, {$colors1[1]}, {$colors1[2]}, 0.66);
	}
	.met_pager a.Ahover{
		border-color: {$lang_main_colors};
    	background: {$lang_main_colors};
	}
	.met-product.type-1 h4 a:hover{
		color: {$lang_second_colors};
	}
	.met-position a, .breadcrumb > li + li:before{
		color: {$lang_second_colors};
	}
	.nav-tabs-line > li.active > a, .nav-tabs-line > li.active > a:focus, .nav-tabs-line > li.active > a:hover{
	    border-bottom: 2px solid {$lang_second_colors};
    	color: {$lang_second_colors};
	}
	.dropdown-menu > li > a:hover{
		color: {$lang_second_colors} !important;
	}
	.met-showproduct.pagetype1 .met-showproduct-body .product-hot .mob-masonry a.txt:hover{
		color: {$lang_second_colors};
	}
	.met-banner-ny{
		background-color: {$lang_main_colors};
	}
	.met-news ul.met-page-ajax li h4 a:hover{
		color: {$lang_second_colors};
	}
	.met-news-bar .recommend .list-group a:hover{
		color: {$lang_second_colors};
	}
	.met-news-bar ul.column li a:hover{
		color: {$lang_second_colors};
	}
	.met-news-bar ul.column li a.active{
		color: {$lang_second_colors};
	}
	.pager li a:focus, .pager li a:hover{
		color: {$lang_second_colors};
		border-color: {$lang_second_colors};
	}
	
	.btn-primary{background-color: {$lang_second_colors};
    border-color: {$lang_second_colors};}
.btn-outline.btn-primary{border-color: {$lang_second_colors};
                color: {$lang_second_colors};}
.btn-primary.focus, .btn-primary:focus, .btn-primary:hover{
    border-color: #fff;
    color: {$lang_second_colors};
    background-color: #fff;
}
.btn-outline.btn-primary.active, .btn-outline.btn-primary:active, .btn-outline.btn-primary:focus, .btn-outline.btn-primary:hover, .open>.dropdown-toggle.btn-outline.btn-primary{
    color: #fff;
    background-color: {$lang_second_colors};
    border-color: {$lang_second_colors};
}
.radio-primary input[type="radio"]:checked + label::before{
    border-color: {$lang_second_colors};
}
.modal-primary .modal-header{ background-color: {$lang_second_colors};}
.form-control.focus, .form-control:focus{ border-color: {$lang_second_colors};}
.met-position a,.breadcrumb>li+li:before{color: {$lang_second_colors};}
.met-column-nav .met-column-nav-ul > li a.link:hover, .met-column-nav .met-column-nav-ul > li a.link.active{
	color: {$lang_second_colors};
}
.slick-arrow:hover{
	color: {$lang_second_colors} !important;
}
.met-index-allnews .tab-list li + li{
	border-left: 1px solid rgba(255, 255, 255, 0.1);
}
.nav-tabs-line>li.active>a, .nav-tabs-line>li.active>a:focus, .nav-tabs-line>li.active>a:hover{border-bottom:2px solid {$lang_second_colors};color: {$lang_second_colors};}
.met-index-about{background-color: {$lang_main_colors};}
.news a:hover h4{color:{$lang_second_colors};}
.met-nav .nav > li > a:hover, .met-nav .dropdown.open > a{
	    background-color: {$lang_second_colors} !important;
}
.met-index-about h2{
	color:{$lang_font_colors};
}

.met-index-allnews .tab-list li h2{
	color:{$lang_font_colors};
}
.met-index-topic .navigation .i-themetitle{
	color:{$lang_font_colors};
}
.met-index-topic ul h4 a{
	color:{$lang_font_colors};
}
footer{
	color:{$lang_font_colors};
}
.met-footnav h4 a{
	color:{$lang_font_colors};
}
.met-footnav ul li a{
	color:{$lang_font_colors};
}
.met-links{
	color:{$lang_font_colors};
}
.met-links .breadcrumb > li + li:before{
	color:{$lang_font_colors};
}
.met-links a{
	color:{$lang_font_colors};
}
footer .met-langlist > .btn-outline.btn-default{
	color:{$lang_font_colors} !important;
	border-color:{$lang_font_colors} !important;
}
</style>
<!--
EOT;
?>