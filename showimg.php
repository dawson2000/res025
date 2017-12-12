<?php
$sidebarnone = 1;
require_once template('head');
$imgshow=methtml_imgdisplay('img');
//让内容支持图片懒加载
$img['content'] = $metdispose->lazyload($img['content']);
if(!$img['issue'])$img['issue'] = $met_webname;
$paddingb=count($displaylist)?'slick-dotted':'';
echo <<<EOT
-->
<section class="met-shownews animsition">
	<div class="container">
		<div class="row">
			<div class="col-md-9 met-shownews-body">
				<div class="row">
					<div class="met-shownews-header">
						<h1>{$img[title]}</h1>
						<div class="info">
							<span>
								{$img['updatetime']}
							</span>
							<span>
								{$img['issue']}
							</span>
							<span>
								<i class="icon wb-eye margin-right-5" aria-hidden="true"></i>{$img['hits']}
							</span>
						</div>
					</div>
<!--
EOT;
if($displaylist || $img[imgurl]){
echo <<<EOT
-->
					<div class='met-showimg-con bg-white'>
						<div class='met-showimg-list fngallery margin-0 text-center {$paddingb}' id="met-imgs-carousel">
<!--
EOT;
	if($displaylist){
		foreach($displaylist as $key=>$val){
		    $src='data-lazy';
		    $exthumbimage="{$thumb_src}dir={$val[imgurl]}&x=60&y=60";
		    if($key==0){
		        $src='src';
		        $exthumbimage="{$thumb_src}dir={$val[imgurl]}&x={$met_imgdetail_x}&y={$met_imgdetail_y}";
		    }
echo <<<EOT
-->
	                        <div class='slick-slide lg-item-box' data-src="{$val[imgurl]}" data-exthumbimage="{$exthumbimage}">
	                        	<span>
	                                <img {$src}="{$thumb_src}dir={$val[imgurl]}&x={$met_imgdetail_x}&y={$met_imgdetail_y}" class="img-responsive" alt="{$val[title]}" />
	                            </span>
	                        </div>
<!--
EOT;
		}
	}else {
echo <<<EOT
-->
							<div class='slick-slide lg-item-box' data-src="{$img[imgurl]}" data-exthumbimage="{$thumb_src}dir={$img[imgurl]}&x={$met_imgdetail_x}&y={$met_imgdetail_y}">
	                            <span>
	                                <img src="{$thumb_src}dir={$img[imgurl]}&x={$met_imgdetail_x}&y={$met_imgdetail_y}" class="img-responsive" alt="{$img[title]}" />
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
}
if($img_paralist){
echo <<<EOT
-->
					<div class='imgpara bg-white'>
						<ul class="imgparalist blocks-2 blocks-md-4">
<!--
EOT;
	foreach($img_paralist as $key=>$val2){
		if($img[$val2[para]]){
echo <<<EOT
-->
							<li><span>{$val2[name]}：</span>{$img[$val2[para]]}</li>
<!--
EOT;
		}
	}
echo <<<EOT
-->
						</ul>
					</div>
<!--
EOT;
}
echo <<<EOT
-->
					<div class="met-editor lazyload clearfix">
						{$img[content]}
<!--
EOT;
if($lang_sharecode){
echo <<<EOT
-->
						<div class="center-block met_tools_code">{$lang_sharecode}</div>
<!--
EOT;
}
echo <<<EOT
-->
					</div>
					<div class="met-shownews-footer">
<!--
EOT;
$previousdisabled = $nextinfo['url']=='#'?'disabled':'';
$nextdisabled = $preinfo['url']=='#'?'disabled':'';
echo <<<EOT
-->
						<ul class="pager pager-round">
							<li class="previous {$previousdisabled}">
								<a href="{$nextinfo[url]}" title="{$nextinfo[title]}">
									{$lang_preinfo}
									<span aria-hidden="true" class='hidden-xs'>：{$nextinfo[title]}</span>
								</a>
							</li>
							<li class="next {$nextdisabled}">
								<a href="{$preinfo[url]}" title="{$preinfo[title]}">
									{$lang_nextinfo}
									<span aria-hidden="true" class='hidden-xs'>：{$preinfo[title]}</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="row">
<!--
EOT;
require_once template('modular/img/bar');
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
?>