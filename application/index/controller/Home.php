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
        return json(Db::query("select S_name,S_number,S_class from Student where S_Id = ?",[session('UID')]));
    }
}