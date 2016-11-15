<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link rel="stylesheet" type="text/css" href="/uploads_code/Data/static/bootstrap/3.3.5/css/bootstrap.min.css" media="screen"> 
    <link rel='stylesheet' type="text/css" href="/uploads_code/App/Manage/View/Public/css/main.css" />
    <script type="text/javascript" src="/uploads_code/Data/static/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="/uploads_code/Data/static/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="/uploads_code/Data/static/js/html5shiv.min.js"></script>
        <script src="/uploads_code/Data/static/js/respond.min.js"></script>
    <![endif]-->
    
    <script type="text/javascript" src="/uploads_code/App/Manage/View/Public/js/jquery.form.min.js"></script>
    <!-- 头部js文件|自定义 -->
    <script language="JavaScript">
    function returnValue(sfile, stype){  
        var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
        if (stype == 'picture') {
            window.parent.selectPicture(sfile);
        } else {
            window.parent.selectFile(sfile);
        }
        parent.layer.close(index);
    }

    function showPreview(sfile){       
        document.getElementById('PictureSrc').src = sfile;
        document.getElementById('PicturePreviewDiv').style.display='block';
    }
</script>
</head>
<body>
    <div id="PicturePreviewDiv" class="bf_picture_preview">
<a href="javascript:;" onClick="document.getElementById('PicturePreviewDiv').style.display='none';"><img src='/uploads_code/App/Manage/View/Public/images/nopic.png' id='PictureSrc' border='0' alt='单击关闭预览'></a>
</div>
    <div class="xyh-sub-content">
        <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header"><em class="glyphicon glyphicon-cloud-upload"></em> 
            <?php echo ($type); ?>         
            </h4>
        </div>        
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form action="" method="post" id="form_do" name="form_do">
                    <table class="table table-hover xyh-table-bordered-out">
                        <thead>
                            <tr>
                                <th>文件名称</th>
                                <!--th class="aleft">类型</th-->
                                <th>大小</th>
                                <th>修改时间</th>
                                <th>可读</th>
                                <th>可写</th>
                                <th class="text-right">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="aleft"><a href="<?php echo ($purl); ?>">↑上级目录</a></td>
                                <td></td>
                                <!--td></td-->
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>  </td>
                            </tr>
                            <?php if(is_array($vlist)): foreach($vlist as $key=>$v): ?><tr>
                                <td>
                                 <?php if($v["isDir"] == 1): ?><a href="<?php echo ($v["url"]); ?>"><?php echo ($v["filename"]); ?></a>
                                <?php else: ?>
                                <a href="javascript:returnValue('<?php echo ($v["url"]); ?>', '<?php echo ($stype); ?>');"><?php echo ($v["filename"]); ?></a><?php endif; ?>
                                </td>
                                <!--td class="aleft"><?php if($v["isDir"] == 1): ?>目录<?php else: ?>文件<?php endif; ?></td-->
                                <td><?php echo ($v["size"]); ?></td>
                                <td><?php echo (date('Y-m-d H:i:s',$v["mtime"])); ?></td>
                                <td><?php if($v["isReadable"] == 1): ?>√<?php else: ?>×<?php endif; ?></td>
                                <td><?php if($v["isWritable"] == 1): ?>√<?php else: ?>×<?php endif; ?></td>
                                <td class="text-right" style="min-width:100px;">
                                <?php if($v["isDir"] == 1): ?><a href="<?php echo ($v["url"]); ?>" class="label label-info">打开</a>
                                <?php else: ?>
                                <a href="javascript:returnValue('<?php echo ($v["url"]); ?>', '<?php echo ($stype); ?>');" class="label label-success">选择</a> 
                                <?php if($v["isImg"] == 1): ?><a href="javascript:showPreview('<?php echo ($v["url"]); ?>');" class="label label-info">预览</a><?php endif; endif; ?>        
                                </td>
                            </tr><?php endforeach; endif; ?>
                        </tbody>
                    </table>
            </form>
            
        </div>
    </div>
            
    </div>  
</body>
</html>