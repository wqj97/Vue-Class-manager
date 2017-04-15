<?php
/**
 * Created by PhpStorm.
 * User: wanqianjun
 * Date: 2017/4/15
 * Time: 上午1:34
 */

namespace app\admin\controller;


use think\Db;
use think\Debug;

class Student
{
    public function progress()
    {
        $class_id = input('get.class_id');
        $student_id = input('get.student_id');
        $file_list = Db::query("SELECT F_progress FROM File WHERE F_for_class_id = ? AND F_user_id = ?", [$class_id, $student_id]);
        $progress = [false, false, false];
        foreach ($file_list as $item) {
            $progress[$item["F_progress"]] = true;
        }
        return json($progress);
    }

    public function progress_update()
    {
        $class_id = input('post.class_id');
        $student_id = input('post.student_id');
        $progress_in = json_decode(input('post.progress'));
        $file_list = Db::query("SELECT F_progress FROM File WHERE F_for_class_id = ? AND F_user_id = ?", [$class_id, $student_id]);
        $progress_Db = [false, false, false];
        foreach ($file_list as $item) {
            $progress_Db[$item["F_progress"]] = true;
        }
        $progress_get = [false,false,false];
        $progress_diff = [];
        foreach ($progress_in as $item) {
            $progress_get[$item] = true;
        }
        foreach ($progress_Db as $key => $val) {
//            if ($progress_Db)
            //TODO: 对比$progress_Db 和 $progress_get 区别然后压入 $progress_diff
        }
    }
}