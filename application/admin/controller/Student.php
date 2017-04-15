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
        $progress_get = [false, false, false];
        $progress_diff = [];
        foreach ($progress_in as $item) {
            $progress_get[$item] = true;
        }
        foreach ($progress_Db as $key => $val) {
            if ($progress_Db[$key] == $progress_get[$key]) {
                $progress_diff[] = "notModify";
            } else {
                if ($progress_Db[$key] == true && $progress_get[$key] == false) {
                    $progress_diff[] = "minus";
                } else {
                    $progress_diff[] = "add";
                }
            }
        }
        foreach ($progress_diff as $key => $operation) {
            $file_info = Db::query("SELECT * FROM File WHERE F_progress = ? AND F_for_class_id = ? AND F_user_id = ?", [$key, $class_id, $student_id]);
            switch ($operation) {
                case "minus":
                    if ($file_info[0]["F_src"] != '/upload/后台修改填充文件.zip') {
                        unlink($file_info[0]["F_src"]);
                    }
                    Db::execute("DELETE FROM File WHERE F_Id = ?", [$file_info[0]["F_Id"]]);
                    break;
                case "add":
                    Db::execute("INSERT INTO File (F_name, F_user_id, F_progress, F_for_class_id, F_src) VALUES (?,?,?,?,?)", ["后台修改填充文件.zip", $student_id, $key, $class_id, "/upload/后台修改填充文件.zip"]);
                    break;
            }
        }
        return json(["result" => "success"]);
    }
}