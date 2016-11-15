<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>枣庄市公安局民生警务中心</title>
<meta name="keywords" content="枣庄市公安局民生警务中心" />
<meta name="description" content="枣庄市公安局民生警务中心" />
<script type="text/javascript" src="/ZZMSCMS/Public/Home/default/js/jquery-1.7.2.min.js" ></script>
	<script type="text/javascript" src="/ZZMSCMS/Public/Home/default/js/jquery.KinSlideshow-1.2.1.min.js" ></script>
<link rel="stylesheet" href="/ZZMSCMS/Public/Home/default/js/FlexSlider/flexslider.css" type="text/css" />
<link href="/ZZMSCMS/Public/Home/default/css/css.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="/ZZMSCMS/Public/Home/default/js/FlexSlider/jquery.flexslider-min.js"></script>
<script language="javascript" type="text/javascript">
// Can also be used with $(document).ready()

$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
	itemMargin: 0//,
	//controlNav: false
  });

});
	$(function(){
		$("#KinSlideshow").KinSlideshow({
			btn_bgHoverColor:"#3266ff"
		});
	})
</script>
<?php
 $_flag = 0; switch ($_flag) { case 0: if (C('CFG_MOBILE_AUTO') == 1) { if (C('HTML_CACHE_ON') == true) { echo '<script type="text/javascript" src="/ZZMSCMS/Data/static/js/mobile_auto.js"></script>'; } else { go_mobile(); } } break; case 1: go_mobile(); break; case 2: if (C('CFG_MOBILE_AUTO') == 1) { echo '<script type="text/javascript" src="/ZZMSCMS/Data/static/js/mobile_auto.js"></script>'; } break; default: break; } ?>
</head>
<body>
	
<!--top -->
<div id="top">
<!--[if IE 6]>
<script src="/ZZMSCMS/Public/Home/default/js/DD_belatedPNG_0.0.8a-min.js" language="javascript" type="text/javascript"></script>
<script>
  DD_belatedPNG.fix('#top_logo');   /* string argument can be any CSS selector */
</script>
<![endif]-->
<script type="text/javascript">
$(function(){
	var $chkurl = "<?php echo U('Public/loginChk');?>";
	$.get($chkurl,function(data){
		//alert(data);
		if (data.status == 1) {
			$('#top_login_ok').show();
			$('#top_login_no').hide();
			//$('#top_login_ok').find('span');
			$('#top_login_ok>span').html('欢迎您，'+data.nickname);
		}else {			
			$('#top_login_ok').hide();
			$('#top_login_no').show();
		}
	},'json');	
});
</script>
<div class="warp" id="herd">
	<div id="top_fla">
	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="998" height="159">
	  <param name="movie" value="/ZZMSCMS/Public/Home/default/images/top.swf" />
	  <param name="quality" value="high" />
	  <PARAM NAME=wmode value="transparent">
	  <embed src="/ZZMSCMS/Public/Home/default/images/top.swf" quality="high" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="998" height="159"></embed>
	</object>
	</div>
	<!--<div id="top_member">-->
		<!--&lt;!&ndash;<a href="<?php echo U(MODULE_NAME.'/Product/basket');?>">购物车</a>&ndash;&gt;-->
		<!--<div id="top_login_no">-->
		<!--<a href="<?php echo U(MODULE_NAME.'/Public/register');?>">会员注册</a>-->
		<!--<a href="<?php echo U(MODULE_NAME.'/Public/login');?>">会员登录</a>-->
		<!--<span>欢迎您，游客！您可以选择</span>-->
		<!--</div>-->
		<!--<div id="top_login_ok" style="display:none;">-->
		<!--<a href="<?php echo U(MODULE_NAME.'/Member/index');?>">会员中心</a>-->
		<!--<a href="<?php echo U(MODULE_NAME.'/Public/logout');?>">安全退出</a>-->
		<!--<span>欢迎您， </span>-->
		<!--</div>-->

	<!--</div>-->
	<!--<div id="top_logo"><a href="http://localhost/ZZMSCMS/"></a></div>-->
