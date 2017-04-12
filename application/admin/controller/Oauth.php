<?php
/**
 * Created by PhpStorm.
 * User: wanqianjun
 * Date: 2017/4/13
 * Time: 上午12:38
 */

namespace app\admin\controller;


class Oauth
{
    public function Index()
    {
        $user = input('post.user');
        $pwd = input('post.pwd');
        $admin_user = Server_Setting('admin_user');
        $admin_pwd = Server_Setting('admin_pwd');
        if ($user == $admin_user && $pwd == $admin_pwd) {
            session('Login',true);
            header("location: Class_list.php");
            return json(null,302);
        } else {
            header("location: index.html");
            return json(null,302);
        }
    }
}