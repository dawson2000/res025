<?php
if($class_list[$class1]['module']==9){
	echo '-->'.'非常抱歉！友情链接栏目无实际用途，本模板废除该模块。';
	die();
}
$_M['url']['static'] = $_M['url']['static']?$_M['url']['static']:$_M['url']['sta'];
class MetDispose {
	public $config;
	public $cache;
	public $navurl;
	public $skin;
	public $tmppath;
	public $relativeCache;
	public $prefix;
	public $uiVersion;
	public $isIe9;
	public function __construct() {
		global $_M,$navurl,$met_skin_user;
		$this->cache 	= true;
		$this->navurl 	= $navurl;
		$this->skin 	= $met_skin_user;
		$this->tmppath 	= "{$_M[url][site]}templates/{$this->skin}/";
		$this->relativeCache= "{$this->navurl}templates/{$this->skin}/cache/";
		$ui_version_default = '?'.date('YmdHis');
		$this->uiVersion = array(css=>$ui_version_default,js=>$ui_version_default);
		$this->isIe9   = strpos($_SERVER["HTTP_USER_AGENT"],'MSIE 9');
	}
	/*组件调用*/
	public function getUi($paths){
		if($this->cache){
			//开启缓存
			$cache_url= "{$this->tmppath}cache/";
			if($this->isIe9){
				for ($i=1; $i <= 4; $i++) {
					$retun[css][]="{$cache_url}metinfo-ie9-{$i}.css";
					if(!file_exists("{$this->relativeCache}metinfo-ie9-{$i}.css")) $uimerge_css_ie9_only=true;
				}
				$retun[js_ie9_compatible]="{$cache_url}met-ie9-compatible.js";
				if(!file_exists("{$this->relativeCache}met-ie9-compatible.js")) $ie9Compatible=true;
			}else{
				$retun[css]="{$cache_url}metinfo.css";
				if(!file_exists("{$this->relativeCache}metinfo.css")) $uimerge_css_only=true;
			}
			$retun[js]="{$cache_url}metinfo.js";
			if(!file_exists("{$this->relativeCache}metinfo.js")) $uimerge_js_only=true;
		}
		if(!$this->cache || $uimerge_css_only || $uimerge_css_ie9_only || $uimerge_js_only || $ie9Compatible){
			// 合并资源输出路径
			if(!is_array($paths)) $paths = explode(',',$paths);
			foreach($paths as $val){
				$hz = pathinfo($val,PATHINFO_EXTENSION);
				if($hz=='css')$uimerge_css[] = $val;
				if($hz=='js')$uimerge_js[] = $val;
			}
			if($this->cache){
				if($uimerge_css_only) $this->uiCss($uimerge_css,'uimerge_css_only');
				if($uimerge_css_ie9_only) $this->uiCss($uimerge_css,'uimerge_css_ie9_only');
				if($uimerge_js_only) $this->uiJs($uimerge_js,'uimerge_js_only');
				if($ie9Compatible) $this->uiJs('','',true);
			}else{
				$retun[css] = $this->uiCss($uimerge_css);
				$retun[js] = $this->uiJs($uimerge_js);
				$retun[js_ie9_compatible] = $this->uiJs('','',true);
			}
		}
		//生成html
		if($this->isIe9){
		    foreach ($retun[css] as $key => $val) {
		    	$resui[css].="<link rel='stylesheet' href='{$val}{$this->uiVersion[css]}'>\n";
		    }
		    $resui[js_ie9_compatible] = "<!--[if lt IE 10]><script src='{$retun[js_ie9_compatible]}'></script><![endif]-->";
		}else{
			$resui[css]="<link rel='stylesheet' href='{$retun[css]}{$this->uiVersion[css]}'>";
		}
		$resui[js] = $retun[js].$this->uiVersion[js];

		return $resui;
	}
	/*css合并*/
	public function uiCss($paths,$mergeOnly){
		global $_M;
		$uide = array(
				"{$_M['url']['static']}css/bootstrap.min.css",
				"{$_M['url']['static']}css/bootstrap-extend.min.css",
				"{$_M['url']['static']}assets/css/site.min.css",
				"{$_M['url']['static']}fonts/web-icons/web-icons.min.css",
				"{$_M['url']['static']}fonts/font-awesome/font-awesome.min.css"
			);
		$uimo = array_merge($uide,$this->uiUrl('css'));
		if($mergeOnly!='uimerge_css_only'){
			//IE9兼容，样式文件打包成四份
			$ui_ie9=array(array_merge(array($uide[0],$uide[3],$uide[4]),$this->uiUrl('css')),$uide[1],$uide[2],$paths);
			foreach ($ui_ie9 as $key => $value) {
				$order=$key+1;
				$uicss_ie9[]=$this->uiMerge($value,'css','','','metinfo-ie9-'.$order,$mergeOnly);
			}
		}
		if($mergeOnly){
			if($mergeOnly=='uimerge_css_only') $this->uiMerge($paths?array_merge($uimo,$paths):$uimo,'css','','','',true);
		}else{
			if($this->isIe9){
				return $uicss_ie9;
			}else{
				return $this->uiMerge($paths?array_merge($uimo,$paths):$uimo,'css');
			}
		}
	}
	/*js合并*/
	public function uiJs($paths,$mergeOnly,$ie9Compatible){
		global $_M;
		/*js兼容ie9*/
		$paths_ie9_compatible=array(
			    "{$_M['url']['static']}vendor/media-match/media.match.min.js",
			    "{$_M['url']['static']}vendor/respond/respond.min.js",
			    "{$_M['url']['static']}js/classList.min.js"
			);
		if($ie9Compatible){
			return $this->uiMerge($paths_ie9_compatible,'js','','','met-ie9-compatible');
		}else{
			$this->uiMerge($paths_ie9_compatible,'js','','','met-ie9-compatible',true);
		}
		$uide = array(
				"{$_M['url']['static']}vendor/jquery/jquery.min.js",
				"{$_M['url']['static']}vendor/bootstrap/bootstrap.min.js",
				"{$_M['url']['static']}vendor/breakpoints/breakpoints.min.js",//媒体查询
				"{$_M['url']['static']}js/core.min.js",
				"{$_M['url']['static']}assets/js/site.min.js",
				"{$_M['url']['static']}vendor/modernizr/modernizr.min.js"//监测浏览器支持
			);
		$uimo = array_merge($uide,$this->uiUrl('js'));
		$code[0]['code'] = "var M=document.querySelector('meta[name=\"generator\"]').getAttribute('data-variable'),D=M.split(',');M=new Array();M['weburl']=D[0];M['lang']=D[1];M['classnow']=parseInt(D[2]);M['id']=parseInt(D[3]);M['module']=parseInt(D[4]);M['tem']=D[0]+'templates/'+D[5];var deviceType = /iPad/.test(navigator.userAgent) ? 't' : /Mobile|iP(hone|od)|Android|BlackBerry|IEMobile|Silk/.test(navigator.userAgent) ? 'm' : 'd',is_ucbro=/UC/.test(navigator.userAgent);";
		if($mergeOnly){
			$this->uiMerge($paths?array_merge($uimo,$paths):$uimo,'js',$code,'','',true);
		}else{
			return $this->uiMerge($paths?array_merge($uimo,$paths):$uimo,'js',$code);
		}
	}
	/*返回组件路径*/
	public function uiUrl($type){
		global $_M;
		if($this->config['formvalidation']){
			$url['css'][] = "{$_M['url']['static']}vendor/formvalidation/formValidation.min.css";
			$url['js'][] = "{$_M['url']['static']}vendor/formvalidation/formValidation.min.js";
			$url['js'][] = "{$_M['url']['static']}vendor/formvalidation/framework/bootstrap.min.js";
			$url['js'][] = "{$_M['url']['static']}vendor/jquery-placeholder/jquery.placeholder.min.js";
			$url['js'][] = "{$_M['url']['static']}js/components/jquery-placeholder.min.js";
		}
		if($this->config['asscrollable']){
			$url['css'][] = "{$_M['url']['static']}vendor/asscrollable/asScrollable.min.css";
			$url['js'][] = "{$_M['url']['static']}vendor/asscrollable/jquery.asScrollable.all.min.js";
			$url['js'][] = "{$_M['url']['static']}js/components/asscrollable.min.js";
		}
		if($this->config['animsition']){
			$url['css'][] = "{$_M['url']['static']}vendor/animsition/animsition.min.css";
			$url['js'][]  = "{$_M['url']['static']}vendor/animsition/animsition.min.js";
			$url['js'][]  = "{$_M['url']['static']}js/components/animsition.min.js";
		}
		if($this->config['alertify']){
			$url['css'][] = "{$_M['url']['static']}vendor/alertify-js/alertify.min.css";
			$url['js'][]  = "{$_M['url']['static']}vendor/alertify-js/alertify.js";
		}
		if($this->config['appear']){
			$url['js'][]  = "{$_M['url']['static']}vendor/jquery-appear/jquery.appear.js";
			$url['js'][]  = "{$_M['url']['static']}js/components/jquery-appear.min.js";
		}
		if($this->config['bootstrap_hover_dropdown']){
			$url['js'][] = "{$_M['url']['static']}vendor/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js";
		}
		if($this->config['webuiPopover']){
			$url['css'][] = "{$_M['url']['static']}vendor/webui-popover/webui-popover.min.css";
			$url['js'][]  = "{$_M['url']['static']}vendor/webui-popover/jquery.webui-popover.min.js";
			$url['js'][]  = "{$_M['url']['static']}js/components/webui-popover.min.js";
		}
		if($this->config['flag-icon']){
			$url['css'][] = "{$_M['url']['static']}vendor/flag-icon-css/flag-icon.min.css";
		}
		if($this->config['masonry']){
			$url['js'][]  = "{$_M['url']['static']}vendor/masonry/masonry.pkgd.min.js";
			$url['js'][]  = "{$_M['url']['static']}js/components/masonry.min.js";
		}
		if($this->config['bootstrap-touchspin']){
			$url['css'][]  = "{$_M['url']['static']}vendor/bootstrap-touchspin/bootstrap-touchspin.min.css";
			$url['js'][]  = "{$_M['url']['static']}vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js";
		}
		$static = "{$this->tmppath}min/static/";
		if($this->config['ladda']){
			$url['css'][] = "{$static}vendor/ladda-bootstrap/ladda.min.css";
			$url['js'][]  = "{$static}vendor/ladda-bootstrap/spin.min.js";
			$url['js'][]  = "{$static}vendor/ladda-bootstrap/ladda.min.js";
			$url['js'][]  = "{$_M['url']['static']}js/components/ladda-bootstrap.min.js";
		}
		if($this->config['tablesaw']){
			$url['css'][]  = "{$static}vendor/filament-tablesaw/tablesaw.min.css";
			$url['js'][]  = "{$static}vendor/filament-tablesaw/tablesaw.js";
			$url['js'][]  = "{$static}vendor/filament-tablesaw/tablesaw-init.js";
		}
		return $url[$type];
	}
	/*合并*/
	public function uiMerge($paths,$suffix,$prependcode,$appendcode,$filename,$returnNo){
		global $_M;
		//文件
		if(!is_array($paths)) $paths = explode(',',$paths);
		foreach($paths as $val){
			$val = str_replace($_M['url']['site'],"",$val);
			$urls[]=$this->navurl.$val;
			if(!file_exists($this->navurl.$val)) echo "{$this->navurl}{$val}文件不存在\n";
		}
		//路径
		if(!$filename){
			$filename = 'metinfo';
			if($this->prefix)$filename = $this->prefix.$filename;
		}
		$file_uimerge = "{$this->relativeCache}{$filename}.{$suffix}";
		//内容
		$code = $this->getContent($urls,$suffix,$prependcode,$appendcode);
		//生成
		$file = fopen($file_uimerge, "w");
		foreach($code as $val){
			if($val['code']){
				fwrite($file, "/*{$val['name']}*/\n{$val['code']}\n");
			}
		}
		fclose($file);
		if(!$returnNo) return $file_uimerge;
	}
	/*抓取内容*/
	public function getContent($urls,$suffix,$prependcode,$appendcode){
		if($prependcode){//前置
			foreach($prependcode as $val){
				$code[] = $val;
			}
		}
		foreach($urls as $val){
			$codea['name'] = pathinfo($val,PATHINFO_BASENAME);
			$codea['code'] = $this->psContent($val,$suffix);
			$code[] = $codea;
			if(strpos($val,'breakpoints')){
				$codea['name'] = 'Breakpoints';
				$codea['code'] = 'Breakpoints();';
				$code[] = $codea;
			}
		}
		if($appendcode){//追加
			foreach($appendcode as $val){
				$code[] = $val;
			}
		}
		return $code;
	}
	/*内容处理*/
	public function psContent($val,$suffix){
		$code = file_get_contents($val);
		if($suffix=='css'){
			$navurl = $this->navurl==''?'../':'';
			$adurl = "{$navurl}../../".dirname($val).'/';
			$code = preg_replace('/url\(["\']*([\.\/]*)([^:]*?)["\']*\)/', 'url('.$adurl.'\1'.'\2'.')', $code);
		}
		return $code;
	}
	/*lazyload*/
	public function lazyload($str){
		$str = preg_replace('/(<img[^>]*)src(=[^>]*>)/', '\\1class="imgloading" height="200" data-original\\2', $str);
		return $str;
	}
	/*表单转换*/
	public function formation($data,$simplify){
		global $paravalue,$lang_Empty,$class_list,$class1;
		$type = $class_list[$class1]['module'] == 6?true:false;
		foreach($data as $key=>$val){
			if($val['type_class']!='ftype_input ftype_code'){
				$val['dataname'] = $type?$val['para']:"para{$val[id]}";
				$val['placeholder'] = $val['description'];
				$val['simplify'] = 0;
				$val['type_html'] = '';
				if($simplify&&$val['type']<4){
					$val['simplify'] = 1;
					$val['placeholder'] = $val['name'].' '.$val['description'];
				}
				$wr_ok = $val['wr_ok']?"data-fv-notempty=\"true\" data-fv-message=\"{$lang_Empty}\"":'';
				switch($val['type']){
					case 1:
						$val['type_html']="<input name='{$val[dataname]}' class='form-control' type='text' placeholder='{$val['placeholder']}' {$wr_ok} />";
					break;
					case 2:
						$val['type_html'] ="<select name='{$val['dataname']}' class='form-control' {$wr_ok}>";
						$val['type_html'].="<option value=''>{$val[name]}</option>";
						foreach($paravalue[$val['id']] as $key=>$pv){
							$val['type_html'].="<option value='{$pv[info]}'>{$pv[info]}</option>";
						}
						$val['type_html'].="</select>";
					break;
					case 3:
						$val['type_html']="<textarea name='{$val[dataname]}' class='form-control' {$wr_ok} placeholder='{$val['placeholder']}' rows='5'></textarea>";
					break;
					case 4:
						$i=0;
						foreach($paravalue[$val['id']] as $key=>$pv){
							$i++;
							$val['type_html'].="
								<div class=\"checkbox-custom checkbox-primary\">
									<input
										name='para{$val[id]}_{$i}'
										type=\"checkbox\"
										value='{$pv[info]}'
										id=\"para{$val[id]}_{$i}\"
									>
									<label for=\"para{$val[id]}_{$i}\">{$pv[info]}</label>
								</div>";
						}
						if($val['description']){
							$val['type_html'].="<span class=\"help-block\">{$val['description']}</span>";
						}
					break;
					case 5:
						$val['type_html']="
						<div class='input-group input-group-file'>
							<span class='input-group-btn'>
								<span class='btn btn-primary btn-file'>
									<i class='icon wb-upload' aria-hidden='true'></i>
									<input type='file' name='{$val[dataname]}' {$wr_ok} multiple=''>
								</span>
		                    </span>
		                    <input type='text' class='form-control' readonly=''>
	                  	</div>";
					break;
					case 6:
						$i=0;
						foreach($paravalue[$val['id']] as $pv){
							$i++;
							$checked=$i==1?'checked':'';
							$val['type_html'].="
								<div class=\"radio-custom radio-primary\">
									<input
										name='para{$val[id]}'
										type=\"radio\"
										{$checked}
										value='{$pv[info]}'
										id=\"para{$val[id]}_{$i}\"
									>
									<label for=\"para{$val[id]}_{$i}\">{$pv[info]}</label>
								</div>";
						}
						if($val['description']){
							$val['type_html'].="<span class=\"help-block\">{$val['description']}</span>";
						}
					break;
				}
				$list[] = $val;
			}
		}
		return $list;
	}
	/*区块增量转换为数组*/
	public function varsToArr($q,$arr){
		$num=count($arr);
		for($i=1;$i<$num;$i++){
			if($GLOBALS["lang_{$q}{$i}_ok"]){
				foreach($arr as $val){
					$metinfo[$i-1][$val] = $GLOBALS["lang_{$q}{$i}_{$val}"];
				}
			}
		}
		return $metinfo;
	}
	/*国旗转换*/
	public function iconvga($lang){
		switch($lang){
			case 'sq':$vga='al';break;
			case 'ar':$vga='sa';break;
			case 'az':$vga='az';break;
			case 'ga':$vga='ie';break;
			case 'et':$vga='ee';break;
			case 'be':$vga='by';break;
			case 'bg':$vga='bg';break;
			case 'pl':$vga='pl';break;
			case 'fa':$vga='ir';break;
			case 'af':$vga='za';break;
			case 'da':$vga='dk';break;
			case 'de':$vga='de';break;
			case 'ru':$vga='ru';break;
			case 'fr':$vga='fr';break;
			case 'tl':$vga='ph';break;
			case 'fi':$vga='fi';break;
			case 'ht':$vga='ht';break;
			case 'ko':$vga='kr';break;
			case 'nl':$vga='nl';break;
			case 'gl':$vga='es';break;
			case 'ca':$vga='es';break;
			case 'cs':$vga='cz';break;
			case 'hr':$vga='hr';break;
			case 'la':$vga='it';break;
			case 'lv':$vga='lv';break;
			case 'lt':$vga='lt';break;
			case 'ro':$vga='ro';break;
			case 'mt':$vga='mt';break;
			case 'ms':$vga='id';break;
			case 'mk':$vga='mk';break;
			case 'no':$vga='no';break;
			case 'pt':$vga='pt';break;
			case 'ja':$vga='jp';break;
			case 'sv':$vga='se';break;
			case 'sr':$vga='rs';break;
			case 'sk':$vga='sk';break;
			case 'sl':$vga='si';break;
			case 'sw':$vga='tz';break;
			case 'th':$vga='th';break;
			case 'cy':$vga='wls';break;
			case 'uk':$vga='ua';break;
			case 'iw':$vga='';break;
			case 'el':$vga='gr';break;
			case 'eu':$vga='es';break;
			case 'es':$vga='es';break;
			case 'hu':$vga='hu';break;
			case 'it':$vga='it';break;
			case 'yi':$vga='de';break;
			case 'ur':$vga='pk';break;
			case 'id':$vga='id';break;
			case 'en':$vga='gb';break;
			case 'vi':$vga='vn';break;
			case 'tc':$vga='cn';break;
			case 'cn':$vga='cn';break;
		}
		return $vga;
	}
}
$metdispose = new MetDispose();
/*列表页响应显示列数*/
function list_column_res($columnXs,$columnSm,$columnMd,$columnXlg){
	$column = array($columnXs,$columnSm,$columnMd,$columnXlg);
	$listcolumn = array(
		$listcolumn[0]='blocks-'.($column[0]==1?100:$column[0]),
		$listcolumn[1]='blocks-sm-'.$column[1],
		$listcolumn[2]='blocks-md-'.$column[2],
		$listcolumn[3]='blocks-xlg-'.$column[3],
	);
	for ($i=0; $i < 4; $i++) {
		if($column[$i]) $list_column_res.=$listcolumn[$i].' ';
	}
	return $list_column_res;
}
/*模块名称转模块标识*/
function modular_to_module($modular){
	switch ($modular) {
		case '简介模块':
			$module=1;
			break;
		case '文章模块':
			$module=2;
			break;
		case '产品模块':
			$module=3;
			break;
		case '下载模块':
			$module=4;
			break;
		case '图片模块':
			$module=5;
			break;
		case '招聘模块':
			$module=6;
			break;
		case '留言模块':
			$module=7;
			break;
		case '反馈模块':
			$module=8;
			break;
		case '友情链接':
			$module=9;
			break;
		case '会员中心':
			$module=10;
			break;
		case '全站搜索':
			$module=11;
			break;
		case '网站地图':
			$module=12;
			break;
		default:
			$module=0;
			break;
	}
	return $module;
}
/**
 * [useragent 客户端类型判断、客户端验证]
 * @param  [type] $isClient [需要验证的客户端类型]
 * @return [type]           [$isClient 为空时返回当前客户端类型，输入tablet、mobile、desktop则返回当前客户端是否为该类型的判断值]
 */
