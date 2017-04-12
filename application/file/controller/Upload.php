<?php
/**
 * Created by PhpStorm.
 * User: wanqianjun
 * Date: 2017/4/10
 * Time: 上午9:25
 */

namespace app\file\controller;


use think\Db;
use think\Debug;

class Upload
{
    public function Index()
    {
        $file = request()->file('file');
        $info = $file->move($_SERVER['DOCUMENT_ROOT'] . '/upload');
        $file_ext = $info->getExtension();
        $file_progress = input('post.progress');
        if (!$this->check_ext($file_ext)) {
            unlink($info->getRealPath());
            return json(["result"=>"failed","reason"=>"不允许的文件格式"],403);
        }
        $file_name = $info->getInfo()["name"];
        $file_src = '/upload/' . date('Ymd') . "/" . $info->getFilename();
        Db::execute("insert into File (F_name, F_user_id, F_src,F_progress) VALUES (?,?,?,?)",[$file_name,session('UID'),$file_src,$file_progress]);
        return json(["result"=>"success"]);
    }

    private function check_ext($ext) {
        $allow_file_type = config('allow_file_type');
        $ext = mb_strtolower($ext);
        return in_array($ext,$allow_file_type);
    }
}