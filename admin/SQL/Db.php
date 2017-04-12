<?php

/**
 * Created by PhpStorm.
 * User: wanqianjun
 * Date: 2017/3/30
 * Time: 下午3:56
 */
class Db
{
    private $_host = '127.0.0.1';
    private $_user = 'root';
    private $_pwd = 'wqj9705';
    private $_db = 'class_adminer';
    protected $sql;

    function __construct()
    {
        session_start();
        if (!isset($_SESSION['think']['Login'])) {
            header("location: index.html");
            echo $_SESSION['think']['Login'];
            exit();
        }
        $this->sql = new mysqli($this->_host, $this->_user, $this->_pwd, $this->_db);
        $this->sql->query("set names utf8");
    }

    public function query($query)
    {
        $result = $this->sql->query($query);
        if ($this->sql->error) {
            echo $this->sql->error;
            throw new Exception();
        }
        return $result->fetch_all(1);
    }
}