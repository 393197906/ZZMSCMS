<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo ($title); ?>-我的网站</title>
<meta name="keywords" content="<?php echo ($keywords); ?>" />
<meta name="description" content="<?php echo ($description); ?>" />
<script type="text/javascript" src="/uploads_code/Public/Home/default/js/jquery-1.7.2.min.js" ></script>
<link href="/uploads_code/Public/Home/default/css/css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<!--top -->
<div id="top">
<!--[if IE 6]>
<script src="/uploads_code/Public/Home/default/js/DD_belatedPNG_0.0.8a-min.js" language="javascript" type="text/javascript"></script>
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
	  <param name="movie" value="/uploads_code/Public/Home/default/images/top.swf" />
	  <param name="quality" value="high" />
	  <PARAM NAME=wmode value="transparent">
	  <embed src="/uploads_code/Public/Home/default/images/top.swf" quality="high" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="998" height="159"></embed>
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
	<!--<div id="top_logo"><a href="http://localhost/uploads_code"></a></div>-->
</div>
<!--menu -->
<div id="menu">
	<ul>
		<li><a href="http://localhost/uploads_code">首 页</a></li>
		<?php
 $_typeid = 0; if($_typeid == -1) $_typeid = I('cid', 0, 'intval'); $_navlist = get_category(1); if($_typeid == 0) { $_navlist = Common\Lib\Category::toLayer($_navlist); }else { $_navlist = Common\Lib\Category::toLayer($_navlist, 'child', $_typeid); } foreach($_navlist as $autoindex => $navlist): $navlist['url'] = get_url($navlist); ?><li><a href='<?php echo ($navlist["url"]); ?>'><?php echo ($navlist["name"]); ?></a></li><?php endforeach;?>
	</ul>
</div>

