<?php
    
    session_start();
	
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
	//end of dropdown code initialisation

	//beginning of form submit code
	if(isset($_POST['submit']))
        {
	ini_set('display_errors', 'On');

	$con = mysqli_connect('localhost', 'root', 'root', 'Users');

	if ($con->connect_error)
	{
		echo 'Not Connected to Sql Server' . $con->connect_error;
	}
	/*if (!mysqli_select_db($con, 'Users'))
		echo 'Database not selected';*/
   // $senderName = mysqli_real_escape_string($con, $_POST['senderName']);
    //$senderDept = mysqli_real_escape_string($con, $_POST['senderDept']);
   // $recepientName = mysqli_real_escape_string($con, $_POST['recepientName']);
   // $recepientDept = mysqli_real_escape_string($con, $_POST['recepientDept']);
   // $outwardNo = mysqli_real_escape_string($con, $_POST['outwardNo']);
    $mvtDate = mysqli_real_escape_string($con, $_POST['mvtDate']);
   // $inwardDate = mysqli_real_escape_string($con, $_POST['inwardDate']);
    $mode = mysqli_real_escape_string($con, $_POST['mode']);
    //$mvtType = mysqli_real_escape_string($con, $_POST['inline-radios']);
    $refNo = mysqli_real_escape_string($con, $_POST['refNo']);
    //$inwardNo = mysqli_real_escape_string($con, $_POST['inwardNo']);
    $subject = mysqli_real_escape_string($con, $_POST['subject']);
    $content = mysqli_real_escape_string($con, $_POST['content']);

	/*$senderName  = $_POST['senderName'];
	$recepientName = $_POST['recepientName'];
	$outwardNo = $_POST['outwardNo'];
	$outwardDate = $_POST['outwardDate'];
	$inwardDate = $_POST['inwardDate'];
	$refNo = $_POST['refNo'];
	$inwardNo = $_POST['inwardNo'];
	$subject = $_POST['subject'];*/

	// $sql = "INSERT INTO tbl_Records (SenderDept ,SenderName, RecepientDept ,RecepientName, OutwardNo, OutwardDate, Mode ,InwardDate, RefNo, InwardNo, Subject, Status, EntryDate)
	// VALUES ('$senderDept', '$senderName', '$recepientDept' ,'$recepientName', '$outwardNo', STR_TO_DATE('$outwardDate','%d/%m/%Y'), '$Mode' , STR_TO_DATE('$inwardDate','%d/%m/%Y'), '$refNo', '$inwardNo', '$subject', 'P', now() )";

   // $sql = "";

    // if ($mvtType == "Inward")
    // {
    //     $senderDept =  mysqli_real_escape_string($con, $_POST['deptID']);
    //     $senderName = mysqli_real_escape_string($con, $_POST['name']);
        
    //     if(!isset($_SESSION["userName"]))
    //         header('Location: Login.php');
        
    //     else
    //     {
    //         $recepientName = $_SESSION["userName"];
    //         $recepientDept = $_SESSION["userDeptID"];
    //     }

    //     $sql = "INSERT INTO tbl_Records (EntryDate, Subject, RefNo, Mode, SenderDept, SenderName, RecepientName, RecepientDept, InwardDate, MvtType) VALUES (now(), '$subject', '$refNo', '$mode' ,'$senderDept', '$senderName', '$recepientName', '$recepientDept', STR_TO_DATE('$mvtDate','%d/%m/%Y'), '$mvtType')";
        
    //     //$result = $con->query($sql);
    //     //$result = ;

    //     if (!mysqli_query($con, $sql))
    //     {
    //         //echo 'inwardfail--' . 'sendername-' . $senderName . 'senderdept-'. $senderDept . 'recepientdept-' . $recepientDept . 'recepientname-' .$recepientName . 'mvtdate-' .$mvtDate . '<br/>';
    //         echo 'sql = ' . $sql . 'error' . mysqli_error($con);
    //     }
    //     else
    //     {
    //         //echo 'inwardsuccess' . $senderName . $senderDept . $recepientDept . $recepientName .$mvtDate;
    //         echo '<script type="javascript">'.  'alert("record added succesfully");' . '</script>';
    //     }
    // }

    // else if ($mvtType == "Outward")
    // {
        $recepientDept =  mysqli_real_escape_string($con, $_POST['deptID']);
        $recepientName = mysqli_real_escape_string($con, $_POST['name']);
        
        if(!isset($_SESSION["userName"]))
            header('Location: Login.php');
        else
        {
            $senderName = $_SESSION["userName"];
            $senderDept = $_SESSION["userDeptID"];
        }

        $sql = "INSERT INTO tbl_Records (EntryDate, Subject, RefNo, Mode, SenderDept, SenderName, RecepientName, RecepientDept, OutwardDate, Content) VALUES (now(), '$subject', '$refNo', '$mode' ,'$senderDept', '$senderName', '$recepientName', '$recepientDept', STR_TO_DATE('$mvtDate','%d/%m/%Y'), '$content')";
       
       // $result = $con->query($sql);
        $result = mysqli_query($con, $sql);

        $last_id = mysqli_insert_id($con);
        
        if (!$result)
            {
                //echo 'outwardfail' . $senderName . $senderDept . $recepientDept . $recepientName .$mvtDate;
                echo 'sql = ' . $sql . 'error' . mysqli_error($con);
            }
        else
            {
                 if (isset($_POST["cbCC"]))
                {
                    $multiselect_values = array();
                    $arrayLength = 0;

                    if (isset($_POST["cc_deptID"]))
                    {
                        $multiselect_values = $_POST["cc_deptID"];
                        $arrayLength = count($multiselect_values);
                    }   
                        if ($arrayLength>0) 
                        {
                            $query1 = "INSERT INTO tbl_Orig_Recepient (record_id, from_user_id, to_user_id, record_sent_date, table_entry_date, read_or_not) VALUES ('$last_id', '$senderDept', '$recepientDept', now(), now(), 'No');";
                            $result1 = mysqli_query($con, $query1);

                            for ($i=0; $i<$arrayLength; $i++)
                                {
                                    $current_dept_id = $multiselect_values[$i];
                                    $q = "INSERT INTO tbl_Recepients (record_id, sender_id, receiver_id, sent_date, entry_into_table_date, read_or_not, intended_or_copy_recepient) VALUES ('$last_id', '$senderDept', '$current_dept_id', now(), now(), 'No', 'Copy');";
                                    $r = "INSERT INTO tbl_CC_Recepient (record_id, from_user_id, to_user_id, sent_date, table_entry_date, read_or_not) VALUES ('$last_id', '$senderDept', '$current_dept_id', now(), now(), 'No');";
                                     $res1 = mysqli_query($con, $q);
                                     $res2 = mysqli_query($con, $r);
                                      echo '<script type="text/javascript">'.  'alert("Record added succesfully");' . '</script>';
                                }
                        }
                        else
                            echo '<script type="text/javascript">'.  'alert("Please select atleast one department");' . '</script>';
                }

                else
                    {
                            $q1 = "INSERT INTO tbl_Recepients (record_id, sender_id, receiver_id, sent_date, entry_into_table_date, read_or_not, intended_or_copy_recepient) VALUES ('$last_id', '$senderDept', '$recepientDept', now(), now(), 'No', 'Intended' );";
                            $q2 = "INSERT INTO tbl_Orig_Recepient (record_id, from_user_id, to_user_id, record_sent_date, table_entry_date, read_or_not) VALUES ('$last_id', '$senderDept', '$recepientDept', now(), now(), 'No');";
                            $res1 = mysqli_query($con, $q1);
                            $res2 = mysqli_query($con, $q2);
                            // echo 'outwardsuccess' . $senderName . $senderDept . $recepientDept . $recepientName .$mvtDate;
                            echo '<script type="text/javascript">'.  'alert("Record added succesfully");' . '</script>';
                     }
            }
    // }

    //VALUES ('$senderDept', '$senderName', '$recepientDept' ,'$recepientName', '$outwardNo', STR_TO_DATE('$outwardDate','%d/%m/%Y'), '$Mode' , STR_TO_DATE('$inwardDate','%d/%m/%Y'), '$refNo', '$inwardNo', '$subject', 'P', now() )";

	// if (!mysqli_query($con,$sql))
	
    mysqli_close($con);
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
    <title>New Record</title>
    <meta name="description" content="New Record">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!--<link rel="stylesheet" href="css/bootstrap-multiselect.css">
     <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
     <link rel="stylesheet" href="assets/css/select2.min.css"/> 
   <!-- <link rel="stylesheet" href="jquery-ui/jquery-ui.css">--> 
    <script src="js/jquery.js" ></script>
   <!--  <script src="jquery-ui/jquery-ui.min.js"></script> -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand"><img src="images/logo_ramaiah.png" alt="Logo"></a>
               <!--  <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a> -->
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Actions</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Records</a>
                        <ul class="sub-menu children dropdown-menu">
                         <?php
                            if (isset($_SESSION["userLevel"]))
                            {
                                if ($_SESSION["userLevel"] == "A")
                                {
                                    //Admin Menu Entries get loaded
                                    echo '<li><i class="fa fa-puzzle-piece"></i><a href="NewRecord_final.php">Add New Record</a></li>
                                            <li><i class="fa fa-id-badge"></i><a href="PendingRecords.php">Pending Records</a></li>
                                            <li><i class="fa fa-bars"></i><a href="#">Approved Records</a></li>
                                            <li><i class="fa fa-share-square-o"></i><a href="#">Deleted Records</a></li>' . 

                                            '<li class="menu-item-has-children dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Admin Actions</a>
                                        <ul class="sub-menu children dropdown-menu">
                                            <li><i class="fa fa-table"></i><a href="#">Test</a></li>
                                            <li><i class="fa fa-table"></i><a href="#">Test</a></li>
                                        </ul>
                                    </li>';
                                }

                                else if ($_SESSION["userLevel"] == "U")
                                {
                                    //User Menu Entris get loaded
                                    echo '<li><i class="fa fa-puzzle-piece"></i><a href="NewRecord_final.php">Add New Record</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="inward_11.php">List of Inward Records</a></li>
                            <li><i class="fa fa-bars"></i><a href="OutwardRecords.php">List of Outward Records</a></li>';
                                }
                            }

                            else 
                                header('Location: Login.php');
                         ?>
                           <!--  <li><i class="fa fa-puzzle-piece"></i><a href="NewRecord_final.php">Add New Record</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="PendingRecords.php">Pending Records</a></li>
                            <li><i class="fa fa-bars"></i><a href="#">Approved Records</a></li>
                            <li><i class="fa fa-share-square-o"></i><a href="#">Deleted Records</a></li> -->
                            <!-- <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html">Cards</a></li>
                            <li><i class="fa fa-exclamation-triangle"></i><a href="ui-alerts.html">Alerts</a></li>
                            <li><i class="fa fa-spinner"></i><a href="ui-progressbar.html">Progress Bars</a></li>
                            <li><i class="fa fa-fire"></i><a href="ui-modals.html">Modals</a></li>
                            <li><i class="fa fa-book"></i><a href="ui-switches.html">Switches</a></li>
                            <li><i class="fa fa-th"></i><a href="ui-grids.html">Grids</a></li>
                            <li><i class="fa fa-file-word-o"></i><a href="ui-typgraphy.html">Typography</a></li> -->
                        </ul>
                    </li>
                   
                    <!-- <li class="menu-item-has-children active dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Test Menu Entry</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="#">Test</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="#">Test</a></li>
                        </ul>
                    </li> -->
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                       <!--  <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div> 

                        <div class="dropdown for-notification">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            <span class="count bg-danger">5</span>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="notification">
                            <p class="red">You have 3 Notification</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-check"></i>
                                <p>Test notif 1.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Test notif 2</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <i class="fa fa-warning"></i>
                                <p>Test notif 3.</p>
                            </a>
                          </div>
                        </div>-->

                        <div class="dropdown for-message">
                          <button class="btn btn-secondary dropdown-toggle notif" type="button"
                                id="message">
                            <i class="ti-email"></i>
                            <span class="count bg-primary notif_count">0</span>
                          </button>
                         <!--  <div class="dropdown-menu" aria-labelledby="message">
                            <p class="red">You have 4 Messages</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Test name</span>
                                    <span class="time float-right">Test time</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">TN 2</span>
                                    <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">TN 3</span>
                                    <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-3" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">TN 4</span>
                                    <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                          </div> -->
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="Images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="#"><i class="fa fa-user"></i>My Profile</a>

                               <!--  <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a> 

                                <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>-->

                                <a class="nav-link" href="Logout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                  <!--   <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language" >
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div> -->

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>New Record</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active"><a href="forms-basic.php">New Record</a></li>

                        </ol>
                    </div>
                </div>
            </div>
        </div>

         

        <div class="content mt-3">
            <div class="animated fadeIn">
                <form action="NewRecord_final.php" method="post">

                    <div class="row">
            <div class="col-lg-6">
               <!--  <div class="card">
                    <div class="card-header">
                        <strong>Select type of movement</strong>
                    </div>
                    <div class="card-body card-block">
                        <div class="row">
                            <div class="col col-md-4">
                                <label class=" form-control-label">Select type of movement</label>
                            </div>
                            <div class="col col-md-8">
                              <div class="form-check-inline form-check">
                                <label for="inline-radio1" class="form-check-label ">
                                  <input type="radio" id="inline-radio1" name="inline-radios" value="Inward" class="form-check-input" required>Inward
                                </label> &nbsp; &nbsp;
                                <label for="inline-radio2" class="form-check-label ">
                                  <input type="radio" id="inline-radio2" name="inline-radios" value="Outward" class="form-check-input">Outward
                                </label>
                              </div>
                              <small class="form-text text-muted">Select the type of movement here. Eg: Inward/Outward</small>
                            </div>
                          </div>
                      </div>
                  </div> -->
                  </div>
              </div>


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Movement Details</strong>
                                </div>
                                <div class="card-body card-block">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="col-md-4">
                                                <label class=" form-control-label">Select Department</label>
                                            </div>
                                            <div class="col-12 col-md-8">
                                                <div class="form-group">
                                                    <select name="deptID" id="select" class="form-control" tabindex="1" required>
                                                        <option value="">Select Department</option>
                                                        <?php
                            				                foreach($results as $row)
                            				             echo '<option value="' .$row['dept_ID'].'">' .$row['dept_Name'].'</option>';
                            			                 ?>
                                                    </select>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                             <small class="form-text text-muted">Select the department to which the record is to be sent.</small>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="col col-md-4">
                                                <label class=" form-control-label">Name of the Receiver</label>
                                            </div>
                                            <div class="col-12 col-md-8">
                                                <div class="input-group">
                                                    <input class="form-control" name="name" required>
                                                </div>
                                                 
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <small class="form-text text-muted">Enter the name/designation of the person to whom the record is to be sent.</small>
                                        </div>
                                    </div>
                                    <br/>

                                     <div class="row">
                                        <div class="col-lg-6">
                                            <div class="col col-md-4">
                                                <label class=" form-control-label">Check here to add CCs</label>
                                            </div>
                                            <div class="col col-md-1">
                                                <div class="input-group">
                                                    <input type="checkbox" class="form-control" name="cbCC" id="cb_CC" onClick="toggleVisibility(this)">
                                                </div>
                                            </div>
                                            <div>
                                                <div class="col col-md-7" id="ccDiv" >
                                                    <select name="cc_deptID[]" id="cc_select" multiple="multiple">
                                                        <?php
                                                            foreach($results as $row)
                                                         echo '<option value="' .$row['dept_ID'].'">' .$row['dept_Name'].'</option>';
                                                         ?>
                                                    </select>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                     <!--  <div class="row" id="ccDiv">
                                        <div class="col-lg-6">
                                            <div class="col col-md-4">
                                                <label class=" form-control-label">Select department(s) here:</label>
                                            </div>
                                             <div class="col-12 col-md-8">
                                                <div class="form-group">
                                                    <select name="cc_deptID[]" id="cc_select" class="form-control" tabindex="1" multiple="multiple">
                                                        <?php
                                                            foreach($results as $row)
                                                         echo '<option value="' .$row['dept_ID'].'">' .$row['dept_Name'].'</option>';
                                                         ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div> <!-- .card -->

                        <!-- <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Outward Details</strong>
                                </div>
                                <div class="card-body card-block">
                                    <div class="row">
                                        <div class="col col-md-4">
                                            <label class=" form-control-label">Select Department</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <div class="form-group">
                                                <select id="select" name="recepientDept" class="form-control" tabindex="2" required>
                                                    <option value="">Select Department</option>
                                                    <?php
                      				                  foreach($results as $row)
                      				                  echo '<option value="' .$row['dept_ID'].'">' .$row['dept_Name'].'</option>';
                      			                       ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                          
                                    <div class="row"> 
                                        <div class="col col-md-4">
                                            <label class=" form-control-label">Name of the Receiver</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <div class="input-group">
                                                <input class="form-control" name="recepientName" required/>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                           <div class="card">
                               <div class="card-header">
                                    <strong>Details of the Record</strong>
                               </div>
                               <div class="card-body card-block">
                                    
                                    <div class="row form-group">
                                       <!--  <div class="col-lg-6">
                                            <div class="col col-md-3">
                                                <label  class="form-control-label">Outward No.</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" class="form-control" placeholder="Outward No." name="outwardNo" required>
                                            </div>
                                        </div> -->
                                        <div class="col-lg-12">
                                            <div class="col col-lg-6">
                                                <div class="col col-md-3">
                                                    <label  class="form-control-label">Movement Date</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" value="<?php echo date('d/m/y');?>"  class="form-control" name="mvtDate" required/>
                                                </div> 
                                            </div>
                                            <div class="col-lg-6">
                                                <small class="form-text text-muted">Select the date of the movement of the record here.</small>
                                            </div>
                                        </div>
                                    </div>

                                        <div class="row form-group">
                                            <div class="col-lg-12">
                                                <div class="col col-lg-6">
                                                    <div class="col col-md-3">
                                                        <label  class="form-control-label">Movement Mode</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                            <select class="form-control" name="mode" required>
                                                                <option value=""> Select Mode of Movement </option>
                                                                <option value="Email"> Email</option>
                                                                <option value="Post"> Post </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                <div class="col-lg-6">
                                                    <small class="form-text text-muted">Select the mode of the movement of the record here.</small>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    
                                    <div class="row form-group">
                                       <!--  <div class="col-lg-6">
                                            <div class="col col-md-3">
                                                <label  class="form-control-label">Outward Mode.</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <select class="form-control" name="outwardMode" required>
                                                    <option value=""> Select Outward Mode </option>
                                                    <option value="Email"> Email</option>
                                                    <option value="Post"> Post </option>
                                                </select>
                                            </div>
                                        </div> -->
                                         <div class="col-lg-12">
                                             <div class="col-lg-6">
                                                <div class="col col-md-3">
                                                    <label class="form-control-label">Document(Record) Ref No.</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" class="form-control" placeholder="Document Ref No." name="refNo" required />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <small class="form-text text-muted">Enter the reference number of the record here.</small>
                                            </div>

                                        <!-- <div class="col-lg-6">
                                            <div class="col col-md-3">
                                                <label class="form-control-label">Inward/Outward Date</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="datepicker2" placeholder="Select Movemen Date"  class="form-control" name="inwardDate" required/>
                                            </div>
                                        </div> -->
                                        </div>
                                    </div>
                                
                                   <!--  <div class="row form-group">
                                        <div class="col-lg-6">
                                            <div class="col col-md-3">
                                                <label class="form-control-label">Letter Ref No.</label>
                                            </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" class="form-control" placeholder="Letter Ref No." name="refNo" required>
                                        </div>
                                    </div> -->
                                        <!-- <div class="col-lg-6">
                                            <div class="col col-md-3">
                                                <label class="form-control-label">Inward No.</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" class="form-control" placeholder="Inward No." name="inwardNo" required>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="row form-group">
                                         <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="col col-md-3">
                                                <label  class=" form-control-label">Subject</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input name="subject" placeholder="Subject Details" class="form-control"></input>
                                            </div>
                                           
                                        </div>
                                        <div class="col-lg-6">
                                            <small class="form-text text-muted">Enter the subject of the record here.</small>
                                        </div>
                                    </div>
                                    </div>

                                     <div class="row form-group">
                                         <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="col col-md-3">
                                                <label class="form-control-label">Content</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <textarea name="textarea-input" id="textarea-input" rows="4" placeholder="Content of the record..." class="form-control"></textarea>
                                            </div>
                                           
                                        </div>
                                        <div class="col-lg-6">
                                            <small class="form-text text-muted">Enter the contents of the record here.</small>
                                        </div>
                                    </div>
                                </div>
                                    
                                    </div>
                                </div> 
                            </div>
                        </div>
                 
                
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <button class="btn btn-danger" formnovalidate>Reset Fields</button>
                </form>
            </div><!-- .animated -->
        </div><!-- .content -->
     </div><!-- /#right-panel -->
    <!-- Right Panel -->
  <!--    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="js/bootstrap-multiselect.js"></script>-->
    
     <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>  
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>
    <script src="js/bootstrap-multiselect.js"></script>
    <script src="assets/js/select2.min.js"></script>

    <script type="text/javascript">
            // $(function () {
            //  $( "#datepicker1" ).datepicker();
            //     $( "#datepicker1" ).datepicker( "option", "dateFormat", 'dd/mm/yy' );
            //      $( "#datepicker2" ).datepicker();
            //     $( "#datepicker2" ).datepicker( "option", "dateFormat", 'dd/mm/yy' );
            // });
                    $(document).ready(function(){
                        // $('#cc_select').multiselect({            
                        //     includeSelectAllOption: true,
                        //     enableFiltering: true,
                        //     buttonWidth:'260px',
                        //     maxHeight:500,
                        //     enableCaseInsensitiveFiltering: true
                        // });
                        $('#select').select2({placeholder: 'Select Department here'});
                        $('#cc_select').select2({placeholder: 'Select Departments here'});
                        hideDiv();
                        refresh_fn();
                        load_unseen_notification();
                    });

                function toggleVisibility(cb)
                 {
                  var x = document.getElementById("ccDiv");
                  var ddl_button = document.getElementById("cc_select");
                  if(cb.checked==true)
                  {
                   x.style.display = "block"; // or x.style.display = "none";
                   ddl_button.setAttribute("required", "required");
                   }
                  else 
                  {
                   x.style.display = "none"; //or x.style.display = "block";
                   ddl_button.removeAttribute("required");
                    }
                 }

                 function hideDiv()
                 {
                  var x = document.getElementById("ccDiv");
                  x.style.display = "none"; //or x.style.display = "block";
                 }

                 function refresh_fn(){
                    var fn = setInterval(load_unseen_notification, 3000);
                 }

                 function load_unseen_notification(view = '')
                    {
                         $.ajax({
                            url:"fetch_notif.php",
                            method:"POST",
                            data:{view:view},
                            dataType:"json",
                            success:function(data)
                                {
                                    // $('.dropdown-menu').html(data.notification);
                                    if(data.unseen_notification > 0)
                                        {
                                            $('.notif_count').html(data.unseen_notification);
                                        }
                                     else
                                            $('.notif_count').html(0);
                                        }
                                });
                    }

                    $(document).on('click', '.notif', function(){
                         $('.notif_count').html('');
                        load_unseen_notification('yes');
                        window.location.href = "./inward_11.php";
                    });
        </script>
</body>
</html>
