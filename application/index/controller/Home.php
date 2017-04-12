<?php
/**
 * Created by PhpStorm.
 * User: wanqianjun
 * Date: 2017/4/10
 * Time: 下午11:31
 */

namespace app\index\controller;


use think\Db;

class Home
{
    public function Index()
    {
        $user_info = Db::query("select S_name,S_number,S_class from Student where S_Id = ?",[session('UID')])[0];
        $class_info = Db::query("select C_name,C_content from Class where C_for_classes like ? and C_end_time > current_timestamp()",['%'.$user_info["S_class"].'%'])[0];
        return json(["user_info" => $user_info, "class_info" => $class_info]);
    }

    public function Classes() {

    }

    public function test()
    {
     $obj = ["课前预习测试","课堂练习测试","课后练习测试"]  ;
     return json($obj);
    }
}