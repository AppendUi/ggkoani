<?php
error_reporting(E_ALL ^ E_DEPRECATED);

include('db_connection.php');
$db = new DB_FUNCTIONS();

if (isset($_POST['submit'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $user = $db->attempt_login($email,$password);

    if($user){
        session_start();
        $_SESSION["username"] = $user["username"];
        $_SESSION["s_email"] = $user["s_email"];
        $_SESSION["user_role"] = $user["user_role"];
        
        if($user["user_role"] == "teacher"){
            $db->redirect_to("../hellosam/attendance/manual_attendance.php");
        }
       
    }
    else{
        echo "<script>alert('Incorrect Password!');</script>";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Login</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../hellosam/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="../hellosam/assets/css/animate.min.css" rel="stylesheet"/>
    <link href="../hellosam/assets/css/style.css" rel="stylesheet" type='text/css' />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../hellosam/assets/css/demo.css" rel="stylesheet" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="../hellosam/assets/css/material-icons.css" rel='stylesheet' type='text/css'>
</head>
<body class="login-page">
<div class="login-box">
    <div class="login-box-body">
        <div class="panel-header">
            <h2 class="text-center">
               <p>Teacher</p>
                <a href="../hellosam/teacherlogin.php" class="logo">
                    <img src="../hellosam/assets/img/teacherlogo.png" alt="Logo" >
                </a>
            </h2>
        </div>
        <form action="teacherlogin.php" method="post">
            <div class="form-group has-feedback">
                <div class="input-group">
                    <input type="text" name="email" id="email" class="form-control" placeholder="Username">
                    <div class="input-group-addon"><i class="material-icons">person</i></div>
                </div>
            </div>
            <div class="form-group has-feedback">
                <div class="input-group">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <div class="input-group-addon"><i class="material-icons">lock</i></div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" name="submit" class="btn btn-block login-btn">
                        <center>Login</center>
                    </button>
                </div>
            </div>
        </form>
        <!-- /.social-auth-links -->
        <!-- <div class="row ">
            <br />
            <div class="col-md-6">
                <a href="forgot-pass.php">Forgot Password</a>
            </div>
        </div> -->
    </div>
    <!-- /.login-box-body -->
</div>

</body>
<!--   Core JS Files   -->
<script src="../hellosam/assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../hellosam/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../hellosam/assets/js/common.js"></script>
</html>