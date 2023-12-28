<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
}

session_start();
error_reporting(0);

include "connection.php";

if(!empty($_SESSION['admin_id']))
{
    echo "<script>window.location.href='user.php'</script>";
}
else
{
    echo "<script>window.location.href='home3.php'</script>";
}
// if (isset($_POST["Cb_username"]) && isset($_POST["Cb_password"])) {
//     $username = mysqli_real_escape_string($db, trim($_POST["Cb_username"]));
//     $password1 = mysqli_real_escape_string($db, md5(trim($_POST["Cb_password"])));
//    $query = mysqli_query($db, "SELECT * FROM technical_staff WHERE Email = '$username' AND Password = '$password1' AND DeletedStatus='0'");
//     $row = mysqli_fetch_array($query);
//     if ($row['Email'] != '') {
//         $_SESSION["login_id"] = $row['cb_user_id'];
//         $_SESSION["user_name"] = $row['Name'];
//         $_SESSION["user_email"] = $row['Email'];
//         if (isset($_SESSION["login_id"])) {
//             header("Location: sagar.php");
//         }
//     } else {
//         header("Location: home3.php?msg=fail");
//     }
// }

if(isset($_POST['Cb_username']) && isset($_POST['Cb_password'])){
    $mail = mysqli_real_escape_string($db,$_POST['Cb_username']);
    $password = md5(trim($_POST['Cb_password']));
    $DeletedStatus = 0;

    // Query to check if the user exists and retrieve user data
    $query = 'SELECT * FROM `technical_staff` WHERE Email="'.$mail.'" AND Password="'.$password.'" AND DeletedStatus="'.$DeletedStatus.'" ';
    $result = mysqli_query($db, $query);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $roleWithoutSpaces = str_replace(' ', '', $row['Role']);

            // information store in sessions
            $_SESSION['admin_email'] = $row['Email'];
            $_SESSION['admin_id'] = $row['Id'];
            $_SESSION['admin_name'] = $row['Name'];
            $_SESSION['admin_role'] = $row['Role'];
            // echo '<div class="alert alert-info mt-3" id="register_en">Employee Login Success Redirect......</div>';
            echo "<script>window.location.href='user.php'</script>";
    } else {
        header("Location: home3.php?msg=fail");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Login</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/login-css/font/icomoon/style.css">
    <link rel="stylesheet" href="assets/css/login-css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login-css/style.css">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        .btn-primary {
            color: #fff;
            /* background-color: #3ba901;
         border-color: #3ba901; */
        }

        .buyer-login .btn {
            height: auto !important;
            padding-left: 30px;
            padding-right: 30px;
            color: #fff !important;
            text-decoration: none !important;
        }
    </style>
</head>

<body>

    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('assets/img/login-bg_1.jpg');"></div>
        <div class="contents order-2 order-md-1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <div class="mb-4">
                            <a href="" style="text-decoration: none;">
                                <h3>LOGIN</h3>
                            </a>
                            <p class="mb-4">Welcome back CB E-Interface.</p>
                        </div>
                        <?php $msg = $_GET['msg']; if($msg == 'fail'){?>
                        <center>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="bs-component">
                                        <div class="alert alert-dismissible alert-danger">
                                            <button class="close" type="button" data-dismiss="alert"
                                                style="float: right;">×</button>Username or Password are wrong.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </center>
                        <?php } ?>
                        <form method="POST" autocomplete="off">
                            <div class="form-group first">
                                <label for="username">Username</label>
                                <input type="email" class="form-control" name="Cb_username" required="">
                            </div>
                            <div class="form-group last mb-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="Cb_password" required="">
                            </div>
                            <input type="submit" value="Log In" class="btn btn-block btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php";?>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <script src="assets/css/login-js/jquery-3.3.1.min.js"></script>
    <script src="assets/css/login-js/popper.min.js"></script>
    <script src="assets/css/login-js/bootstrap.min.js"></script>
    <script src="assets/css/login-js/main.js"></script>
</body>

</html>