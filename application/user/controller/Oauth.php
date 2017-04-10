<?php
/**
 * Created by PhpStorm.
 * User: wanqianjun
 * Date: 2017/4/10
 * Time: 上午9:27
 */

namespace app\user\controller;


use think\Db;

class Oauth
{
    /**
     * @post number 学号
     * @post pwd 密码
     * @return \think\response\Json
     */
    public function Index()
    {
        $number = input('post.number');
        $pwd = input('post.pwd');
        $stydent_in_db = Db::query("SELECT * FROM Student WHERE S_number = ? AND S_pwd = ?", [$number, $pwd]);
        if (empty($stydent_in_db)) {
            return json(["result" => "failed"], 403);
        } else {
            session('UID',$stydent_in_db[0]["S_Id"]);
            return json(["result" => "success"]);
        }
    }
}