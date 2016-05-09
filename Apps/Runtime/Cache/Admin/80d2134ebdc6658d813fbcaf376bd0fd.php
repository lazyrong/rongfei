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
	<div class="panel panel-default">
        <div class="panel-heading">编辑</div>
        <div class="panel-body">
  <div class="row-fluid" id="addBox">
      <div class="col-md-offset-3 col-md-6">
              <form  class="form-horizontal" style="margin:20px auto;" role="form" action="<?php echo U('Admin/News/update');?>" method="post">
                <!-- news id -->
                <input type="hidden" id="news_id" name="news_id" value="<?php echo ($news["news_id"]); ?>">
              		<!-- 选择分类 -->
                    <div class="form-group">
                      <label for="cat_id"   class="col-sm-2 control-label">选择分类</label>
                      <div class="col-sm-10">
                      <select class="form-control" name="cat_id" id="cat_id">
                      <?php if(is_array($cats)): foreach($cats as $key=>$cat): ?><option value="<?php echo ($cat["cat_id"]); ?>" <?php if($cat["cat_id"] == $cat_id): ?>selected<?php endif; ?>> <?php echo ($cat["name"]); ?> </option><?php endforeach; endif; ?>
                      </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="name"  class="col-sm-2 control-label">媒体名称</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="name"  name="name" placeholder="媒体名称"  value="<?php echo ($news["name"]); ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="news_url"   class="col-sm-2 control-label">媒体链接</label>
                      <div class="col-sm-10">
                        <input type="text"  class="form-control" id="news_url" name="news_url"  placeholder="媒体链接"   value="<?php echo ($news["news_url"]); ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="case_url"   class="col-sm-2 control-label">案例链接</label>
                      <div class="col-sm-10">
                        <input type="text"  class="form-control" id="case_url" name="case_url"  placeholder="案例链接"  value="<?php echo ($news["case_url"]); ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="price"   class="col-sm-2 control-label">价格</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="price" name="price" placeholder="价格" value="<?php echo ($news["price"]); ?>" >
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="link_type"   class="col-sm-2 control-label">链接说明</label>
                      <div class="col-sm-10">
                      <select class="form-control" name="link_type" id="link_type">
                        <option value="0" <?php if($news["link_type"] == 0): ?>selected<?php endif; ?> >无</option>
                        <option value="1" <?php if($news["link_type"] == 1): ?>selected<?php endif; ?> >只可以带纯文本链接</option>
                        <option value="2" <?php if($news["link_type"] == 2): ?>selected<?php endif; ?> >可加入超链接</option>
                        <option value="3" <?php if($news["link_type"] == 3): ?>selected<?php endif; ?> >不确定</option>
                      </select>
                      </div>
                    </div>                
                    <div class="form-group">
                      <label for="sl_type"   class="col-sm-2 control-label">收录说明</label>
                      <div class="col-sm-10">
                      <select class="form-control" name="sl_type" id="sl_type">
                        <option value="0" <?php if($news["sl_type"] == 0): ?>selected<?php endif; ?>>无</option>
                        <option value="1" <?php if($news["sl_type"] == 1): ?>selected<?php endif; ?>>网页</option>
                        <option value="2" <?php if($news["sl_type"] == 2): ?>selected<?php endif; ?>>新闻源</option>
                        <option value="3" <?php if($news["sl_type"] == 3): ?>selected<?php endif; ?>>不确定</option>
                      </select>
                    </div>
                    </div>    
                    <div class="form-group">
                        <label for="remark"   class="col-sm-2 control-label">备注</label>
                        <div class="col-sm-10">
                        <textarea class="form-control" name="remark" id="remark" cols="8" rows="5" ><?php echo ($news["remark"]); ?></textarea>        
                    </div>
                  </div>
                    <div class="form-group">
                      <label for="buy_link"   class="col-sm-2 control-label">淘宝链接</label>
                      <div class="col-sm-10">
                      <input type="text" class="form-control" id="buy_link" name="buy_link" placeholder="淘宝链接" value="<?php echo ($news["buy_link"]); ?>">
                    </div>
                  </div>
                    <button type="submit" class="col-sm-offset-2 btn btn-primary">提交</button>
            </form>
      </div>
    </div>
        </div>
    </div>
    <!-- jQuery (Bootstrap 的 JavaScript 插件需要引入 jQuery) -->
    <script src="/rongfei/Public/js/jquery-1.9.1.min.js"></script>
    <script src="/rongfei/Public/layer/layer.js"></script>
    <script src="/rongfei/Public/js/bootstrap.min.js"></script>
    <script>

    </script>
</body>
</html>