<div class="warp1 mt">
<div id="ggao"><b>最新公告：</b><span><marquee><?php
 $where = array('endtime' => array('gt',time())); if (0 > 0) { $count = M('announce')->where($where)->count(); $thisPage = new \Common\Lib\Page($count, 0); $thisPage->rollPage = 5; $thisPage->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"); $limit = $thisPage->firstRow. ',' .$thisPage->listRows; $page = $thisPage->show(); }else { $limit = "1"; } $_announcelist = M('announce')->where($where)->order("starttime DESC")->limit($limit)->select(); if (empty($_announcelist)) { $_announcelist = array(); } foreach($_announcelist as $autoindex => $announcelist): if(0) $announcelist['title'] = str2sub($announcelist['title'], 0, 0); if(100) $announcelist['content'] = str2sub(strip_tags($announcelist['content']), 100, 0); echo ($announcelist["content"]); endforeach;?></marquee></span></div>
</div>
<div class="clear"></div>

</div>

<div class="content">
	<div class="warp1 mt">

<div class="left f_l">

	<?php if($flag_son): ?><h3 class="flbt">栏目列表</h3>
	<div class="xbox">
	<ul class="fllb">
		<?php
 $_typeid = intval($cid); $_type = "son"; $_temp = explode(',', "10"); $_temp[0] = $_temp[0] > 0? $_temp[0] : 10; if (isset($_temp[1]) && intval($_temp[1]) > 0) { $_limit[0] = $_temp[0]; $_limit[1] = intval($_temp[1]); }else { $_limit[0] = 0; $_limit[1] = $_temp[0]; } if($_typeid == -1) $_typeid = I('cid', 0, 'intval'); $__catlist = get_category(1); if (0) { $__catlist = Common\Lib\Category::getLevelOfModelId($__catlist, 0); } if (1 == 0) { $__catlist = Common\Lib\Category::clearPageAndLink($__catlist); } if($_typeid == 0 || $_type == 'top') { $_catlist = Common\Lib\Category::toLayer($__catlist); }else { if ($_type == 'self') { $_typeinfo = Common\Lib\Category::getSelf($__catlist, $_typeid ); $_catlist = Common\Lib\Category::toLayer($__catlist, 'child', $_typeinfo['pid']); }else { $_catlist = Common\Lib\Category::toLayer($__catlist, 'child', $_typeid); } } foreach($_catlist as $autoindex => $catlist): if($autoindex < $_limit[0]) continue; if($autoindex >= ($_limit[1]+$_limit[0])) break; $catlist['url'] = get_url($catlist); ?><li><a href="<?php echo ($catlist["url"]); ?>"><?php echo ($catlist["name"]); ?></a></li><?php endforeach;?>
	</ul>
	</div>	
	<div class="mt"></div>

	<?php else: ?>
	<?php if($cate['pid'] > 0): ?><h3 class="flbt">栏目列表</h3>
	<div class="xbox">
	<ul class="fllb">
		<?php
 $_typeid = intval($cate['pid']); $_type = "son"; $_temp = explode(',', "10"); $_temp[0] = $_temp[0] > 0? $_temp[0] : 10; if (isset($_temp[1]) && intval($_temp[1]) > 0) { $_limit[0] = $_temp[0]; $_limit[1] = intval($_temp[1]); }else { $_limit[0] = 0; $_limit[1] = $_temp[0]; } if($_typeid == -1) $_typeid = I('cid', 0, 'intval'); $__catlist = get_category(1); if (0) { $__catlist = Common\Lib\Category::getLevelOfModelId($__catlist, 0); } if (1 == 0) { $__catlist = Common\Lib\Category::clearPageAndLink($__catlist); } if($_typeid == 0 || $_type == 'top') { $_catlist = Common\Lib\Category::toLayer($__catlist); }else { if ($_type == 'self') { $_typeinfo = Common\Lib\Category::getSelf($__catlist, $_typeid ); $_catlist = Common\Lib\Category::toLayer($__catlist, 'child', $_typeinfo['pid']); }else { $_catlist = Common\Lib\Category::toLayer($__catlist, 'child', $_typeid); } } foreach($_catlist as $autoindex => $catlist): if($autoindex < $_limit[0]) continue; if($autoindex >= ($_limit[1]+$_limit[0])) break; $catlist['url'] = get_url($catlist); ?><li><a href="<?php echo ($catlist["url"]); ?>"><?php echo ($catlist["name"]); ?></a></li><?php endforeach;?>
	</ul>
	</div>	
	<div class="mt"></div><?php endif; endif; ?>

	<div class="">
	<h3 class="left_bt">联系我们</h3>
	<div class="xbox left_contactbox">
	  <p>联系地址：昆明北京路<br />
	  电话：0871-66666</p>
	</div>
	</div>

	<div class="mt">
	<h3 class="left_bt"><?php
 $type = Common\Lib\Category::getSelf(get_category(0), 3); $type['url'] = get_url($type); ?><a href="<?php echo ($type["url"]); ?>">更多></a><?php echo ($type["name"]); ?></h3>
	<div class="xbox left_box" id="abt">
	<ul class="sywz">
	
	<?php
 $_typeid = 3; $_keyword = ""; if($_typeid == -1) $_typeid = I('cid', 0, 'intval'); if ($_typeid>0 || substr($_typeid,0,1) == '$') { $_selfcate = Common\Lib\Category::getSelf(get_category(), $_typeid); $_tablename = strtolower($_selfcate['tablename']); $ids = Common\Lib\Category::getChildsId(get_category(), $_typeid, true); $where = array($_tablename.'.status' => 0, $_tablename .'.cid'=> array('IN',$ids)); }else { $_tablename = 'article'; $where = array($_tablename.'.status' => 0); } if ($_keyword != '') { $where[$_tablename.'.title'] = array('like','%'.$_keyword.'%'); } if (0 > 0) { $where['_string'] = $_tablename.'.flag & 0 = 0 '; } if (!empty($_tablename) && $_tablename != 'page') { if (0 > 0) { $count = D2('ArcView',"$_tablename")->where($where)->count(); $ename = I('e', '', 'htmlspecialchars,trim'); if (!empty($ename) && C('URL_ROUTER_ON') == true) { $param['p'] = I('p', 1, 'intval'); $param_action = '/'.$ename; }else { $param = array(); $param_action = ''; } $thisPage = new \Common\Lib\Page($count, 0, $param, $param_action); $thisPage->rollPage = 5; $thisPage->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"); $limit = $thisPage->firstRow. ',' .$thisPage->listRows; $page = $thisPage->show(); }else { $limit = "6"; } $_list = D2('ArcView',"$_tablename")->nofield('content,pictureurls')->where($where)->order("id DESC")->limit($limit)->select(); if (empty($_list)) { $_list = array(); } }else { $_list = array(); } foreach($_list as $autoindex => $list): $_jumpflag = ($list['flag'] & B_JUMP) == B_JUMP? true : false; $list['url'] = get_content_url($list['id'], $list['cid'], $list['ename'], $_jumpflag, $list['jumpurl']); if(16) $list['title'] = str2sub($list['title'], 16, 0); if(0) $list['description'] = str2sub($list['description'], 0, 0); if(isset($list['pictureurls'])) $list['pictureurls'] = get_picture_array($list['pictureurls']); ?><li><a href="<?php echo ($list["url"]); ?>"><?php echo ($list["title"]); ?></a></li><?php endforeach;?>
	</ul>
	</div>
	</div>	
</div>
<div class="right f_r">
	<h3 class="nybt"><i>您当前的位置：<?php
 $_sname = ""; $_typeid = -1; if($_typeid == -1) $_typeid = I('cid', 0, 'intval'); if ($_typeid == 0 && $_sname == '') { $_sname = isset($title) ? $title : ''; } echo get_position($_typeid, $_sname, "", 0, ""); ?> </i><span><?php echo ($cate["name"]); ?></span></h3>
	<div class="xbox wzzw lh">
	<?php echo ($cate["content"]); ?>
	</div>
	</div>
<div class=" clear"></div>
</div>
</div>

<div class="warp1 mt" id="bottom">
	<!--<a href="http://localhost/uploads_code">我的网站</a>版权所有-->
	<!--<br />-->
	<!--联系地址：昆明北京路  电话：0871-66666<br />-->
	<!--Copyright © 2014-2014 XYHCMS. 行云海软件 版权所有 <a href="http://www.0871k.com" target="_blank">Power by XYHCMS</a>-->
</div>


</body>
</html>