<?php
/**
 * @author lazytech.cc
 */
namespace Admin\Controller;
use Think\Controller;

class NewsController extends CommonController{
	
	public function index() {
		$cat_id = I('cat_id',0);
		if($cat_id == 0) {
			$newsList=M('news')->select();
		} else {
			$newsList=M('news')->where('cat_id ='.$cat_id)->select();
		}
		$this->assign('newsList',$newsList);
		$this->display('news');
	}

	public function add(){
		$model = M("News");
		if($model->create()){
			$model->cat_id = 1; //分类id
		    $result = $model->add(); 
		    if($result){
		        $insertId = $result;
		    }
		     $st = 1;
		     $this->ajaxreturn($st);
		}
	     $st = 0;
	     $this->ajaxreturn($st);
	}
	
	public function addNews(){
		$model = M("News")
		$this->display('addNews');		
	}

	public function editNews(){
		$news_id = I('news_id');
		$model= M('News');
		$pk = $model->getpk();
		$news = $model->where($pk.' ='.$news_id)->find();
		$this->assign('news', $news);
		$this->display('editNews');		
	}

	public function update(){
		$news_id = I('news_id');
		$model= M('News');
		$pk = $model->getpk();
		$model->create();
		if($model->where($pk.' ='.$news_id)->save()) {
			$this->success('更新成功',U('Admin/News/index'));
		}
			$this->error('更新失败',U('Admin/News/index'));
	}

	public function del(){
		$news_id = I('news_id');
		$model= M('News');
		$pk = $model->getpk();
		$model->where($pk.' ='.$news_id)->delete();
		$this->success('删除成功');
	}
}
