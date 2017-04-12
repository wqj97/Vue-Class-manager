<?php
/**
 * Created by PhpStorm.
 * User: wanqianjun
 * Date: 2017/4/12
 * Time: 下午4:55
 */

namespace app\user\controller;


use think\Db;
use think\Debug;

class ClassInfo
{
    public function Index()
    {
        $student_id = session('UID');
        if (empty($student_id)) {
            return json(["result" => "未登录"], 403);
        }
        $student_class = Db::query("SELECT S_class FROM Student WHERE S_Id = ?", [$student_id])[0]["S_class"];
        $class_info = Db::query("SELECT C_Id,C_name,C_content FROM Class WHERE C_end_time > current_timestamp AND C_for_classes LIKE ?", ['%' . $student_class . '%'])[0];
        $finish_state = Db::query("select F_progress from File where F_for_class_id = '$class_info[C_Id]'");
        $class_info["finish_state"] = [false,false,false];
        foreach ($finish_state as $state) {
            $class_info["finish_state"][$state["F_progress"]] = true;
        }
        return json($class_info);
    }
}