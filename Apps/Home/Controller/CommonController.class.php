<?php

/**
 * 公共类
 * @author lazytech.cc
 */
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller

{

	Public function _initialize(){

		// if (ismobile()) {

  //           C('DEFAULT_THEME','mobile');

  //       }

		$cats= M('Category')->where('isverify=1')->order('sort asc')->select();

		$cats = list2layer($cats, 0);

		// dump($cats);

		$this->assign('cats',$cats);

		$session_name = session_name();			

	}

	
	//空操作

	public function _empty(){

		$this->redirect(__ROOT__);

	}

}

