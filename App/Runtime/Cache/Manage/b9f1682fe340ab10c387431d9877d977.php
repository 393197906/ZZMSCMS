<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>后台</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="baidu-site-verification" content="unXl91MyB6" />
	<link rel="stylesheet" type="text/css" href="/uploads_code/Data/static/bootstrap/3.3.5/css/bootstrap.min.css" media="screen">	
	<link rel='stylesheet' type="text/css" href="/uploads_code/App/Manage/View/Public/css/main.css" />
	<!-- 头部css文件|自定义  -->
	

	<script type="text/javascript" src="/uploads_code/Data/static/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="/uploads_code/Data/static/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		<script src="/uploads_code/Data/static/js/html5shiv.min.js"></script>
		<script src="/uploads_code/Data/static/js/respond.min.js"></script>
    <![endif]-->
	
	<script type="text/javascript" src="/uploads_code/App/Manage/View/Public/js/jquery.form.min.js"></script>
	<script type="text/javascript" src="/uploads_code/Data/static/jq_plugins/layer/layer.js"></script>
	<script language="JavaScript">
	    <!--
	    var URL = '/uploads_code/xyhai.php?s=/System';
	    var APP	 = '/uploads_code/xyhai.php?s=';
	    var SELF='/uploads_code/xyhai.php?s=/System/index/groupid/6';
	    var PUBLIC='/uploads_code/App/Manage/View/Public';
	    var data_path = "/uploads_code/Data";
		var tpl_public = "/uploads_code/App/Manage/View/Public";
	    //-->
	</script>
	<script type="text/javascript" src="/uploads_code/App/Manage/View/Public/js/common.js"></script> 
	<!-- 头部js文件|自定义 -->
	
</head>
<body>
	<div class="xyh-content">
		
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><em class="glyphicon glyphicon-cloud-upload"></em> 
            <?php echo ($type); ?>          
            </h3>            

            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <span class="navbar-text">分组：</span>
                        <a href="<?php echo U('index',array('groupid'=> 0));?>" <?php if($groupid == 0): ?>class="btn btn-sm btn-success navbar-btn"<?php else: ?>class="btn btn-sm btn-default navbar-btn"<?php endif; ?>>全部</a>
                        <?php if(is_array($configgroup)): foreach($configgroup as $key=>$v): ?><a href="<?php echo U('index',array('groupid'=> $key));?>" <?php if($key == $groupid): ?>class="btn btn-sm btn-success navbar-btn"<?php else: ?>class="btn btn-sm btn-default navbar-btn"<?php endif; ?>><?php echo ($v); ?></a>&nbsp;<?php endforeach; endif; ?>
                    </div>
                </div>
            </nav>
        </div>
        
    </div>

    <div class="row margin-botton">
        <div class="col-sm-6 column">
            <div class="btn-group btn-group-md">
                <button class="btn btn-primary" type="button" onclick="goUrl('<?php echo U('add');?>')"><em class="glyphicon glyphicon-plus-sign"></em> 添加配置项</button>
                <button class="btn btn-default" type="button" onclick="doGoSubmit('<?php echo U('sort');?>','form_do')"><em class="glyphicon glyphicon-th-list"></em> 更新排序</button>
            </div>
        </div>
        <div class="col-sm-6 text-right">
            <?php if(ACTION_NAME == "index"): ?><form class="form-inline" method="post" action="<?php echo U('index');?>">
                  <div class="form-group">
                    <label class="sr-only" for="inputKeyword">关键字</label>
                    <input type="text" class="form-control" name="keyword" id="inputKeyword" placeholder="关键字" value="<?php echo ($keyword); ?>">
                  </div>
                  <button type="submit" class="btn btn-default">搜索</button>
                </form><?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form action="" method="post" id="form_do" name="form_do">
                <div class="table-responsive">
                    <table class="table table-hover xyh-table-bordered-out">
                        <thead>
                            <tr class="active">
                                <th>编号</th>
                                <th>名称</th>
                                <th>标题</th>
                                <th>分组</th>
                                <th>类型</th>
                                <th>排序</th>
                                <th class="text-right">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($vlist)): foreach($vlist as $key=>$v): ?><tr>
                            <td><?php echo ($v["id"]); ?></td>
                            <td class="aleft"><?php echo ($v["name"]); ?></td>
                            <td ><?php echo ($v["title"]); ?></td>
                            <td><?php echo (get_item_value('configgroup',$v["groupid"])); ?></td>                
                            <td><?php echo (get_item_value('configtype',$v["typeid"])); ?></td>
                            <td><input type="text" name="sortlist[<?php echo ($v["id"]); ?>]" value="<?php echo ($v["sort"]); ?>" id="sortlist" size="5" class="xyh-form-" /></td>
                            <td class="text-right">
                                <a href="<?php echo U('edit',array('id' => $v['id']));?>" class="label label-success">编辑</a>
                                <a href="javascript:;" onclick="toConfirm('<?php echo U('del', array('id' => $v['id']));?>', '确实要删除吗？')" class="label label-danger">删除</a>
                            </td>
                        </tr><?php endforeach; endif; ?>
                        </tbody>
                    </table>
                </div>
            </form>

            <div class="row clearfix">
                <div class="col-md-12 column">
                    <div class="xyh-page">
                        <?php echo ($page); ?>
                    </div>
                </div>
            </div>

            
        </div>
    </div>

    
			
	</div>	
</body>
</html>