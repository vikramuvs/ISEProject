<?php
    session_start();
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pending Records</title>
    <meta name="description" content="Pending Record">
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
<body>
        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
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

                                else 
                                    header('Location: Login.php');
                            }
                         ?>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Admin Actions</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="#">Test</a></li>
                            <li><i class="fa fa-table"></i><a href="#">Test</a></li>
                        </ul>
                    </li>
                   
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
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
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
                                <p>Server #1 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <i class="fa fa-warning"></i>
                                <p>Server #3 overloaded.</p>
                            </a>
                          </div>
                        </div>

                        <div class="dropdown for-message">
                          <button class="btn btn-secondary dropdown-toggle" type="button"
                                id="message"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti-email"></i>
                            <span class="count bg-primary">9</span>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="message">
                            <p class="red">You have 4 Mails</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jonathan Smith</span>
                                    <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jack Sanders</span>
                                    <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Cheryl Wheeler</span>
                                    <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-3" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Rachel Santos</span>
                                    <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                          </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>

                                <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                                <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>

                                <a class="nav-link" href="Logout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
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
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Pending Records</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active"><a href="forms-basic.php">Pending Records</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>List of Pending Files</strong>
                                </div>
                                
                                            <?php
                                               // $userDeptID = $_SESSION["userDeptID"];
                                                
                                                ini_set('display_errors', 'On');

                                               
                                                        $con = mysqli_connect('localhost', 'root', 'root', 'Users');
                                                            
                                                            if (!$con)
                                                            {
                                                                die('PLease try again after some time.');
                                                            }
                                                            else
                                                            {
                                                                displayRecords($con);
                                                            }

                                                    function displayRecords($con) {

                                                     //  echo $userDeptID;

                                                    // $qu = "SELECT A.dept_Name as 'SenderDept', B.dept_Name as 'RecepientDept', SenderName, RecepientName, OutwardNo, DATE_FORMAT(OutwardDate, '%d-%m-%Y') as OutwardDate, OutwardMode, DATE_FORMAT(InwardDate, '%d-%m-%Y') as InwardDate, RefNo, InwardNo, Subject, Status, DATE_FORMAT(EntryDate, '%d-%m-%Y %H:%i:%s') as EntryDate from tbl_Records as R inner join tbl_Dept A on A.dept_ID = R.SenderDept inner join tbl_Dept B on B.dept_ID = R.RecepientDept where RecepientDept = ". $userDeptID;

                                                         $qu = "SELECT A.dept_Name as 'SenderDept', B.dept_Name as 'RecepientDept', SenderName, RecepientName, OutwardNo, DATE_FORMAT(OutwardDate, '%d-%m-%Y') as OutwardDate, Mode, DATE_FORMAT(InwardDate, '%d-%m-%Y') as InwardDate, RefNo, InwardNo, Subject, Status, DATE_FORMAT(EntryDate, '%d-%m-%Y %H:%i:%s') as EntryDate, MvtType as 'Movement Type' from tbl_Records as R inner join tbl_Dept A on A.dept_ID = R.SenderDept inner join tbl_Dept B on B.dept_ID = R.RecepientDept ";
                                                    
                                                    $recordEntries = mysqli_query($con, $qu);
                                                    
                                                    if (mysqli_num_rows($recordEntries) > 0) {
                                                        echo '<div class="card-body"><table id="bootstrap-data-table" class="table table-striped table-bordered">'.'<thead> <tr> <th>Sender Department</th> <th>Sender Name</th> <th>Recepient Department</th> <th>Recepient Name</th> <th>Outward No</th><th>Outward Date</th><th>Mode</th>'.'<th>Inward Date</th><th>Reference No</th><th>Inward No</th><th>Subject</th><th>'.'Entry Date</th><th>Movement Type</th></tr> </thead><tbody>';
                                                        
                                                        while ($row = mysqli_fetch_assoc($recordEntries)) {
                                                            echo '<tr><td>'.$row["SenderDept"].'</td><td>'.$row["SenderName"].'</td><td>'.$row["RecepientDept"].'</td><td>'.$row["RecepientName"].'</td><td>'.$row["OutwardNo"].'</td><td>'.$row["OutwardDate"].'</td><td>'.$row["Mode"].'</td><td>'.$row["InwardDate"].'</td><td>'.$row["RefNo"].'</td><td>'.$row["InwardNo"].'</td><td>'.$row["Subject"].'</td><td>'.$row["EntryDate"].'</td><td>'.$row["Movement Type"].'</td></tr>';
                                                        }
                                                        echo '</tbody></div>';
                                                    }

                                                    else {
                                                    echo '0 Results';
                                                    }
                                                }

                                                mysqli_close($con);
                                            ?>
                                </div>
                            </div>
                        </div> <!-- .card -->
                    </div>
            </div><!-- .animated -->
        </div><!-- .content -->
     </div><!-- /#right-panel -->
    <!-- Right Panel -->
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

    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>

</body>
</html>
