<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN" class="login-bg" style="background-image: url('/rongfei/Public/img/landscape.jpg');">
  <head>
    <meta charset="utf-8">
    <title>荣飞传媒资料库-后台登录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="后台登录">
    <meta name="author" content="rongfeichuanmei">

    <!-- Le styles -->
    <link href="/rongfei/Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/rongfei/Public/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="/rongfei/Public/css/login.css" rel="stylesheet">

      <!-- HTML5 Shim 和 Respond.js 用于让 IE8 支持 HTML5元素和媒体查询 -->
      <!-- 注意： 如果通过 file://  引入 Respond.js 文件，则该文件无法起效果 -->
      <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
         <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->

  </head>
<body>

<!-- background switcher -->
    <div class="bg-switch visible-desktop">
        <div class="bgs">
            <a href="#" data-img="landscape.jpg" class="bg active">
                <img src="/rongfei/Public/img/landscape.jpg" />
            </a>
            <a href="#" data-img="blueish.jpg" class="bg">
                <img src="/rongfei/Public/img/blueish.jpg" />
            </a>            
            <a href="#" data-img="7.jpg" class="bg">
                <img src="/rongfei/Public/img/7.jpg" />
            </a>
            <a href="#" data-img="8.jpg" class="bg">
                <img src="/rongfei/Public/img/8.jpg" />
            </a>
            <a href="#" data-img="9.jpg" class="bg">
                <img src="/rongfei/Public/img/9.jpg" />
            </a>
            <a href="#" data-img="10.jpg" class="bg">
                <img src="/rongfei/Public/img/10.jpg" />
            </a>
            <a href="#" data-img="11.jpg" class="bg">
                <img src="/rongfei/Public/img/11.jpg" />
            </a>
        </div>
    </div>

    <div class="row-fluid login-wrapper">
        <a href="javascript:void(0);">
            <img class="logo" src="/rongfei/Public/img/logo-white.png" />
        </a>
        <form class="span4 box" action="<?php echo U('Admin/Login/checkLogin');?>" method="post">
                <div class="content-wrap clearfix">
                <h6>荣飞后台管理系统</h6>
                <input class="span12" type="text" placeholder="管理员账号" name="username" />
                <input class="span12" type="password" placeholder="密码" name="password" />
                <input class="span12 btn btn-success" type="submit" value="登录" />
            </div>
        </form>
    </div>



    <!-- jQuery (Bootstrap 的 JavaScript 插件需要引入 jQuery) -->
    <script src="/rongfei/Public/js/jquery-1.9.1.min.js"></script>
    <script src="/rongfei/Public/js/bootstrap.min.js"></script>
    <script>
    $(function(){
     // bg switcher
                var $btns = $(".bg-switch .bg");
                $btns.click(function (e) {
                    e.preventDefault();
                    $btns.removeClass("active");
                    $(this).addClass("active");
                    var bg = $(this).data("img");

                    $("html").css("background-image", "url('/rongfei/Public/img/" + bg + "')");
                });
    })
    </script>
</body>
</html>