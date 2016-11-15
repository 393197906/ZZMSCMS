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
	    var URL = '/uploads_code/xyhai.php?s=/Special';
	    var APP	 = '/uploads_code/xyhai.php?s=';
	    var SELF='/uploads_code/xyhai.php?s=/Special/add';
	    var PUBLIC='/uploads_code/App/Manage/View/Public';
	    var data_path = "/uploads_code/Data";
		var tpl_public = "/uploads_code/App/Manage/View/Public";
	    //-->
	</script>
	<script type="text/javascript" src="/uploads_code/App/Manage/View/Public/js/common.js"></script> 
	<!-- 头部js文件|自定义 -->
	
<script type="text/javascript" src="/uploads_code/App/Manage/View/Public/js/calendar.config.js"></script>
<script type="text/javascript" src="/uploads_code/Data/static/jq_plugins/iColorPicker/iColorPicker.js"></script>

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
					var timg = data.info[0].turl;//缩略图
					$('#litpic_show').html("<img src='"+timg+"' width='120'>");
					$("#litpic").val(timg);
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

	$('#CK_JumpUrl').click(function(){
            if($(this).prop('checked')) {
                $('#JumpUrlDiv').show();

            }else {
                $('#JumpUrlDiv').hide();
            }
            
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
			<?php echo ($type); ?>  
		    </h3>
		</div>
		
	</div>


	<div class="row">
		<div class="col-lg-12">

				<form method='post' class="form-horizontal" id="form_do" name="form_do" action="<?php echo U('add');?>">											

					<div class="form-group">
						<label for="inputTtitle" class="col-sm-2 control-label">标题</label>
						<div class="col-sm-9">
							<input type="text" name="title" id="inputTtitle" class="form-control" placeholder="标题" required="required" />									
						</div>
					</div>
					<div class="form-group">
						<label for="inputShorttitle" class="col-sm-2 control-label">副标题</label>
						<div class="col-sm-9">
							<input type="text" name="shorttitle" id="inputShorttitle" class="form-control" placeholder="副标题" />									
						</div>
					</div>

					<div class="form-group">
						<label for="inputColor" class="col-sm-2 control-label">标题颜色</label>
						<div class="col-sm-5">
							<input type="text" name="color" id="inputColor" class="form-control  iColorPicker" placeholder="标题颜色" />									
						</div>
					</div>

					<div class="form-group">
						<label for="inputColor" class="col-sm-2 control-label">自定义属性</label>
						<div class="col-sm-9">
							<?php if(is_array($flagtypelist)): foreach($flagtypelist as $key=>$v): ?><label class="checkbox-inline"><input type='checkbox' name='flags[]' value='<?php echo ($key); ?>' <?php if($key == B_JUMP): ?>id="CK_JumpUrl"<?php endif; ?> /> <?php echo ($v); ?></label><?php endforeach; endif; ?>								
						</div>
					</div>

					<div class="form-group" id="JumpUrlDiv" style="display:none;">
						<label for="inputJumpurl" class="col-sm-2 control-label">跳转网址</label>
						<div class="col-sm-9">
							<input type="text" name="jumpurl" id="inputJumpurl" class="form-control" placeholder="跳转网址" />									
						</div>
					</div>

					<div class="form-group">
						<label for="inputProName" class="col-sm-2 control-label">所属栏目</label>
						<div class="col-sm-9">
							<select name="cid" class="form-control">
								<?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>" <?php if($pid == $v['id']): ?>selected="selected"<?php endif; ?>><?php echo ($v["delimiter"]); echo ($v["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>									
						</div>
					</div>

					<div class="form-group">
						<label for="litpic" class="col-sm-2 control-label">缩略图</label>
						<div class="col-sm-5">
							    <input type="text" class="form-control" name="litpic" id="litpic"  value="" placeholder="缩略图地址" />	
						</div>
						<div class="col-sm-5">
							<button class="btn btn-primary" type="button" id="BrowerPicture"><em class="glyphicon glyphicon-plus-sign"></em> 选择站内图片</button>
								<div class="btn btn-success up-picture-btn">
							        <span><em class="glyphicon glyphicon-plus-sign"></em>添加图片</span>										        
							        <input id="fileupload" type="file" name="mypic">
							    </div>							
						</div>
					</div>


					<div class="form-group">
						<label for="" class="col-sm-2 control-label"></label>
						<div class="col-sm-9">
							<div class="litpic_tip"></div>
							<div id="litpic_show"> </div>							
						</div>
					</div>

					<div class="form-group">
						<label for="inputKeywords" class="col-sm-2 control-label">模板</label>
						<div class="col-sm-9">
							<select name="template" class="form-control">
								<?php if(is_array($styleShowList)): foreach($styleShowList as $key=>$v): ?><option value="<?php echo ($v); ?>"><?php echo ($v); ?></option><?php endforeach; endif; ?>
							</select>					
						</div>
					</div>

					<div class="form-group">
						<label for="inputKeywords" class="col-sm-2 control-label">关键词</label>
						<div class="col-sm-9">
							<input type="text" name="keywords" id="inputKeywords" class="form-control" value="" placeholder="多关键词之间用“,”隔开" />						
						</div>
					</div>

					<div class="form-group">
						<label for="inputDescription" class="col-sm-2 control-label">专题说明</label>
						<div class="col-sm-9">
							<textarea name="description" id="inputDescription" class="form-control"></textarea>								
						</div>
					</div>
					<div class="form-group">
						<label for="inputFilename" class="col-sm-2 control-label">自定义文件名</label>
						<div class="col-sm-9">
							<input type="text" name="filename" id="inputFilename" class="form-control" value="" placeholder="文件名只能由字母、拼音、英文组成" />							
						</div>
					</div>	

					<div class="form-group">
						<label for="inputPublishtime" class="col-sm-2 control-label">发布时间</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="publishtime" id="inputPublishtime" value="<?php echo date('Y-m-d H:i:s',time());?>">
			                <script type="text/javascript">
			                    Calendar.setup({
			                        weekNumbers: true,
			                        inputField : "inputPublishtime",
			                        trigger    : "inputPublishtime",
			                        dateFormat: "%Y-%m-%d %H:%M:%S",
			                        showTime: true,
			                        minuteStep: 1,
			                        onSelect   : function() {this.hide();}
			                    });
			                </script>						
						</div>
					</div>


					<div class="form-group">
						<label for="inputName" class="col-sm-2 control-label">评论</label>
						<div class="col-sm-9">
							<label class="radio-inline">
							 	<input type="radio" name="commentflag" value="1" checked="checked" />允许				
							 </label>
							<label class="radio-inline">
							 	<input type="radio" name="commentflag" value="0" />禁止		
							 </label>	
						</div>
					</div>		
					
					<div class="row margin-botton-large">
						<div class="col-sm-offset-2 col-sm-9">
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