<?php
/**
 * Created by PhpStorm.
 * User: wanqianjun
 * Date: 2017/4/14
 * Time: 下午9:29
 */

namespace app\admin\controller;


use think\Db;

class Classes
{
    public function New()
    {
        $class_name = input('post.class_name');
        $class_for = input('post.class_for');
        $class_content = input('post.class_content');
        $class_end_time = input('post.class_end_time');
        Db::execute("INSERT INTO Class (C_name, C_content,C_for_classes,C_end_time)
                          VALUES (?,?,?,from_unixtime(?))", [$class_name, $class_content, $class_for, $class_end_time]);
        return json(["result" => "success"]);
    }

    public function Get()
    {
        $class_id = input('get.class_id');
        $class_info = Db::query("SELECT * FROM Class WHERE C_Id = ?", [$class_id])[0];
        return json($class_info);
    }

    public function Save()
    {
        $class_id = input('get.class_id');
        $class_name = input('post.class_name');
        $class_for = input('post.class_for');
        $class_content = input('post.class_content');
        $class_end_time = input('post.class_end_time');
        Db::execute("UPDATE Class SET C_name = ?,C_content = ?,C_for_classes = ?,C_end_time = from_unixtime(?) WHERE C_Id = ?", [$class_name, $class_content, $class_for, $class_end_time, $class_id]);
        return json(["result" => "success"]);
    }

    public function Remove()
    {
        $class_id = input('get.class_id');
        Db::execute("delete from Class where C_Id = ?",[$class_id]);
        return json(["result" => "success"]);
    }
}