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
    <link href="/rongfei/Public/css/animate.css" rel="stylesheet">
    <!-- HTML5 Shim 和 Respond.js 用于让 IE8 支持 HTML5元素和媒体查询 -->
    <!-- 注意： 如果通过 file://  引入 Respond.js 文件，则该文件无法起效果 -->
    <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
         <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->
</head>

<body>
    <div class="animated fadeInRight">
        <div class="panel panel-default">
            <div class="panel-body">
                <p class="text-danger">
                    <span class="glyphicon glyphicon-volume-up"></span>&nbsp;本平台禁止投放内容包括：政治敏感话题、违法、违规、反动、未经官方证实的负面新闻、侮辱型、攻击性词语、维权话题、虚假广告等内容，否则后果自负！
                </p>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body filter-box">
                <strong>价格筛选：</strong> <a href="<?php echo U('Home/List/index',array('cat_id'=>$cat_id));?>" >不限</a> <a href="<?php echo U('Home/List/index',array('cat_id'=>$cat_id, 'startPrice'=>0,'endPrice'=>20 ));?>">0-20元</a>
                <a href="<?php echo U('Home/List/index',array('cat_id'=>$cat_id, 'startPrice'=>20,'endPrice'=>50 ));?>">20-50元</a> <a href="<?php echo U('Home/List/index',array('cat_id'=>$cat_id, 'startPrice'=>50,'endPrice'=>100 ));?>">50-100元</a> <a href="<?php echo U('Home/List/index',array('cat_id'=>$cat_id, 'startPrice'=>100,'endPrice'=>200 ));?>">100-200元</a>
                <a href="<?php echo U('Home/List/index',array('cat_id'=>$cat_id, 'startPrice'=>200));?>">200以上</a>
            </div>
        </div>

        <ul class="nav nav-tabs">
            <li class="active"><a href="#">默认排序</a></li>
            <li><a href="#">超值套餐推荐</a></li>
        </ul>
        <div class="panel panel-default" style="margin-bottom: 0;">
            <table class="table table-bordered table-hover text-center vertical-middle-lg">
                <thead>
                    <tr style="background-color: #f5f5f5;">
                        <th>媒体频道</th>
                        <th>分类</th>
                        <th>单价(元)</th>
                        <th>链接 [只供参考]</th>
                        <th>收录 [只供参考]</th>
                        <th>备注</th>
                        <th>下单</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(is_array($resultList)): foreach($resultList as $k=>$res): ?><tr>

                            <td>
                                <a href="<?php echo ($res["news_url"]); ?>">
                                    <?php echo ($res["name"]); ?>
                                </a><a href="<?php echo ($res["case_url"]); ?>"> [案例]</a></td>
                            <td>
                                <?php echo ($res["cat_name"]["name"]); ?>
                            </td>
                            <td><span class="text-danger"><?php echo ($res["price"]); ?></span></td>
                            <td>
                                <?php echo (link2text($res["link_type"])); ?>
                            </td>
                            <td>
                                <?php echo (sl2text($res["sl_type"])); ?>
                            </td>
                            <td>
                                <?php echo ($res["remark"]); ?>
                            </td>
                            <td><a href="<?php echo ($res["buy_link"]); ?>">下单</a></td>
                        </tr><?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
        <div class="row-fluid clearfix">
            <div class="pull-right">
                <?php echo ($page); ?>
            </div>
        </div>
    </div>
    <!-- jQuery (Bootstrap 的 JavaScript 插件需要引入 jQuery) -->
    <script src="/rongfei/Public/js/jquery-1.9.1.min.js"></script>
    <script src="/rongfei/Public/layer/layer.js"></script>
    <script src="/rongfei/Public/js/bootstrap.min.js"></script>
</body>

</html>