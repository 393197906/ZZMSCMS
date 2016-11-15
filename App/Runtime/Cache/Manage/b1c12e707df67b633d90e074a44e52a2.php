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
	    var URL = '/uploads_code/xyhai.php?s=/Link';
	    var APP	 = '/uploads_code/xyhai.php?s=';
	    var SELF='/uploads_code/xyhai.php?s=/Link/edit/id/1';
	    var PUBLIC='/uploads_code/App/Manage/View/Public';
	    var data_path = "/uploads_code/Data";
		var tpl_public = "/uploads_code/App/Manage/View/Public";
	    //-->
	</script>
	<script type="text/javascript" src="/uploads_code/App/Manage/View/Public/js/common.js"></script> 
	<!-- 头部js文件|自定义 -->
	

<script type="text/javascript">
$(function () {
	//缩略图上传
	var litpic_tip = $(".litpic_tip");
	var btn = $(".up-picture-btn span");
	$("#fileupload").wrap("<form id='myupload' action='<?php echo U('Public/upload',array('img_flag' => 1));?>' method='post' enctype='multipart/form-data'></form>");
    $("#fileupload").change(function(){
    	if($("#fileupload").val() == "") return;
		$("#myupload").ajaxSubmit({
			dataType:  'json',
			beforeSend: function() {
        		$('#litpic_show').empty();
				btn.html("上传中...");
    		},
			success: function(data) {
				if(data.state == 'SUCCESS'){
					var fileSize = parseFloat(data.info[0].size/1024).toFixed(2);
					litpic_tip.html(""+ data.info[0].name +" 上传成功("+ fileSize +"k)");
					var img = data.info[0].url;//原图
					//var timg = data.info[0].turl;//缩略图
					$('#litpic_show').html("<img src='"+img+"' width='120'>");
					$("#litpic").val(img);
				}else {
					litpic_tip.html(data.state);		
				}			
					btn.html("添加图片");

			},
			error:function(xhr){
				btn.html("上传失败");
				litpic_tip.html(xhr);
			}
		});
	});
	
});




$(function () {

	$('#BrowerPicture').click(function(){
		layer.open({
			type: 2,
			title: 'XYHCMS',
			shadeClose: true,
			shade: 0.5,
			area: ['670px', '350px'],
			content: "<?php echo U('Public/browseFile', array('stype' => 'picture'));?>"
		});
	});	

});


function selectPicture(sfile) {
	layer.msg('选择文件成功')
	$("#litpic").val(sfile);
	$('#litpic_show').html("<img src='"+sfile+"' width='120'>");
}



</script>
	

</head>
<body>
	<div class="xyh-content">
		
	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header"><em class="glyphicon glyphicon-cloud-upload"></em> 
			修改友情链接  
		    </h3>
		</div>
		
	</div>


	<div class="row">
		<div class="col-lg-12">

				<form method='post' class="form-horizontal" id="form_do" name="form_do" action="<?php echo U('edit');?>">											

					<div class="form-group">
						<label for="inputName" class="col-sm-2 control-label">网站名称</label>
						<div class="col-sm-9">
							<input type="text" name="name" id="inputName" value="<?php echo ($vo["name"]); ?>" class="form-control" placeholder="网站名称" required="required" />									
						</div>
					</div>
					<div class="form-group">
						<label for="inputUrl" class="col-sm-2 control-label">网站地址</label>
						<div class="col-sm-9">
							<input type="text" name="url" id="inputUrl" value="<?php echo ($vo["url"]); ?>" class="form-control" placeholder="副标题" />									
						</div>
					</div>
					<div class="form-group">
						<label for="litpic" class="col-sm-2 control-label">网站Logo</label>
						<div class="col-sm-5">
							    <input type="text" class="form-control" name="logo" id="litpic" value="<?php echo ($vo["logo"]); ?>" placeholder="网站Logo" />	
						</div>
						<div class="col-sm-5">
							<button class="btn btn-primary" type="button" id="BrowerPicture"><em class="glyphicon glyphicon-plus-sign"></em> 选择站内图片</button>
								<div class="btn btn-success up-picture-btn">
							        <span><em class="glyphicon glyphicon-plus-sign"></em>上传Logo</span>							        
							        <input id="fileupload" type="file" name="mypic">
							    </div>							
						</div>
					</div>


					<div class="form-group">
						<label for="" class="col-sm-2 control-label"></label>
						<div class="col-sm-9">
							<div class="litpic_tip"></div>
							<div id="litpic_show">
								<?php if($vo['logo']): ?><img src="<?php echo ($vo["logo"]); ?>" width='88' height='31' /><?php endif; ?>
							</div>							
						</div>
					</div>

					<div class="form-group">
						<label for="inputSort" class="col-sm-2 control-label">排列位置</label>
						<div class="col-sm-9">
							<input type="text" name="sort" id="inputSort" value="<?php echo ($vo["sort"]); ?>" class="form-control" value="" placeholder="排列位置" />						
						</div>
					</div>

					<div class="form-group">
						<label for="inputDescription" class="col-sm-2 control-label">网站简况</label>
						<div class="col-sm-9">
							<textarea name="description" id="inputDescription" class="form-control"><?php echo ($vo["description"]); ?></textarea>								
						</div>
					</div>

					<div class="form-group">
						<label for="inputName" class="col-sm-2 control-label">链接位置</label>
						<div class="col-sm-9">
							<label class="radio-inline">
							 	<input type="radio" name="ischeck" value="0" <?php if($vo['ischeck'] == 0): ?>checked="checked"<?php endif; ?> />首页				
							 </label>
							<label class="radio-inline">
							 	<input type="radio" name="ischeck" value="1" <?php if($vo['ischeck'] == 1): ?>checked="checked"<?php endif; ?> />内页		
							 </label>	
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