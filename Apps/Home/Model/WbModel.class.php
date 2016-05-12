<?php
/**
 * @author lazytech.cc
 */
namespace Home\Model;
use Think\Model\RelationModel;
class WbModel extends RelationModel{
    protected $_link = array(
        'CategoryName'=>array(
            'mapping_type'      => self::BELONGS_TO,
            'class_name'        => 'Category',
            'mapping_fields'  => 'name',
            'foreign_key'   => 'cat_id',
            'mapping_name'  => 'cat_name',            
            ),
        );
}
