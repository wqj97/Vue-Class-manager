<?php
/**
 * Created by PhpStorm.
 * User: wanqianjun
 * Date: 2017/4/10
 * Time: 上午9:25
 */

namespace app\file\controller;


use think\Db;

class Upload
{
    public function Index()
    {
        $file = request()->file('file');
        $info = $file->getFileInfo();
        $file_ext = $info->getExtension();
        if (!$this->check_ext($file_ext)) {
            return json(["result"=>"failed","reason"=>"不允许的文件格式"],403);
        }
        $info = $file->move($_SERVER['DOCUMENT_ROOT'] . '/upload');
        $file_name = $info->getFilename();
        echo $file_name;
//        $file_src = '/upload/' . date('Ymd') . "/" . $info->getFilename();
//        Db::execute("insert into File (F_name, F_user_id, F_src) VALUES (?,?,?)",[]);
    }

    private function check_ext($ext) {
        $allow_file_type = config('allow_file_type');
        return in_array($ext,$allow_file_type);
    }
}