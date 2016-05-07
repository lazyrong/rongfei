<?php
namespace Admin\Controller;
use Think\Controller;

class ListController extends CommonController {
    public function index() {
    	
        //查询条件
        $cat_id = I('cat_id',1);
        
        if(getChildrenId($cat_id)) {
            $cats_id = getChildrenId($cat_id);
            $condition['cat_id'] = array(in,$cats_id);
        } else {
            $condition['cat_id'] = $cat_id;
        }
        
		$type = I('type');
		$order = 'pubtime';
		$sort = 'desc';
		$numPerPage = 15;
		$p = I('p',1);		
		$model = null;
        switch ($type) {
            case 1:
                $model = D('news'); // 实例化news对象
                break;
            case 2:
                $model = D('wb'); // 实例化wb对象
                break;                
            case 3:
                $model = D('wx'); // 实例化wx对象
                break;
            case 4:
                $model = D('tb'); // 实例化tb对象
                break;
            default:
                $this->error('你在说什么，我听不懂！');
        }
        
		if($cat_id == 1) {
			// 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
			$resultList = $model->relation(true)->page($p.','.$numPerPage)->order($order.' '.$sort)->select();
			$count      = $model->count();// 查询满足要求的总记录数
			$Page       = new \Think\Page($count,$numPerPage);// 实例化分页类 传入总记录数和每页显示的记录数
			$show       = $Page->show();// 分页显示输出
		} else {
			// 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
			$resultList = $model->relation(true)->where($condition)->page($p.','.$numPerPage)->order($order.' '.$sort)->select();
			$count      = $model->where($condition)->count();// 查询满足要求的总记录数
			$Page       = new \Think\Page($count,$numPerPage);// 实例化分页类 传入总记录数和每页显示的记录数
			$show       = $Page->show();// 分页显示输出
		}
	       

		//模板赋值
		$this->assign('cat_id',$cat_id);  //所属分类
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('resultList',$resultList);
		
		//输出模板
		switch ($type) {
		    case 1:
        		$this->display('news'); 
		        break;
		    case 2:
		        $this->display('wb');
		        break;
		    case 3:
        		$this->display('wx');
		        break;
		    case 4:
        		$this->display('tb');
		        break;
		    default:
		        $this->error('你在说什么，我听不懂！');
		}
    }
}