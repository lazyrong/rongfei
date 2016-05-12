<?php
/**
 * 新闻软文管理
 * @author lazytech.cc
 */
namespace Admin\Controller;
use Think\Controller;

class NewsController extends CommonController{
	
	public function add(){
		$model = M("News");
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

	
	public function addNews(){
		$cat_id = I('cat_id');
		$this->assign('cat_id',$cat_id);  //当前所属分类
        
		$this->display('addNews');		
	}

	public function editNews(){
		$cat_id = I('cat_id');
		$this->assign('cat_id',$cat_id);  //当前所属分类
        
		
		//获取可选分类
        $condition['pid'] = array(in,getChildrenId(1));

		//下拉分类
		$cats = M('Category')->where($condition)->select();
		$this->assign('cats',$cats);
		
		$news_id = I('news_id');
		$model= M('News');
		$pk = $model->getpk();
		$news = $model->where($pk.' ='.$news_id)->find();
		$this->assign('news', $news);
		$this->display('editNews');		
	}

	public function update(){
		$cat_id = I('cat_id');
		$this->assign('cat_id',$cat_id);  //当前分类	
	    	    
	    $news_id = I('news_id');
		$model= M('News');
		
		$pk = $model->getpk();
		$model->create();
		if($model->where($pk.' ='.$news_id)->save()) {
			$this->success('更新成功',U('Admin/List/index/type/1',array('cat_id'=>$cat_id)));
		}
			$this->error('更新失败',U('Admin/List/index/type/1',array('cat_id'=>$cat_id)));
	}

	public function del(){
		$news_id = I('news_id');
		$model= M('News');
		$pk = $model->getpk();
		if($model->where($pk.' ='.$news_id)->delete()) {
		     $st = 1;
		     $this->ajaxreturn($st);
		 } else {
	     	 $st = 0;
		     $this->ajaxreturn($st);
		 }
	}
	
	public function delAll(){
	    $ids = I('ids');
	    $model= M('News');
	    $pk = $model->getpk();
	    $condition[$pk] = array(in,$ids);
	    if($model->where($condition)->delete()) {
	        $this->ajaxReturn(1);
	    } else {
	        $this->ajaxReturn(0);
	   }
	}
}
