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
    <link rel="stylesheet" href="/rongfei/Public/css/fileinput.min.css">
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
                <strong>价格筛选：</strong> <a href="xwrw.html">不限</a> <a href="">0-20元</a>
                <a href="">20-50元</a> <a href="">50-100元</a> <a href="">100-200元</a>
                <a href="">200以上</a>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <strong>操作：</strong> <a class="btn btn-primary" href="javascript:void(0);" id="add">新增</a> <a class="btn btn-danger" href="javascript:void(0);" id="delAll">批量删除</a>
                <div class="pull-right clearfix">
                    <a class="btn btn-primary btn-file"><span class="glyphicon glyphicon-folder-open"></span>&nbsp; <span class="hidden-xs">上传..</span><input id="fileIpt" name="fileIpt"  type="file"></a>
                    <a class="btn btn-default btn-file " id="download" title="表格下载"><span class="glyphicon glyphicon-cloud-download">&nbsp; </span><span class="hidden-xs">下载..</span></a>
                </div>
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
                        <th>全选
                            <input type="checkbox" id="checkAll">
                        </th>
                        <th>媒体频道</th>
                        <th>分类</th>
                        <th>单价(元)</th>
                        <th>链接 [只供参考]</th>
                        <th>收录 [只供参考]</th>
                        <th>备注</th>
                        <th>下单</th>
                        <th>更新时间</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(is_array($resultList)): foreach($resultList as $k=>$res): ?><tr>
                            <td>
                                <input type="checkbox" name="ids[]" value="<?php echo ($res["news_id"]); ?>">
                                <?php echo ($res["news_id"]); ?>
                            </td>
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
                            <td>
                                <?php echo ($res["pubtime"]); ?>
                            </td>
                            <td><a href="<?php echo U('Admin/News/editNews',array('news_id'=>$res[news_id],'cat_id'=>$cat_id));?>" title="编辑"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;&nbsp;<a href="<?php echo U('Admin/News/del',array('news_id'=>$res[news_id]));?>" title="删除"><span class="glyphicon glyphicon-trash"></span></a></td>
                        </tr><?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
        <div class="row-fluid clearfix">
            <div class="pull-right">
<!--             <ul class="pagination">
          <li><a href="#">&laquo;</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#">&raquo;</a></li>
        </ul>  -->
                <?php echo ($page); ?>

            </div>
        </div>
    </div>
    <!-- jQuery (Bootstrap 的 JavaScript 插件需要引入 jQuery) -->
    <script src="/rongfei/Public/js/jquery-1.9.1.min.js"></script>
    <script src="/rongfei/Public/layer/layer.js"></script>
    <script src="/rongfei/Public/js/bootstrap.min.js"></script>
    <script src="/rongfei/Public/js/fileinput.min.js"></script>
    <script>

    var flag = 1;
    $(function() {
        $('#add').on('click', function() {
            layer.open({
                type: 2,
                title: '新增',
                closeBtn: 1,
                shadeClose: true,
                skin: 'yourclass',
                area: ['80%', '60%'],
                offset: '100px',
                content: "<?php echo U('Admin/News/addNews',array('cat_id'=>$cat_id));?>"
            });
        });
        $('#delAll').on('click', function() {
            //询问框
            //获取checkedbox value
            var arrChk = $("input[name='ids[]']:checked");

            if (arrChk.length == 0) {
                return false;
            }

            var arr = new Array(); //id数组  
            for (var i = 0; i < arrChk.length; i++) {
                arr[i] = arrChk[i].value;
            }

            var index = layer.confirm('删除全部所选内容？', {
                btn: ['删除', '取消'] //按钮
            }, function() {
                $.post('<?php echo U('
                    Admin / News / delAll ');?>', {
                        'ids': arr
                    },
                    function(st) {
                        layer.close(index);
                        if (st) {
                            layer.msg('删除成功!');
                            location.reload();
                        } else {
                            layer.msg('删除失败!');
                        }

                    });
            });
        });
        $("#checkAll").on('change', function() {
            var arrChk = $("input[name='ids[]']");
            if (flag) {
                for (var i = 0; i < arrChk.length; i++) {
                    arrChk.eq(i).prop("checked", true);
                }
                flag = 0;
            } else {
                for (var i = 0; i < arrChk.length; i++) {
                    arrChk.eq(i).removeAttr("checked");
                }
                flag = 1;
            }
        });
    })
    </script>
</body>

</html>