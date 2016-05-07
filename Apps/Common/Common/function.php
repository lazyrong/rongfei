<?php
function list2layer($cats, $pid) {
    $arr = array();
    $pid = intval($pid, 10);
    foreach ($cats as $cat) {
        $cpid = intval($cat['pid'],10);
        if ($cpid == $pid) {
            $cat['children'] = list2layer($cats, $cat['cat_id']);
            $arr[] = $cat;
        }
    }
    return $arr;
}

//从栏目返回子栏目的id数组
function getChildrenId($cat_id) {
    $arr = array();
    $condition['pid']=$cat_id;
    $arr = M('Category')->where($condition)->getField('cat_id',true);
    return $arr;
}

//link_type to text
function link2text($type) {
    $arr = C('link_type_text');
    return $arr[$type];
}
//sl_type to text
function sl2text($type) {
    $arr = C('sl_type_text');
    return $arr[$type];
}