</div>
<!--menu -->
<div id="menu">
	<ul>
		<li><a href="http://localhost/ZZMSCMS/">首 页</a></li>
		<?php
 $_typeid = 0; if($_typeid == -1) $_typeid = I('cid', 0, 'intval'); $_navlist = get_category(1); if($_typeid == 0) { $_navlist = Common\Lib\Category::toLayer($_navlist); }else { $_navlist = Common\Lib\Category::toLayer($_navlist, 'child', $_typeid); } foreach($_navlist as $autoindex => $navlist): $navlist['url'] = get_url($navlist); ?><li><a href='<?php echo ($navlist["url"]); ?>'><?php echo ($navlist["name"]); ?></a></li><?php endforeach;?>
	</ul>
</div>
	<div class="warp1 mt">
		<!--<div id="ggao"><b>最新公告：</b><span><marquee><?php
 $where = array('endtime' => array('gt',time())); if (0 > 0) { $count = M('announce')->where($where)->count(); $thisPage = new \Common\Lib\Page($count, 0); $thisPage->rollPage = 5; $thisPage->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"); $limit = $thisPage->firstRow. ',' .$thisPage->listRows; $page = $thisPage->show(); }else { $limit = "1"; } $_announcelist = M('announce')->where($where)->order("starttime DESC")->limit($limit)->select(); if (empty($_announcelist)) { $_announcelist = array(); } foreach($_announcelist as $autoindex => $announcelist): if(0) $announcelist['title'] = str2sub($announcelist['title'], 0, 0); if(100) $announcelist['content'] = str2sub(strip_tags($announcelist['content']), 100, 0); echo ($announcelist["content"]); endforeach;?></marquee></span></div>-->
		<!--幻燈片-->
		<div style="width:48%;" class="rbox f_l">
			<div id="KinSlideshow"  style="visibility:hidden;">
				<?php
 $_typeid = 0; $_keyword = ""; if($_typeid == -1) $_typeid = I('cid', 0, 'intval'); if ($_typeid>0 || substr($_typeid,0,1) == '$') { $_selfcate = Common\Lib\Category::getSelf(get_category(), $_typeid); $_tablename = strtolower($_selfcate['tablename']); $ids = Common\Lib\Category::getChildsId(get_category(), $_typeid, true); $where = array($_tablename.'.status' => 0, $_tablename .'.cid'=> array('IN',$ids)); }else { $_tablename = 'article'; $where = array($_tablename.'.status' => 0); } if ($_keyword != '') { $where[$_tablename.'.title'] = array('like','%'.$_keyword.'%'); } if (16 > 0) { $where['_string'] = $_tablename.'.flag & 16 = 16 '; } if (!empty($_tablename) && $_tablename != 'page') { if (0 > 0) { $count = D2('ArcView',"$_tablename")->where($where)->count(); $ename = I('e', '', 'htmlspecialchars,trim'); if (!empty($ename) && C('URL_ROUTER_ON') == true) { $param['p'] = I('p', 1, 'intval'); $param_action = '/'.$ename; }else { $param = array(); $param_action = ''; } $thisPage = new \Common\Lib\Page($count, 0, $param, $param_action); $thisPage->rollPage = 5; $thisPage->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"); $limit = $thisPage->firstRow. ',' .$thisPage->listRows; $page = $thisPage->show(); }else { $limit = "5"; } $_list = D2('ArcView',"$_tablename")->nofield('content,pictureurls')->where($where)->order("publishtime DESC")->limit($limit)->select(); if (empty($_list)) { $_list = array(); } }else { $_list = array(); } foreach($_list as $autoindex => $list): $_jumpflag = ($list['flag'] & B_JUMP) == B_JUMP? true : false; $list['url'] = get_content_url($list['id'], $list['cid'], $list['ename'], $_jumpflag, $list['jumpurl']); if(0) $list['title'] = str2sub($list['title'], 0, 0); if(0) $list['description'] = str2sub($list['description'], 0, 0); if(isset($list['pictureurls'])) $list['pictureurls'] = get_picture_array($list['pictureurls']); ?><a href="<?php echo ($list["url"]); ?>" target="_blank"><img src="<?php echo (str_replace('300X300','600X',$list["litpic"])); ?>" alt="<?php echo ($list["title"]); ?>" width="460" height="262"/></a><?php endforeach;?>
		</div>
		</div>

		<!--欄目1-->
		<?php
 $type = Common\Lib\Category::getSelf(get_category(0), 13); $type['url'] = get_url($type); ?><div style="width:52%;" class="rbox f_r">
			<div style="width:55%;" class="rbox f_l  ">
				<h3 class="r_bt"><a href="<?php echo ($type["url"]); ?>">更多&gt;</a><span><?php echo ($type["name"]); ?></span></h3>
				<div class="xbox">
					<ul class="sywz">
					<?php
 $_typeid = 13; $_keyword = ""; if($_typeid == -1) $_typeid = I('cid', 0, 'intval'); if ($_typeid>0 || substr($_typeid,0,1) == '$') { $_selfcate = Common\Lib\Category::getSelf(get_category(), $_typeid); $_tablename = strtolower($_selfcate['tablename']); $ids = Common\Lib\Category::getChildsId(get_category(), $_typeid, true); $where = array($_tablename.'.status' => 0, $_tablename .'.cid'=> array('IN',$ids)); }else { $_tablename = 'article'; $where = array($_tablename.'.status' => 0); } if ($_keyword != '') { $where[$_tablename.'.title'] = array('like','%'.$_keyword.'%'); } if (0 > 0) { $where['_string'] = $_tablename.'.flag & 0 = 0 '; } if (!empty($_tablename) && $_tablename != 'page') { if (0 > 0) { $count = D2('ArcView',"$_tablename")->where($where)->count(); $ename = I('e', '', 'htmlspecialchars,trim'); if (!empty($ename) && C('URL_ROUTER_ON') == true) { $param['p'] = I('p', 1, 'intval'); $param_action = '/'.$ename; }else { $param = array(); $param_action = ''; } $thisPage = new \Common\Lib\Page($count, 0, $param, $param_action); $thisPage->rollPage = 5; $thisPage->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"); $limit = $thisPage->firstRow. ',' .$thisPage->listRows; $page = $thisPage->show(); }else { $limit = "4"; } $_list = D2('ArcView',"$_tablename")->nofield('content,pictureurls')->where($where)->order("publishtime DESC")->limit($limit)->select(); if (empty($_list)) { $_list = array(); } }else { $_list = array(); } foreach($_list as $autoindex => $list): $_jumpflag = ($list['flag'] & B_JUMP) == B_JUMP? true : false; $list['url'] = get_content_url($list['id'], $list['cid'], $list['ename'], $_jumpflag, $list['jumpurl']); if(0) $list['title'] = str2sub($list['title'], 0, 0); if(0) $list['description'] = str2sub($list['description'], 0, 0); if(isset($list['pictureurls'])) $list['pictureurls'] = get_picture_array($list['pictureurls']); ?><li><span><?php echo (date('Y-m-d',$list["publishtime"])); ?></span><a href="<?php echo ($list["url"]); ?>" ><?php echo ($list["title"]); ?></a></li><?php endforeach;?>
						<div style="border:1px dashed gray;"></div>
						<?php
 $_typeid = 13; $_keyword = ""; if($_typeid == -1) $_typeid = I('cid', 0, 'intval'); if ($_typeid>0 || substr($_typeid,0,1) == '$') { $_selfcate = Common\Lib\Category::getSelf(get_category(), $_typeid); $_tablename = strtolower($_selfcate['tablename']); $ids = Common\Lib\Category::getChildsId(get_category(), $_typeid, true); $where = array($_tablename.'.status' => 0, $_tablename .'.cid'=> array('IN',$ids)); }else { $_tablename = 'article'; $where = array($_tablename.'.status' => 0); } if ($_keyword != '') { $where[$_tablename.'.title'] = array('like','%'.$_keyword.'%'); } if (0 > 0) { $where['_string'] = $_tablename.'.flag & 0 = 0 '; } if (!empty($_tablename) && $_tablename != 'page') { if (0 > 0) { $count = D2('ArcView',"$_tablename")->where($where)->count(); $ename = I('e', '', 'htmlspecialchars,trim'); if (!empty($ename) && C('URL_ROUTER_ON') == true) { $param['p'] = I('p', 1, 'intval'); $param_action = '/'.$ename; }else { $param = array(); $param_action = ''; } $thisPage = new \Common\Lib\Page($count, 0, $param, $param_action); $thisPage->rollPage = 5; $thisPage->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"); $limit = $thisPage->firstRow. ',' .$thisPage->listRows; $page = $thisPage->show(); }else { $limit = "4"; } $_list = D2('ArcView',"$_tablename")->nofield('content,pictureurls')->where($where)->order("publishtime DESC")->limit($limit)->select(); if (empty($_list)) { $_list = array(); } }else { $_list = array(); } foreach($_list as $autoindex => $list): $_jumpflag = ($list['flag'] & B_JUMP) == B_JUMP? true : false; $list['url'] = get_content_url($list['id'], $list['cid'], $list['ename'], $_jumpflag, $list['jumpurl']); if(0) $list['title'] = str2sub($list['title'], 0, 0); if(0) $list['description'] = str2sub($list['description'], 0, 0); if(isset($list['pictureurls'])) $list['pictureurls'] = get_picture_array($list['pictureurls']); ?><li><span><?php echo (date('Y-m-d',$list["publishtime"])); ?></span><a href="<?php echo ($list["url"]); ?>" ><?php echo ($list["title"]); ?></a></li><?php endforeach;?>
				</ul>
				</div>
			</div>


	<!--欄目2-->
		<?php
 $type = Common\Lib\Category::getSelf(get_category(0), 14); $type['url'] = get_url($type); ?><div style="width:44%;" class="rbox f_r">
				<h3 class="r_bt"><a href="<?php echo ($type["url"]); ?>">更多&gt;</a><span><?php echo ($type["name"]); ?></span></h3>
				<div class="xbox">
					<ul class="sywz">
						<?php
 $_typeid = 14; $_keyword = ""; if($_typeid == -1) $_typeid = I('cid', 0, 'intval'); if ($_typeid>0 || substr($_typeid,0,1) == '$') { $_selfcate = Common\Lib\Category::getSelf(get_category(), $_typeid); $_tablename = strtolower($_selfcate['tablename']); $ids = Common\Lib\Category::getChildsId(get_category(), $_typeid, true); $where = array($_tablename.'.status' => 0, $_tablename .'.cid'=> array('IN',$ids)); }else { $_tablename = 'article'; $where = array($_tablename.'.status' => 0); } if ($_keyword != '') { $where[$_tablename.'.title'] = array('like','%'.$_keyword.'%'); } if (0 > 0) { $where['_string'] = $_tablename.'.flag & 0 = 0 '; } if (!empty($_tablename) && $_tablename != 'page') { if (0 > 0) { $count = D2('ArcView',"$_tablename")->where($where)->count(); $ename = I('e', '', 'htmlspecialchars,trim'); if (!empty($ename) && C('URL_ROUTER_ON') == true) { $param['p'] = I('p', 1, 'intval'); $param_action = '/'.$ename; }else { $param = array(); $param_action = ''; } $thisPage = new \Common\Lib\Page($count, 0, $param, $param_action); $thisPage->rollPage = 5; $thisPage->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"); $limit = $thisPage->firstRow. ',' .$thisPage->listRows; $page = $thisPage->show(); }else { $limit = "8"; } $_list = D2('ArcView',"$_tablename")->nofield('content,pictureurls')->where($where)->order("publishtime DESC")->limit($limit)->select(); if (empty($_list)) { $_list = array(); } }else { $_list = array(); } foreach($_list as $autoindex => $list): $_jumpflag = ($list['flag'] & B_JUMP) == B_JUMP? true : false; $list['url'] = get_content_url($list['id'], $list['cid'], $list['ename'], $_jumpflag, $list['jumpurl']); if(0) $list['title'] = str2sub($list['title'], 0, 0); if(0) $list['description'] = str2sub($list['description'], 0, 0); if(isset($list['pictureurls'])) $list['pictureurls'] = get_picture_array($list['pictureurls']); ?><li><span><?php echo (date('Y-m-d',$list["publishtime"])); ?></span><a href="<?php echo ($list["url"]); ?>" ><?php echo ($list["title"]); ?></a></li><?php endforeach;?>
					</ul>
				</div>
			</div>
		</div>
	</div>

<div class="warp1 mt">
<div class="right f_l" style="width: 100%;">
	<!--欄目3-->
	<?php
 $type = Common\Lib\Category::getSelf(get_category(0), 15); $type['url'] = get_url($type); ?><div style="width:486px;" class="rbox f_l">
<h3 class="r_bt"><a href="<?php echo ($type["url"]); ?>">更多></a><span><?php echo ($type["name"]); ?></span></h3>
<div class="xbox" style="height:185px; overflow:hidden;">
	<ul class="sywz">
		<?php
 $_typeid = 15; $_keyword = ""; if($_typeid == -1) $_typeid = I('cid', 0, 'intval'); if ($_typeid>0 || substr($_typeid,0,1) == '$') { $_selfcate = Common\Lib\Category::getSelf(get_category(), $_typeid); $_tablename = strtolower($_selfcate['tablename']); $ids = Common\Lib\Category::getChildsId(get_category(), $_typeid, true); $where = array($_tablename.'.status' => 0, $_tablename .'.cid'=> array('IN',$ids)); }else { $_tablename = 'article'; $where = array($_tablename.'.status' => 0); } if ($_keyword != '') { $where[$_tablename.'.title'] = array('like','%'.$_keyword.'%'); } if (0 > 0) { $where['_string'] = $_tablename.'.flag & 0 = 0 '; } if (!empty($_tablename) && $_tablename != 'page') { if (0 > 0) { $count = D2('ArcView',"$_tablename")->where($where)->count(); $ename = I('e', '', 'htmlspecialchars,trim'); if (!empty($ename) && C('URL_ROUTER_ON') == true) { $param['p'] = I('p', 1, 'intval'); $param_action = '/'.$ename; }else { $param = array(); $param_action = ''; } $thisPage = new \Common\Lib\Page($count, 0, $param, $param_action); $thisPage->rollPage = 5; $thisPage->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"); $limit = $thisPage->firstRow. ',' .$thisPage->listRows; $page = $thisPage->show(); }else { $limit = "10"; } $_list = D2('ArcView',"$_tablename")->nofield('content,pictureurls')->where($where)->order("publishtime DESC")->limit($limit)->select(); if (empty($_list)) { $_list = array(); } }else { $_list = array(); } foreach($_list as $autoindex => $list): $_jumpflag = ($list['flag'] & B_JUMP) == B_JUMP? true : false; $list['url'] = get_content_url($list['id'], $list['cid'], $list['ename'], $_jumpflag, $list['jumpurl']); if(0) $list['title'] = str2sub($list['title'], 0, 0); if(0) $list['description'] = str2sub($list['description'], 0, 0); if(isset($list['pictureurls'])) $list['pictureurls'] = get_picture_array($list['pictureurls']); ?><li><span><?php echo (date('Y-m-d',$list["publishtime"])); ?></span><a href="<?php echo ($list["url"]); ?>" ><?php echo ($list["title"]); ?></a></li><?php endforeach;?>
	</ul>
</div>
</div>

	<!--欄目4-->
	<?php
 $type = Common\Lib\Category::getSelf(get_category(0), 16); $type['url'] = get_url($type); ?><div style="width:486px;" class="rbox f_r">
			<h3 class="r_bt"><a href="<?php echo ($type["url"]); ?>">更多></a><span><?php echo ($type["name"]); ?></span></h3>
			<div class="xbox" style="height:185px; overflow:hidden;">
				<ul class="sywz">
					<?php
 $_typeid = 16; $_keyword = ""; if($_typeid == -1) $_typeid = I('cid', 0, 'intval'); if ($_typeid>0 || substr($_typeid,0,1) == '$') { $_selfcate = Common\Lib\Category::getSelf(get_category(), $_typeid); $_tablename = strtolower($_selfcate['tablename']); $ids = Common\Lib\Category::getChildsId(get_category(), $_typeid, true); $where = array($_tablename.'.status' => 0, $_tablename .'.cid'=> array('IN',$ids)); }else { $_tablename = 'article'; $where = array($_tablename.'.status' => 0); } if ($_keyword != '') { $where[$_tablename.'.title'] = array('like','%'.$_keyword.'%'); } if (0 > 0) { $where['_string'] = $_tablename.'.flag & 0 = 0 '; } if (!empty($_tablename) && $_tablename != 'page') { if (0 > 0) { $count = D2('ArcView',"$_tablename")->where($where)->count(); $ename = I('e', '', 'htmlspecialchars,trim'); if (!empty($ename) && C('URL_ROUTER_ON') == true) { $param['p'] = I('p', 1, 'intval'); $param_action = '/'.$ename; }else { $param = array(); $param_action = ''; } $thisPage = new \Common\Lib\Page($count, 0, $param, $param_action); $thisPage->rollPage = 5; $thisPage->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"); $limit = $thisPage->firstRow. ',' .$thisPage->listRows; $page = $thisPage->show(); }else { $limit = "10"; } $_list = D2('ArcView',"$_tablename")->nofield('content,pictureurls')->where($where)->order("publishtime DESC")->limit($limit)->select(); if (empty($_list)) { $_list = array(); } }else { $_list = array(); } foreach($_list as $autoindex => $list): $_jumpflag = ($list['flag'] & B_JUMP) == B_JUMP? true : false; $list['url'] = get_content_url($list['id'], $list['cid'], $list['ename'], $_jumpflag, $list['jumpurl']); if(0) $list['title'] = str2sub($list['title'], 0, 0); if(0) $list['description'] = str2sub($list['description'], 0, 0); if(isset($list['pictureurls'])) $list['pictureurls'] = get_picture_array($list['pictureurls']); ?><li><span><?php echo (date('Y-m-d',$list["publishtime"])); ?></span><a href="<?php echo ($list["url"]); ?>" ><?php echo ($list["title"]); ?></a></li><?php endforeach;?>
				</ul>
			</div>
		</div>

<!--欄目5-->
	<?php
 $type = Common\Lib\Category::getSelf(get_category(0), 17); $type['url'] = get_url($type); ?><div style="width:486px;" class="rbox f_l mt">
			<h3 class="r_bt"><a href="<?php echo ($type["url"]); ?>">更多></a><span><?php echo ($type["name"]); ?></span></h3>
			<div class="xbox" style="height:185px; overflow:hidden;">
				<ul class="sywz">
					<?php
 $_typeid = 17; $_keyword = ""; if($_typeid == -1) $_typeid = I('cid', 0, 'intval'); if ($_typeid>0 || substr($_typeid,0,1) == '$') { $_selfcate = Common\Lib\Category::getSelf(get_category(), $_typeid); $_tablename = strtolower($_selfcate['tablename']); $ids = Common\Lib\Category::getChildsId(get_category(), $_typeid, true); $where = array($_tablename.'.status' => 0, $_tablename .'.cid'=> array('IN',$ids)); }else { $_tablename = 'article'; $where = array($_tablename.'.status' => 0); } if ($_keyword != '') { $where[$_tablename.'.title'] = array('like','%'.$_keyword.'%'); } if (0 > 0) { $where['_string'] = $_tablename.'.flag & 0 = 0 '; } if (!empty($_tablename) && $_tablename != 'page') { if (0 > 0) { $count = D2('ArcView',"$_tablename")->where($where)->count(); $ename = I('e', '', 'htmlspecialchars,trim'); if (!empty($ename) && C('URL_ROUTER_ON') == true) { $param['p'] = I('p', 1, 'intval'); $param_action = '/'.$ename; }else { $param = array(); $param_action = ''; } $thisPage = new \Common\Lib\Page($count, 0, $param, $param_action); $thisPage->rollPage = 5; $thisPage->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"); $limit = $thisPage->firstRow. ',' .$thisPage->listRows; $page = $thisPage->show(); }else { $limit = "10"; } $_list = D2('ArcView',"$_tablename")->nofield('content,pictureurls')->where($where)->order("publishtime DESC")->limit($limit)->select(); if (empty($_list)) { $_list = array(); } }else { $_list = array(); } foreach($_list as $autoindex => $list): $_jumpflag = ($list['flag'] & B_JUMP) == B_JUMP? true : false; $list['url'] = get_content_url($list['id'], $list['cid'], $list['ename'], $_jumpflag, $list['jumpurl']); if(0) $list['title'] = str2sub($list['title'], 0, 0); if(0) $list['description'] = str2sub($list['description'], 0, 0); if(isset($list['pictureurls'])) $list['pictureurls'] = get_picture_array($list['pictureurls']); ?><li><span><?php echo (date('Y-m-d',$list["publishtime"])); ?></span><a href="<?php echo ($list["url"]); ?>" ><?php echo ($list["title"]); ?></a></li><?php endforeach;?>
				</ul>
			</div>
		</div>

	<!--欄目6-->

	<?php
 $type = Common\Lib\Category::getSelf(get_category(0), 18); $type['url'] = get_url($type); ?><div style="width:486px;" class="rbox f_r mt">
			<h3 class="r_bt"><a href="<?php echo ($type["url"]); ?>">更多></a><span><?php echo ($type["name"]); ?></span></h3>
			<div class="xbox" style="height:185px; overflow:hidden;">
				<ul class="sywz">
					<?php
 $_typeid = 18; $_keyword = ""; if($_typeid == -1) $_typeid = I('cid', 0, 'intval'); if ($_typeid>0 || substr($_typeid,0,1) == '$') { $_selfcate = Common\Lib\Category::getSelf(get_category(), $_typeid); $_tablename = strtolower($_selfcate['tablename']); $ids = Common\Lib\Category::getChildsId(get_category(), $_typeid, true); $where = array($_tablename.'.status' => 0, $_tablename .'.cid'=> array('IN',$ids)); }else { $_tablename = 'article'; $where = array($_tablename.'.status' => 0); } if ($_keyword != '') { $where[$_tablename.'.title'] = array('like','%'.$_keyword.'%'); } if (0 > 0) { $where['_string'] = $_tablename.'.flag & 0 = 0 '; } if (!empty($_tablename) && $_tablename != 'page') { if (0 > 0) { $count = D2('ArcView',"$_tablename")->where($where)->count(); $ename = I('e', '', 'htmlspecialchars,trim'); if (!empty($ename) && C('URL_ROUTER_ON') == true) { $param['p'] = I('p', 1, 'intval'); $param_action = '/'.$ename; }else { $param = array(); $param_action = ''; } $thisPage = new \Common\Lib\Page($count, 0, $param, $param_action); $thisPage->rollPage = 5; $thisPage->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"); $limit = $thisPage->firstRow. ',' .$thisPage->listRows; $page = $thisPage->show(); }else { $limit = "10"; } $_list = D2('ArcView',"$_tablename")->nofield('content,pictureurls')->where($where)->order("publishtime DESC")->limit($limit)->select(); if (empty($_list)) { $_list = array(); } }else { $_list = array(); } foreach($_list as $autoindex => $list): $_jumpflag = ($list['flag'] & B_JUMP) == B_JUMP? true : false; $list['url'] = get_content_url($list['id'], $list['cid'], $list['ename'], $_jumpflag, $list['jumpurl']); if(0) $list['title'] = str2sub($list['title'], 0, 0); if(0) $list['description'] = str2sub($list['description'], 0, 0); if(isset($list['pictureurls'])) $list['pictureurls'] = get_picture_array($list['pictureurls']); ?><li><span><?php echo (date('Y-m-d',$list["publishtime"])); ?></span><a href="<?php echo ($list["url"]); ?>" ><?php echo ($list["title"]); ?></a></li><?php endforeach;?>
				</ul>
			</div>
		</div>

<div class=" clear"></div>
</div>
<div class=" clear"></div>
</div>

<div class="warp1 mt" style="display:none;">
<h3 class="r_bt"><span>产品展示</span></h3>
<div class="xbox" style="height:142px; overflow:hidden;">
<div id="demc">
    <div class="jdimg" id="my2Box">
      <ul id="my2Contnet">
		<?php
 $_typeid = -1; $_keyword = ""; $_arcid = ""; if($_typeid == -1) $_typeid = I('get.cid', 0, 'intval'); if ($_typeid>0 || substr($_typeid,0,1) == '$') { $ids = Common\Lib\Category::getChildsId(get_category(), $_typeid, true); $where = array('product.status' => 0, 'product.cid'=> array('IN',$ids)); }else { $where = array('product.status' => 0); } if ($_keyword != '') { $where['product.title'] = array('like','%'.$_keyword.'%'); } if (!empty($_arcid)) { $where['product.id'] = array('IN', $_arcid); } if (0 > 0) { $where['_string'] = 'product.flag & 0 = 0 '; } if (0 > 0) { $count = D2('ArcView','product')->where($where)->count(); $ename = I('e', '', 'htmlspecialchars,trim'); if (!empty($ename) && C('URL_ROUTER_ON') == true) { $param['p'] = I('p', 1, 'intval'); $param_action = '/'.$ename; }else { $param = array(); $param_action = ''; } $thisPage = new \Common\Lib\Page($count, 0, $param, $param_action); $thisPage->rollPage = 5; $thisPage->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"); $limit = $thisPage->firstRow. ',' .$thisPage->listRows; $page = $thisPage->show(); }else { $limit = "10"; } $_prolist = D2('ArcView','product')->nofield('content,pictureurls')->where($where)->order("id DESC")->limit($limit)->select(); if (empty($_prolist)) { $_prolist = array(); } foreach($_prolist as $autoindex => $prolist): $_jumpflag = ($prolist['flag'] & B_JUMP) == B_JUMP? true : false; $prolist['url'] = get_content_url($prolist['id'], $prolist['cid'], $prolist['ename'], $_jumpflag, $prolist['jumpurl']); if(0) $prolist['title'] = str2sub($prolist['title'], 0, 0); if(0) $prolist['description'] = str2sub($prolist['description'], 0, 0); if(isset($prolist['pictureurls'])) $prolist['pictureurls'] = get_picture_array($prolist['pictureurls']); ?><li><a href="<?php echo ($prolist["url"]); ?>"><img src="<?php echo ($prolist["litpic"]); ?>" alt="<?php echo ($prolist["title"]); ?>"/><span><?php echo ($prolist["title"]); ?></span></a></li><?php endforeach;?>
      </ul>
      <div class="clear"></div>

    </div>
  </div>
</div>
</div>

<div class="warp1 mt">
<h3 class="r_bt"><span>友情链接</span></h3>
<div class="xbox" id="yqlj">
<?php
 $_typeid = 0; if ($_typeid>0 || substr($_typeid,0,1) == '$') { $where = array('ischeck'=> $_typeid); }else { $where = array('id' => array('gt',0)); } if (0 > 0) { $count = M('link')->where($where)->count(); $thisPage = new \Common\Lib\Page($count, 0); $thisPage->rollPage = 5; $thisPage->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"); $limit = $thisPage->firstRow. ',' .$thisPage->listRows; $page = $thisPage->show(); }else { $limit = "20"; } $_flink = M('link')->where($where)->order("sort ASC")->limit($limit)->select(); if (empty($_flink)) { $_flink = array(); } foreach($_flink as $autoindex => $flink): ?><a href="<?php echo ($flink["url"]); ?>" target="_blank"><?php echo ($flink["name"]); ?></a><?php endforeach;?>
<div class="clear"></div>
</div>
</div>
<script language="javascript" src="/ZZMSCMS/Public/Home/default/js/MSClass.js"></script>
<script type="text/javascript">
new Marquee(["my2Box","my2Contnet"],2,1,966,140,30,0,0);
</script>


<div class="warp1 mt" id="bottom">
	<a href="http://localhost/ZZMSCMS/">枣庄市公安局民生警务中心</a>版权所有
	<br />
	联系地址：光明大道1277号  电话：9600110<br />
	<!--Copyright © 2014-2014 XYHCMS. 行云海软件 版权所有 <a href="http://www.0871k.com" target="_blank">Power by XYHCMS</a>-->
</div>

</body>
</html>