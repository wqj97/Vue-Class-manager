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
        $file_list = Db::query("select F_progress from File where F_for_class_id = ? and F_user_id = ?",[$class_id,$student_id]);
        $progress = [false,false,false];
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
        $file_list = Db::query("select F_progress from File where F_for_class_id = ? and F_user_id = ?",[$class_id,$student_id]);
        $progress = [false,false,false];
        foreach ($file_list as $item) {
            $progress[$item["F_progress"]] = true;
        }
        var_dump($progress_in);
        foreach ($progress as $key => $val) {
            if ($progress_in[$key] == $val) {
                echo "progress_in: $progress_in[$key] progress[key] $key: progress[val]$val \r\n";

            } else {
                echo " $progress_in[$key] ".$key.": ".$val." 不同";
            }
        }
    }
}