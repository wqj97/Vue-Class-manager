<?php
require_once "./SQL/Db.php";
$Db = new Db();
$start = isset($_GET['page']) ? $_GET['page'] : 0;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>课堂管理系统</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link href="//cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
  <link href="//cdn.bootcss.com/ionicons/2.0.1/css/ionicons.css" rel="stylesheet">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/skin-black.min.css">
</head>
<body class="hold-transition skin-black sidebar-mini">
<div class="wrapper">
  <!-- Main Header -->
  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>课堂</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>课堂</b>管理系统</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"></a>
      <!-- Navbar Right Menu -->
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>课堂管理员</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">菜单</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="treeview active">
          <a href="#"><i class="glyphicon glyphicon-cog"></i> <span>实验管理</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active">
              <a href="Class_list.php"><i class="glyphicon glyphicon-list-alt"></i>实验列表</a>
            </li>
            <li>
              <a href="Student_class_state.php"><i class="glyphicon glyphicon-cloud-upload"></i>学生完成情况</a>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="Student.php"><i class="glyphicon glyphicon-info-sign"></i> <span>学生信息管理</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right" style="transform: none"></i>
            </span>
          </a>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        实验管理
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="glyphicon glyphicon-cog"></i> 实验管理</a></li>
        <li class="active">实验列表</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Your Page Content Here -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">实验列表</h3>
          <h3>
            <button class="btn btn-primary">新建实验</button>
          </h3>
          <div class="box-tools">
            <ul class="pagination pagination-sm no-margin pull-right">
              <li><a href="#">«</a></li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">»</a></li>
            </ul>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tbody>
            <tr>
              <th>实验名</th>
              <th>实验面向班级</th>
              <th>实验创建时间</th>
              <th>实验结束时间</th>
              <th>操作</th>
            </tr>
            <tr>
                <?php
                $class_list = $Db->query("select * from Class ORDER BY C_Id DESC LIMIT $start,12");
                foreach ($class_list as $class) {
                    echo "<tr><td>$class[C_name]</td>";
                    echo "<td>$class[C_for_classes]</td>";
                    echo "<td>$class[C_join_time]</td>";
                    echo "<td>$class[C_end_time]</td>";
                    echo "<td>
                    <div class=\"btn-group\">
                      <button type=\"button\" class=\"btn btn-info\" onclick='edit($class[C_Id])'>修改</button>
                      <button type=\"button\" class=\"btn btn-danger\" onclick='remove($class[C_Id])'>删除</button>
                    </div>
                  </td></tr>";
                }
                ?>
            </tr>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
    </section>
    <!-- /.content -->
  </div>
</div>

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3.2.1 -->
<script src="plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>

</body>
</html>
