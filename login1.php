
<?php
    session_start();
    ini_set('display_errors', 'On');
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="description" content="Login Page">
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
                   <label style="color: white; font-size: 27pt;">Log</label>  <label style="color: white; font-style: bold; font-weight: bold; font-size: 27pt;">In</label>
                </div>
                <div class="login-form">
                    <form method="POST">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" class="form-control" placeholder="User Name" name="Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="Password">
                        </div>
                        <!-- <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                            <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label>

                        </div> -->
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="btnLogin">Sign in</button>
                        <!-- <div class="social-login-content">
                            <div class="social-button">
                                <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Sign in with facebook</button>
                                <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Sign in with twitter</button>
                            </div>
                        </div> -->
                        <div class="register-link m-t-15 text-center">
                            <p>Don't have account ? <a href="register.php"> Sign Up Here</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php


/*$link = mysql_connect(
   "$host:$port", 
   $user, 
   $password
);*/

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnLogin']))
    {
        func();
    }
    
    function func()
    {
        $user = 'root';
        $password = 'root';
        $db = 'Users';
        $host = 'localhost';
        $port = 3306;

        $userName = $_POST['Username'];
        $userPassword =  $_POST['Password'];
        // Create connection
        //$conn = new mysqli($host, $user, $password, $db);
        $conn = mysqli_connect($host, $user, $password, $db);

        // Check connection
        //if ($conn->connect_error) {

        //if (mysqli_connect_errno()) {
           // die("Connection failed: " . mysqli_connect_error());
           // exit();
        //} 
        //echo "Connected successfully";

        $sql = "SELECT Dept_ID, UserLevel FROM tbl_Users where UserName = '$userName' and Password = '$userPassword'";

        //$stmt = $conn->prepare($sql);
        //$stmt->execute();

        // $stmt->bind_param('ss', $userName, $userPassword);
        // $stmt->execute();
        //$result = $stmt->get_result();
        // $user = $result->fetch_object();

        //$result = $conn->query($sql);
        //$result = mysql_fetch_array(['Dept_ID']]);

        $result = mysqli_query($conn, $sql);
        //$row = mysqli_fetch_array($result);
        $row = mysqli_fetch_row($result);
        //$row = mysqli_fetch_assoc($result);
        //print_r($row[1]);

        //if (is_array($row))
        //{
           $_SESSION["userName"] = $userName;
           $_SESSION["userDeptID"] = $row[0];
           $_SESSION["userLevel"] = $row[1];
        //}

        //else
        //{
          //  echo "Invalid credentials. Try again.";
        //}
        //$_SESSION["userDeptID"] = $row['ID'];

        // echo $_SESSION["userDeptID"];
        if (isset($_SESSION["userDeptID"]) && isset($_SESSION["userName"]))
            header('Location: index.php'); 
        
        //$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        //$active = $row['active'];

        //$count = mysqli_num_rows($result);

        // if ($count == 1)
        // {
        //     session_register("myusername");
        //     $_SESSION[''] 
        // }
        //$rows = mysqli_num_rows($result);

        //if (!$result) {
          //  echo 'Could not run query: ' . mysqli_error();
           // exit;
        //}
        //while ($row = mysqli_fetch_assoc($result) > 0) 
        
        // if ($rows >= 0)
        // {
        //     while ($rowVal = mysqli_fetch_assoc($result))
        //     {
            
        //     }
            
        // }

        //echo $row['Dept_ID']; // dept_id
        //echo $row[1]; // the email value

        //if ($row) {
            //echo 'Success';
           // $_SESSION["userDeptID"] = $row[0] ; 
           // echo $_SESSION["userDeptID"];
            //header('Location: NewRecord_final.php'); 
            
        //} else {
        //    echo "Invalid Credentials. Please try again.";
        //}
        $conn->close();

        }
        ?>


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


</body>
</html>
