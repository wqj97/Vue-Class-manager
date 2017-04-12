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
            <li>
              <a href="Class_list.php"><i class="glyphicon glyphicon-list-alt"></i>实验列表</a>
            </li>
            <li class="active">
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
        学生完成情况
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
            <select class="form-control">
                <?php
                $class_list = $Db->query("SELECT * FROM Class WHERE C_end_time > current_timestamp()");
                foreach ($class_list as $class) {
                    echo "<option value='$class[C_Id]'>$class[C_name]</option>";
                }
                $class_list = isset($_GET['class_id']) ? $_GET['class_id'] : $class_list[0];
                ?>
            </select>
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
              <th>参与实验学生</th>
              <th>课前完成情况</th>
              <th>课堂完成情况</th>
              <th>课后完成情况</th>
              <th>操作</th>
            </tr>
            <tr>
                <?php
                $student_list = [];
                foreach (json_decode($class_list["C_for_classes"]) as $classroomNum) {
                    $student_list_In_db = $Db->query("select * from Student where S_class = $classroomNum ORDER BY S_class DESC");
                    foreach ($student_list_In_db as $studen_each) {
                      $student_list[] = $studen_each;
                    }
                }
                function isFinished ($key) {
                    if (empty($student_class_state)) {
                        return false;
                    }
                    foreach ($student_class_state as $progress => $val) {
                        if ($progress == $key) {
                            return true;
                        }
                    }
                    return false;
                }
                foreach ($student_list as $student) {
                    $student_class_state = $Db->query("select F_progress from File where F_user_id = $student[S_Id] and F_for_class_id = $class_list[C_Id]");

                    echo "<tr><td>$student[S_name]</td>";
                    for ($i = 0; $i < 3; $i++) {
                      if (isFinished($i)){
                          echo "<td><span class=\"badge bg-green\">完成</span></td>";
                      } else {
                          echo "<td><span class=\"badge bg-red\">未完成</span></td>";
                      }
                    }
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
