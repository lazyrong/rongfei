<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends CommonController {
    
    public function index(){
        //获取顶级目录
        $model = M('Category');
        $cats = $model->order('sort asc')->select();
        $lel1 = $model->where('pid = 0')->select();    
        $cat_id = I('cat_id',$lel1[0]['cat_id']); //当前所属顶级分类，默认为第一个
        
        //获取二级目录树
        $catsList = list2layer($cats,$cat_id);

        $type = $model->where('cat_id ='.$cat_id)->getField('type');//list 模板type
        
        $this->assign('type',$type); //list 当前模板type
        $this->assign('cat_id',$cat_id);//当前顶级分类
        $this->assign('lel1',$lel1);  //顶级分类
        $this->assign('catsList',$catsList); //当前二级及以下分类
        $this->display();
    }
}