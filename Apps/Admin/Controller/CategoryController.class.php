<?php
namespace Admin\Controller;
use Think\Controller;

class CategoryController extends CommonController {
    public function index() {
        $cat_id = I('cat_id');
    }

    public function add() {
    	$model = M('Category');
    	if($model->create()){
		    $result = $model->add(); 
		    if($result){
		        $insertId = $result;
		    }
	       $this->ajaxreturn(1);
		} else {
           $this->ajaxreturn(0);
	   }
    }

    public function update(){
    	$cat_id = I('cat_id');
    	$name = I('name');

    	$model = M('Category');
    	$condition['cat_id'] = $cat_id;
    	
    	$model->name = $name;
    	if($model->where($condition)->save()) {
    		$this->ajaxreturn(1);
    	} else {
    		$this->ajaxreturn(0);
    	}

    }

    public function del(){
    	$cat_id = I('cat_id');
		$model= M('Category');
		$pk = $model->getpk();
		$model->where($pk.' ='.$cat_id)->delete();
		$this->success('删除成功');
    }
}