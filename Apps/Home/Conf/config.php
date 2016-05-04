<?php
return array(

	'default_module'     => 'Home', //默认模块

	'URL_MODEL'            => 2, //URL模式
	'URL_CASE_INSENSITIVE'  =>  true,

	/* 模版相关配置 */

    'URL_HTML_SUFFIX'	=>	'html',

    'TMPL_L_DELIM'		=>	'<{', //修改左定界符

    'TMPL_R_DELIM'		=>	'}>', //修改右定界符

	'TMPL_PARSE_STRING'	=>	array(

		    '__CSS__'		=>	__ROOT__.MODULE_PATH.'view/Public/css',

		    '__JS__'		=>	__ROOT__.MODULE_PATH.'view/Public/js',

		    '__IMAGES__'	=>	__ROOT__.MODULE_PATH.'view/Public/images',

	   	),
	'SHOW_PAGE_TRACE' =>true

);