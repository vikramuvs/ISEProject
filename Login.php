<?php
    session_start();
    ini_set('display_errors', 'On');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<style type="text/css">
	.login-form {
		width: 340px;
    	margin: 50px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
<body>
<div class="login-form">
    <form action="Login.php" method="POST">
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" required="required" name="Username">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" required="required" name="Password">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" name="btnLogin">Log in</button>
        </div>
     </form>
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
            header('Location: NewRecord_final.php'); 
        
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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>


</html>                                		                            \