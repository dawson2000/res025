/*
 * M['weburl'] 		//网站网址
 * M['lang']  		//网站语言
 * M['tem']  		//模板目录路径
 * M['classnow']  	//当前栏目ID
 * M['id']  		//当前页面ID
 * M['module']  	//当前页面所属模块
 * lazyloadbg       //系统调用的延迟加载背景图片路径,base64：灰色
 * deviceType       //客户端判断（d：桌面电脑，t：平板电脑，m：手机）
*/
$(document).ready(function() {
    if(M['classnow']==10001){
        // 图片懒加载
        var $index_original=$('.met-index-body [data-original]');
        if($index_original.length){
            $index_original.lazyload({
                load:function(){
                    if($(this).parents('.met-index-service').length) $('.met-index-service [class*=block] li').matchHeight();
                }
            });
        }

        // 首页首屏内动画预加载
        var $met_indexbody1_appear=$('.met-index-body:eq(0) [data-plugin=appear]');
        if($met_indexbody1_appear.length){
            $met_indexbody1_appear.scrollFun(function(val){
                val.appearDiy();
            });
        }
		
		$(".newslist").mCustomScrollbar({
				scrollInertia:600,
				autoDraggerLength:false
			});
		//新闻头条
		if($("#newsad").length){
			$('#newsad').slick({
				  slidesToShow: 1,
				  slidesToScroll: 1,
				  autoplay:true,
				  autoplaySpeed:3000,
				  dots:true
				});
	
		}
		
		if($("#topic").length){
			$('#topic').slick({
			  slidesToShow: 4,
			  slidesToScroll: 1,
			  autoplay:true,
			  autoplaySpeed:2000,
			  prevArrow:met_prevArrow,
              nextArrow:met_nextArrow,
              responsive: [
			    {
			      breakpoint: 480,
			      settings: {
			        slidesToShow: 3
			      }
			    }
			  ]
			});
		}
        // 产品列表
        if($(".met-index-allnews").length){
            //内滚导航条（移动端）
            Breakpoints.on('xs sm',{
                enter: function(){
                    navtabSwiper('.met-index-allnews .tab-list');
                }
            })
        }

        // 新闻列表
        // 图片高度预设
        if($('.met-index-news ul.blocks-2').length) imageSize('.met-index-news ul.blocks-2');
    }
})
// 分类筛选动画(可控制默认选项对应的显示数量)
function IsotopeNum(itObj,itControl) {
    var itFun=$(itObj).isotope(),
    	intItControlAttr=$(itControl+'.active a').data('filter');
    $(itControl).on('click', 'a', function() {
        var filterValue = $(this).data('filter'),
            filterValues=filterValue=='*'?'[data-type]':'[data-type='+filterValue+']',
            num=$(this).data('num');
        if(num) filterValues=function(){return $(this).index() < num;} || filterValues;
        itFun.isotope({filter:filterValues});
        if(filterValue!=intItControlAttr){
            $(filterValues+' [data-original]').each(function() {
                if($(this).data('original')!=$(this).attr('src'))
                $(this).lazyload({event:'sporty'}).trigger('sporty');
            });
        }
    });
    // 触发默认选项点击效果
    if($(itControl+'.active a').data('num')){
        setTimeout(function () {
            $(itControl+'.active a').trigger('click');
        },500);
    }
}