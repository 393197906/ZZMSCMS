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
	    var URL = '/uploads_code/admin.php?s=/Announce';
	    var APP	 = '/uploads_code/admin.php?s=';
	    var SELF='/uploads_code/admin.php?s=/Announce/edit/id/1';
	    var PUBLIC='/uploads_code/App/Manage/View/Public';
	    var data_path = "/uploads_code/Data";
		var tpl_public = "/uploads_code/App/Manage/View/Public";
	    //-->
	</script>
	<script type="text/javascript" src="/uploads_code/App/Manage/View/Public/js/common.js"></script> 
	<!-- 头部js文件|自定义 -->
	
<script type="text/javascript" src="/uploads_code/Data/editor/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/uploads_code/Data/editor/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript">
$(function(){
    var ue = UE.getEditor('inputContent',{
        serverUrl :"<?php echo U('Public/editorMethod');?>"
    });
})
</script>

<script type="text/javascript" src="/uploads_code/App/Manage/View/Public/js/calendar.config.js"></script>
<script type="text/javascript" src="/uploads_code/Data/static/jq_plugins/iColorPicker/iColorPicker.js"></script>


</head>
<body>
	<div class="xyh-content">
		
	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header"><em class="glyphicon glyphicon-cloud-upload"></em> 
			修改公告  
		    </h3>
		</div>
		
	</div>


	<div class="row">
		<div class="col-lg-12">

				<form method='post' class="form-horizontal" id="form_do" name="form_do" action="<?php echo U('edit');?>">											

					<div class="form-group">
						<label for="inputTtitle" class="col-sm-2 control-label">公告标题</label>
						<div class="col-sm-9">
							<input type="text" name="title" id="inputTtitle" value="<?php echo ($vo["title"]); ?>" class="form-control" placeholder="公告标题" required="required" />									
						</div>
					</div>
					<div class="form-group">
						<label for="starttime" class="col-sm-2 control-label">起始日期</label>
						<div class="col-sm-9">
							<input type="text" name="starttime" id="starttime" value="<?php echo (date('Y-m-d H:i:s',$vo["starttime"])); ?>" class="form-control" />
			                <script type="text/javascript">
			                    Calendar.setup({
			                        weekNumbers: true,
			                        inputField : "starttime",
			                        trigger    : "starttime",
			                        dateFormat: "%Y-%m-%d %H:%M:%S",
			                        showTime: true,
			                        minuteStep: 1,
			                        onSelect   : function() {this.hide();}
			                    });
			                </script>
						</div>
					</div>

					<div class="form-group">
						<label for="endtime" class="col-sm-2 control-label">截止日期</label>
						<div class="col-sm-5">
							<input type="text" name="endtime" id="endtime" value="<?php echo (date('Y-m-d H:i:s',$vo["endtime"])); ?>" class="form-control" />
			                <script type="text/javascript">
			                    Calendar.setup({
			                        weekNumbers: true,
			                        inputField : "endtime",
			                        trigger    : "endtime",
			                        dateFormat: "%Y-%m-%d %H:%M:%S",
			                        showTime: true,
			                        minuteStep: 1,
			                        onSelect   : function() {this.hide();}
			                    });

			                </script>								
						</div>
					</div>

					<div class="form-group">
						<label for="inputContent" class="col-sm-2 control-label">内容</label>
						<div class="col-sm-9">
							<textarea name="content" id="inputContent" style="height: 370px;"><?php echo ($vo["content"]); ?></textarea>						
						</div>
					</div>					

					
					
					<div class="row margin-botton-large">
						<div class="col-sm-offset-2 col-sm-9">
							<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>" />
							<div class="btn-group">
								<button type="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-saved"></i>
									保存
								</button>
								<button type="button" onclick="goUrl('<?php echo U('index');?>')" class="btn btn-default"> <i class="glyphicon glyphicon-chevron-left"></i>
									返回
								</button>
							</div>
						</div>
					</div>
				</form>
	
		</div>
	</div>

		



			
	</div>	
</body>
</html>