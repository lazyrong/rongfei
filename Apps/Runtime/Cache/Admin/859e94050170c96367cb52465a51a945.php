<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <title>荣飞传媒资料库</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="荣飞传媒资料库">
    <meta name="author" content="rongfeichuanmei">

    <!-- Le styles -->
    <link href="/rongfei/Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/rongfei/Public/css/style.css" rel="stylesheet">

      <!-- HTML5 Shim 和 Respond.js 用于让 IE8 支持 HTML5元素和媒体查询 -->
      <!-- 注意： 如果通过 file://  引入 Respond.js 文件，则该文件无法起效果 -->
      <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
         <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->

  </head>
<body style="padding-top:70px;">
  <!-- header -->
    ﻿
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo U('Admin/Index/index');?>">荣飞媒体资料库</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav" style="margin-left:50px;">
          <li><a href="<?php echo U('Admin/Index/index');?>">首页</a></li>
        
        <?php if(is_array($lel1)): foreach($lel1 as $key=>$lel): ?><li <?php if($lel['cat_id'] == $cat_id): ?>class="active"<?php endif; ?>>
          <div class="tags-div header-tag">
            <a class="tag-link" href="<?php echo U('Admin/Index/index',array('cat_id'=>$lel['cat_id']));?>"><?php echo ($lel["name"]); ?></a>   
            <input class="hide" type="text" id="name"  name="name"  value="<?php echo ($lel["name"]); ?>">    
            <a class="icon-link" href="javascript:;" onclick="edit(this,<?php echo ($lel['cat_id']); ?>)"><span class="glyphicon glyphicon-edit" title="编辑"></span></a>
            <a class="icon-link" href="javascript:;" onclick="del(this,<?php echo ($lel['cat_id']); ?>)"><span class="glyphicon glyphicon-trash" title="删除"></span></a>  
          </div>  
          </li><?php endforeach; endif; ?>
        </ul>
        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="查找媒体">
          </div>
          <button type="submit" class="btn btn-default">查找</button>
        </form>

        <form  role="form" class="navbar-form navbar-left form-inline">
           <input type="hidden" name="pid" value="0" >
           <div class="form-group">
                <input type="text" class="form-control" placeholder="模型（1：新闻软文；2：微博 3微信 4淘宝）" name="type">
                <input type="text" class="form-control" placeholder="请输入顶级分类名称" name="name" >
           </div>
           <a href="javascript:;" class="btn btn-success addCatTo">添加顶级分类</a> 
        </form>

        <ul class="nav navbar-nav navbar-right">
          <!-- <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li><a href="#">Separated link</a></li>
            </ul>
          </li> -->
          <li><a href="#">淘宝店铺</a></li>
          <li><a href="<?php echo U('Home/Index/index');?>" title="退出">查看站点</a></li>
          <li><a href="<?php echo U('Admin/Login/logOut');?>" title="退出"><span class="glyphicon glyphicon-log-out"></span></a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div>
  </nav>

  <!-- header end -->

  <!-- 主内容区 -->
  <div class="row-fluid clearfix">
    <div class="col-md-4 col-lg-3" id="left-menu">
    <div class="panel panel-default">
      <div class="panel-body">
        <form  role="form" class="form-inline">
         <input type="hidden" name="type" value="<?php echo ($type); ?>" >
         <input type="hidden" name="pid" value="<?php echo ($cat_id); ?>" >
         <input type="hidden" name="sort" value="100" >
         <div class="form-group">
              <input type="text" class="form-control" placeholder="请输入栏目名称" name="name" >
         </div>
         <a href="javascript:;" class="btn btn-primary addCatTo" >添加栏目</a>
       </form>
      </div>
    </div>
    <div class="media-tags">
    <!-- 分类box -->
    <?php if(is_array($catsList)): foreach($catsList as $key=>$cats): ?><div class="panel panel-default">
        <div class="panel-heading">
         	<span class="tag-link"> <?php echo ($cats['name']); ?></span>
          <input class="hide" type="text" id="name"  name="name"  value="<?php echo ($cats['name']); ?>">

          <a href="javascript:;" onclick="edit(this,<?php echo ($cats['cat_id']); ?>)"><span class="glyphicon glyphicon-edit" title="编辑"></span></a>
          <a href="javascript:;" onclick="del(this,<?php echo ($cats['cat_id']); ?>)"><span class="glyphicon glyphicon-trash" title="删除"></span></a>
        </div>
        
	  	<div style="background-color:#eee;padding:10px 20px;border:inset 1px;">
      <form  role="form" class="form-inline">
         <input type="hidden" name="type" value="<?php echo ($cats["type"]); ?>" >
         <input type="hidden" name="pid" value="<?php echo ($cats["cat_id"]); ?>" >
         <input type="hidden" name="sort" value="1" >
         <div class="form-group">
              <input type="text" class="form-control" placeholder="请输入分类名称" name="name" >
         </div>
         <a href="javascript:;" class="btn btn-success addCatTo">添加分类</a> 
      </form>
      </div>
        <div class="panel-body tags-box-admin">
          <a class="tag-link" href="<?php echo U('Admin/List/index',array('cat_id'=>$cats['cat_id'],'type' => $type));?>" target="iframe0">不限</a>
        <?php if(is_array($cats['children'])): foreach($cats['children'] as $key=>$cat): ?><div class='tags-div'>
          <a class="tag-link"  href="<?php echo U('Admin/List/index',array('cat_id'=>$cat['cat_id'],'type' => $type));?>" target="iframe0" >
          <?php echo ($cat['name']); ?>
          </a>
           <input class="hide" type="text" id="name"  name="name"  value="<?php echo ($cat['name']); ?>">
          <a class="icon-link" href="javascript:;" onclick="edit(this,<?php echo ($cat['cat_id']); ?>)"><span class="glyphicon glyphicon-edit" title="编辑"></span></a>
          <a class="icon-link" href="javascript:;" onclick="del(this,<?php echo ($cat['cat_id']); ?>)"><span class="glyphicon glyphicon-trash" title="删除"></span></a>
          </div><?php endforeach; endif; ?>
        </div>
      </div><?php endforeach; endif; ?>
   <!-- 分类box end -->

      </div>
    </div>
    <!-- right-iframe-content -->
    <div class=" col-md-8 col-lg-9 media-content" id="iframe-body">
      <iframe id="iframe0" src="<?php echo U('Admin/List/index',array('cat_id' => $cat_id));?>" name="iframe0" width="100%" height="100%" scrolling="no" frameborder="0"  seamless></iframe>
    </div>
  </div>
  <!-- footer -->
  ﻿  <div class="footer">
  <p>
          <strong>Copyright</strong> rongfei-media © 2016 <a href="http://www.miitbeian.gov.cn/" target="_blank">赣ICP备16003949号</a>
  </p>
  </div>

  <!-- footer end -->


    <!-- jQuery (Bootstrap 的 JavaScript 插件需要引入 jQuery) -->
    <script src="/rongfei/Public/js/jquery-1.9.1.min.js"></script>
    <script src="/rongfei/Public/layer/layer.js"></script>
    <script src="/rongfei/Public/js/bootstrap.min.js"></script>
    <script>
    $(function(){
      $("#iframe0").load(function(){
          iframeH = $("#iframe0").contents().find("body").height()+30;
          iframeH = $(window).height() > iframeH? $(window).height():iframeH;
          $("#iframe-body").height(iframeH);
          console.log(iframeH);
        });

      $('.addCatTo').on('click',function(){
          $form = $(this).parent('form');
          $data = $form.serialize();
          $.post("<?php echo U('Admin/Category/add');?>", $data, function(st) {
            location.reload();
          }
            );
      });
      })

    //ajax修改分类名称
      function edit(obj,id) {
        $obj = $(obj);
        $ipt = $obj.siblings('input');
        $a = $obj.siblings('.tag-link');
        if($ipt.hasClass('hide')){
          $a.addClass('hide');
          $ipt.removeClass('hide');
          $ipt.focus();
        } else {          
          $.post("<?php echo U('Admin/Category/update');?>",{'name':$ipt.val(),'cat_id':id},
            function(st){
              $a.text($ipt.val());
              $a.removeClass('hide');
              $ipt.addClass('hide');
            }
          );
        }
      }
    //ajax修改分类名称
          function del(obj,id) {
            $obj = $(obj);
            $pt = $obj.parent('.tags-div').length>0? $obj.parent('.tags-div'):$obj.parent().parent();

            var index = layer.confirm('删除该栏目分类？', {
                btn: ['删除', '取消'] //按钮
            }, function() {
                  $.post("<?php echo U('Admin/Category/del');?>",{'cat_id':id},
                  function(st){
                    if(st) {
                      layer.close(index);
                      $pt.remove();
                    }
                  }
                );
            });
          }

    </script>
</body>
</html>