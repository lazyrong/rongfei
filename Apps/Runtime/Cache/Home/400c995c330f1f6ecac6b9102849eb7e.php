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
          <li><a href="<?php echo U('Home/Index/index');?>">首页</a></li>
        
        <?php if(is_array($lel1)): foreach($lel1 as $key=>$lel): ?><li <?php if($lel['cat_id'] == $cat_id): ?>class="active"<?php endif; ?>><a href="<?php echo U('Home/Index/index',array('cat_id'=>$lel['cat_id']));?>"><?php echo ($lel["name"]); ?></a></li><?php endforeach; endif; ?>
        
        </ul>
        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="查找媒体">
          </div>
          <button type="submit" class="btn btn-default">查找</button>
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
        </ul>
      </div><!-- /.navbar-collapse -->
    </div>
  </nav>

  <!-- header end -->

  <!-- 主内容区 -->
  <div class="row-fluid clearfix">
    <div class="col-md-4 col-lg-3" id="left-menu">
    <div class="media-tags">
    <!-- 分类box -->
    <?php if(is_array($catsList)): foreach($catsList as $key=>$cats): ?><div class="panel panel-default">
        <div class="panel-heading">
          <span class="tag-link"> <?php echo ($cats['name']); ?></span>
        </div>

        <div class="panel-body tags-box">
          <a  href="<?php echo U('Home/List/index',array('cat_id'=>$cats['cat_id'],'type' => $type));?>" target="iframe0">不限</a>
        <?php if(is_array($cats['children'])): foreach($cats['children'] as $key=>$cat): ?><a  href="<?php echo U('Home/List/index',array('cat_id'=>$cat['cat_id'],'type' => $type));?>" target="iframe0" >
          <?php echo ($cat['name']); ?>
          </a><?php endforeach; endif; ?>
        </div>
      </div><?php endforeach; endif; ?>
   <!-- 分类box end -->

      </div>
    </div>
    <!-- right-iframe-content -->
    <div class=" col-md-8 col-lg-9 media-content" id="iframe-body">
      <iframe id="iframe0" src="<?php echo U('Home/List/index',array('cat_id' => $cat_id));?>" name="iframe0" width="100%" height="100%" scrolling="no" frameborder="0"  seamless></iframe>
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
    <script src="/rongfei/Public/js/bootstrap.min.js"></script>
    <script>
       $(function(){
          $("#iframe0").load(function(){
              iframeH = $("#iframe0").contents().find("body").height()+30;
              iframeH = $(window).height() > iframeH? $(window).height():iframeH;
              $("#iframe-body").height(iframeH);
            });
          })
    </script>
</body>
</html>