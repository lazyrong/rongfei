<?php
/**
 * 新闻软文管理
 * @author lazytech.cc
 */
namespace Admin\Controller;
use Think\Controller;

class WxController extends CommonController{
	
	public function add(){
		$model = M("Wx");
		$cat_id = I('cat_id',0);
		if($model->create()){
			$model->cat_id = $cat_id; //分类id
		    $result = $model->add(); 
		    if($result){
		        $insertId = $result;
		    }
		     $st = 1;
		     $this->ajaxreturn($st);
		} else {
	     $st = 0;
	     $this->ajaxreturn($st);
	   }
	}


	public function editWx(){
		$cat_id = I('cat_id');
		$this->assign('cat_id',$cat_id);  //当前所属分类
        
		
		//获取可选分类
        $condition['pid'] = array(in,getChildrenId(1));

		//下拉分类
		$cats = M('Category')->where($condition)->select();
		$this->assign('cats',$cats);
		
		$wx_id = I('wx_id');
		$model= M('Wx');
		$pk = $model->getpk();
		$wx = $model->where($pk.' ='.$wx_id)->find();
		$this->assign('wx', $wx);
		$this->display('editWx');		
	}

	public function update(){
		$cat_id = I('cat_id');
		$this->assign('cat_id',$cat_id);  //当前分类	
	    	    
	    $wx_id = I('wx_id');
		$model= M('Wx');
		
		$pk = $model->getpk();
		$model->create();
		if($model->where($pk.' ='.$wx_id)->save()) {
			$this->success('更新成功',U('Admin/List/index/type/3',array('cat_id'=>$cat_id)));
		}
			$this->error('更新失败',U('Admin/List/index/type/3',array('cat_id'=>$cat_id)));
	}

	public function del(){
		$wx_id = I('wx_id');
		$model= M('Wx');
		$pk = $model->getpk();
		if($model->where($pk.' ='.$wx_id)->delete()) {
		     $st = 1;
		     $this->ajaxreturn($st);
		 } else {
	     	 $st = 0;
		     $this->ajaxreturn($st);
		 }
	}
	
	public function delAll(){
	    $ids = I('ids');
	    $model= M('Wx');
	    $pk = $model->getpk();
	    $condition[$pk] = array(in,$ids);
	    if($model->where($condition)->delete()) {
	        $this->ajaxReturn(1);
	    } else {
	        $this->ajaxReturn(0);
	   }
	}
}
