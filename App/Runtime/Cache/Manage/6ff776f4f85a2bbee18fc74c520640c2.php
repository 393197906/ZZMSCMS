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
	    var URL = '/uploads_code/xyhai.php?s=/Member';
	    var APP	 = '/uploads_code/xyhai.php?s=';
	    var SELF='/uploads_code/xyhai.php?s=/Member/index';
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
        </div>
        
    </div>

    <div class="row margin-botton">
        <div class="col-sm-6 column">
            <div class="btn-group btn-group-md">           
                <button class="btn btn-primary" type="button" onclick="goUrl('<?php echo U('add');?>')"><em class="glyphicon glyphicon-plus-sign"></em> 添加会员</button>              
                 <button class="btn btn-default" type="button" onclick="doConfirmBatch('<?php echo U('del', array('batchFlag' => 1));?>', '确实要删除选择项吗？')"><em class="glyphicon glyphicon-remove-circle"></em> 删除</button>
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
                                <th><input type="checkbox" id="check"></th>
                                <th>编号</th>
                                <th>邮箱</th>
                                <th>昵称</th>
                                <th>会员组</th>
                                <th>登录时间</th>
                                <th>登录ip</th>
                                <th>状态</th>
                                <th class="text-right">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($vlist)): foreach($vlist as $key=>$v): ?><tr>
                            <td><input type="checkbox" name="key[]" value="<?php echo ($v["id"]); ?>"></td>
                            <td><?php echo ($v["id"]); ?></td>
                            <td><?php echo ($v["email"]); ?></td>
                            <td><?php echo ($v["nickname"]); ?></td>
                            <td><?php echo ($v["groupname"]); ?></td>
                            <td><?php if(empty($vo['logintime'])): ?>--<?php else: echo (date('Y-m-d H:i:s',$v["logintime"])); endif; ?></td>
                            <td><?php echo ($v["loginip"]); ?></td>
                            <td><?php if($v['islock']): ?><span class="label label-default">锁定</span><?php else: ?><span class="label label-success">正常</span><?php endif; ?></td>
                            <td class="text-right">
                            <a href="<?php echo U('person',array('id' => $v['id']), '');?>" class="label label-info">详情</a>
                            <a href="<?php echo U('edit',array('id' => $v['id']), '');?>" class="label label-success">编辑</a>
                            <a href="javascript:;" onclick="toConfirm('<?php echo U('del',array('id' => $v['id']), '');?>', '确实要删除吗？')" class="label label-danger">删除</a>                          
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