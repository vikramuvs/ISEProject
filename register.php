<?php
session_start();
ini_set('display_errors', 'On');

if (isset($_SESSION["userDeptID"]) && isset($_SESSION["userName"]))
    header('Location: index.php'); 

//$con = mysqli_connect('localhost', 'root', 'root', 'Users');

include('dbi.php');
include('encryption.php');
include('mailer.php');

if(isset($_POST['registerBtn']))
{
    $uname = $_POST['uname']."@msrit.edu";
   // $pass = "";
    $deptID = $_POST['deptID_register'];
    $verifyCode = md5(rand());

    if ($_POST['pass'] ==  $_POST['confirmPass'])
       $pass = $_POST['confirmPass'];
    else
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  Passwords do not match. Please try again.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';

    $query = "INSERT INTO tbl_Users(UserName, Password, UserLevel, verifyCode, Dept_ID) VALUES ('$uname', '$pass', 'U', '$verifyCode', ".$deptID.")";
    mysqli_query($connection, $query);
    $r = mailfn($uname, $verifyCode);

    if ($r)
        echo '<div class="alert  alert-success alert-dismissible fade show" role="alert">
                  An email has been sent to your email address. Kindly click on the link in the email to verify your email id.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                  </button>
         </div>';
    else
         echo '<div class="alert  alert-danger alert-dismissible fade show" role="alert">
                  Oops system encountered error in sending email. Kindly contact system administrator.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                  </button>
         </div>';
}

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>New User Registration Page</title>
    <meta name="description" content="User Registration Page">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                  <label style="color: white; font-size: 27pt;">User</label>  <label style="color: white; font-style: bold; font-weight: bold; font-size: 27pt;">Registration</label>
                </div>
                <div class="login-form">
                    <form method="POST">
                        <div class="form-group">
                            <label style="color: Black;">Select your department</label>
                                                     <select name="deptID_register" id="selectDept" class="form-control" tabindex="1" required>
                                                        <option value="">Select Department</option>
                                                        <?php
                                                                try {
                                                                $pdo = new PDO('mysql:host=localhost;dbname=Users', 'root', 'root');
                                                                }

                                                                catch(PDOException $pe) {
                                                                    echo 'not connected';
                                                                }

                                                                $ddl_query = "SELECT dept_ID, dept_Name from tbl_Dept";
                                                                $stmt = $pdo->prepare($ddl_query);
                                                                $stmt->execute();
                                                                $results = $stmt->fetchAll();

                                                                foreach($results as $row)
                                                                echo '<option value="' .$row['dept_ID'].'">' .$row['dept_Name'].'</option>';
                                                         ?>
                                                    </select>
                        </div>
                        <div class="form-group">
                            <label style="color: Black;">Email address</label><label style="font-size: 11px; text-transform: none; margin-left: 10px;">    Please enter your msrit.edu email id</label>
                            <div style="display: flex;"><input type="text" name="uname" class="form-control" placeholder="Email" style="width: 65%;" required="required"><label style="text-transform: none; margin-top:5px;">@msrit.edu</label>
                        </div>
                    </div>
                        <div class="form-group">
                            <label style="color: Black;">Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="pass" required="required">
                        </div>
                         <div class="form-group">
                            <label style="color: Black;">Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Confirm Password" name="confirmPass" required="required">
                        </div>
                        <!-- <div class="checkbox">
                            <label>
                                <input type="checkbox"> Agree the terms and policy
                            </label>
                        </div> -->
                        <button type="submit" name="registerBtn" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
                      <!--   <div class="social-login-content">
                            <div class="social-button">
                                <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Register with facebook</button>
                                <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Register with twitter</button>
                            </div>
                        </div> -->
                        <div class="register-link m-t-15 text-center">
                            <p>Already have account ? <a href="login.php"> Sign in</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


</body>
</html>