function useragent($isClient){
    $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
    $iphone = strpos($agent, 'mobile');
    $android = strpos($agent, 'android');
    $windowsPhone = strpos($agent, 'phone');
    $androidTablet=$android && !$iphone?true:false;
    $ipad = strpos($agent, 'ipad');
    //客户端类型判断
    if($androidTablet || $ipad){
        $client='tablet';
    }
    elseif($iphone && !$ipad || $android && !$androidTablet || $windowsPhone){
        $client='mobile';
    }
    else{
        $client='desktop';
    }
    if($isClient){
    	return $client==$isClient?true:false;//客户端验证
    }else{
    	return $client;
    }
}
/*模块标识转模块列表图片尺寸*/
function modular_img_size($module){
	global $met_newsimg_x,$met_newsimg_y,$met_imgs_x,$met_imgs_y,$met_productimg_x,$met_productimg_y;
	switch ($module) {
		case 2:
			$modular_img_size[x]=$met_newsimg_x;
			$modular_img_size[y]=$met_newsimg_y;
			break;
		case 5:
			$modular_img_size[x]=$met_imgs_x;
			$modular_img_size[y]=$met_imgs_y;
			break;
		default:
			$modular_img_size[x]=$met_productimg_x;
			$modular_img_size[y]=$met_productimg_y;
			break;
	}
	return $modular_img_size;
}
?>