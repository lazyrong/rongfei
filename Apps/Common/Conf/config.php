<?php
return array(
	//'配置项'=>'配置值'
	'Default_module'     => 'Home', //默认模块

	'URL_MODEL'            => 2, //URL模式
	'URL_CASE_INSENSITIVE'  =>  true,

	/* 模版相关配置 */

    'URL_HTML_SUFFIX'	=>	'html',

    'TMPL_L_DELIM'		=>	'<{', //修改左定界符

    'TMPL_R_DELIM'		=>	'}>', //修改右定界符

	'TMPL_PARSE_STRING'	=>	array(

		    '__CSS__'		=>	__ROOT__.'/Public/css',

		    '__JS__'		=>	__ROOT__.'/Public/js',

		    '__IMAGES__'	=>	__ROOT__.'/Public/img',

	   	),
	'SHOW_PAGE_TRACE' =>false,  //debug trace
	
	//数据库配置信息
	'DB_TYPE'   => 'mysql', // 数据库类型
	'DB_HOST'   => 'localhost', // 服务器地址
	'DB_NAME'   => 'lazycms', // 数据库名
	'DB_USER'   => 'root', // 用户名
	'DB_PWD'    => '123456', // 密码
	'DB_PORT'   => 3306, // 端口
	'DB_PREFIX' => 'lazy_', // 数据库表前缀 
	'DB_CHARSET'=> 'utf8', // 字符集

	// 系统默认的变量过滤机制
	'DEFAULT_FILTER'        => 'htmlspecialchars',

    // link_type 
    'link_type_text'	=>	array('无','只可以带文本网址','可以加入超链接','不可以添加任何链接'),
    // sl_type
    'sl_type_text'	=>	array('无','网页','新闻源','不确定')
);