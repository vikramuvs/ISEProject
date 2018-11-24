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
    <title>List of Outward Records</title>
    <meta name="description" content="Outward Records">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="modal.css">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="css/bootstrap-multiselect.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link rel="stylesheet" href="assets/css/select2.min.css"/> 
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <style>
    .tblSentCss {
        width: 80%;
        text-align: center;
        margin: 20px;
        display: inline-table;
    }

    .tblSentCss tr {
        padding: 5px 5px 5px 5px;
        border-top: 1px solid #c2c2c2;
    }

    .tblSentCss td {
        padding: 5px 5px 5px 5px;
        border-bottom: 1px solid #c2c2c2;
    }

    </style>

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
                            <li><i class="fa fa-puzzle-piece"></i><a href="NewRecord_final.php">Add New Record</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="OutwardRecords.php">List of Outward Records</a></li>
                            <li><i class="fa fa-bars"></i><a href="inward_11.php">List of Inward Records</a></li>
                            <!-- <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html">Cards</a></li>
                            <li><i class="fa fa-exclamation-triangle"></i><a href="ui-alerts.html">Alerts</a></li>
                            <li><i class="fa fa-spinner"></i><a href="ui-progressbar.html">Progress Bars</a></li>
                            <li><i class="fa fa-fire"></i><a href="ui-modals.html">Modals</a></li>
                            <li><i class="fa fa-book"></i><a href="ui-switches.html">Switches</a></li>
                            <li><i class="fa fa-th"></i><a href="ui-grids.html">Grids</a></li>
                            <li><i class="fa fa-file-word-o"></i><a href="ui-typgraphy.html">Typography</a></li> -->
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
                       <!--  <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div> -->

                       <!--  <div class="dropdown for-notification">
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
                        </div> -->

                        <div class="dropdown for-message">
                          <button class="btn btn-secondary dropdown-toggle notif" type="button"
                                id="message">
                            <i class="ti-email"></i>
                            <span class="count bg-primary notif_count">0</span>
                          </button>
                       <!--    <div class="dropdown-menu" aria-labelledby="message">
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
                          </div> -->
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

                               <!--  <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                                <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a> -->

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
                        <h1>Outward Records</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="index.php">Dashboard</a></li>
                            <li class="active"><a href="OutwardRecords.php">Outward Records</a></li>
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
                                    <strong>List of Outward Records</strong>
                                </div>
                                
                                <div class="table-responsive">
                                    <br /><br />
                                    <table id="user_data" class="table table-bordered table-striped">
                                     <thead>
                                      <tr>
                                       <th width="10%">ID</th>
                                       
                                       <th width="35%">Receiver</th>
                                       <th width="35%">Subject</th>
                                       <th width="10%">View</th>
                                       <th width="10%">Forward</th>
                                      </tr>
                                     </thead>
                                    </table>
                                    
                                   </div>
                                          
                                </div>
                            </div>
                        </div> <!-- .card -->
                    </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    <!-- /#right-panel -->
    <!-- Right Panel -->
</body>


                          <!--   <div id="userModal" class="_modal fade">
                             <div class="modal-dialog">
                              <form method="post" id="user_form" enctype="multipart/form-data">
                               <div class="modal-content">
                                <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                                 <h4 class="modal-title">View Record Details</h4>
                                </div>
                                <div class="modal-body">
                                 <label>Sender Department</label>
                                 <input type="text" name="sender_dept" id="sender_dept" class="form-control" />
                                 <br />
                                 <label>Receiver Department</label>
                                 <input type="text" name="receiver_dept" id="receiver_dept" class="form-control" />
                                 <br />
                                 <label>Date Sent</label>
                                 <input type="text" name="date" id="date" class="form-control" />
                                </div>
                                <div class="modal-footer">
                                 <input type="hidden" name="record_id" id="record_id" />
                                 <input type="hidden" name="operation" id="operation" />
                                 <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                               </div>
                              </form>
                             </div>
                            </div> -->
                                    <div id="myModal" class="_modal">

                                      <!-- Modal content -->
                                     <div class="_modal-content">
                                      <div class="_modal-header">
                                        <span class="_close">&times;</span>
                                        <h2 class="modal-title"></h2>
                                      </div>
                                      <div class="_modal-body">
                                        <div class="row">
                                     <div class="col col-lg-6">
                                         <label>Sender Department:</label>
                                         <input type="text" name="sender_dept" id="sender_dept" class="form-control" />
                                        
                                     </div>
                                     <div class="col col-lg-6">
                                         <label>From:</label>
                                         <input type="text" name="sender_name" id="sender_name" class="form-control" />
                                         
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col col-lg-6">
                                         <label>Recepient Department:</label>
                                         <input type="text" name="receiver_dept" id="receiver_dept" class="form-control" />
                                         
                                     </div>
                                     <div class="col col-lg-6">
                                         <label>To:</label>
                                         <input type="text" name="receiver_name" id="receiver_name" class="form-control" />
                                        
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col col-lg-6">
                                         <label>Date Sent</label>
                                         <input type="text" name="date" id="date" class="form-control" />
                                       
                                     </div>
                                     <div class="col col-lg-6">
                                         <label>Reference No.</label>
                                         <input type="text" name="refNo" id="refNo" class="form-control" />
                                         
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col col-lg-6">
                                         <label>Subject</label>
                                         <input type="text" name="subject" id="subject" class="form-control" />
                                         
                                     </div>
                                     <div class="col col-lg-6">
                                         <label>Mode of Delivery</label>
                                         <input type="text" name="mode" id="mode" class="form-control" />
                                        
                                     </div>
                                 </div>
                                     <div class="row">
                                        <div class="col col-lg-12">
                                         <label>Content</label>
                                         <input type="text" name="content" id="content" class="form-control" />
                                        </div>
                                     </div>

                                       <div class="row">
                                        <div class="col col-lg-12">
                                         <label>Fowarded(CC) to:</label>
                                         <div class="table-responsive-md">
                                        <table id="tblSent" class="table ">
                                        </table>
                                        </div>
                                        </div>
                                     </div>


                                    </div>
                                      <div class="_modal-footer">
                                       <input type="hidden" name="record_id" id="record_id" />
                                         <input type="hidden" name="operation" id="operation" />
                                         <!-- <input type="submit" name="action" id="action" class="btn btn-success" value="Add" /> -->
                                      </div>
                                    </div>

                                    </div>

                                    <div id="myModal1" class="_modal">

                                      <!-- Modal content -->
                                     <div class="_modal-content">
                                      <div class="_modal-header">
                                        <span class="_close">&times;</span>
                                        <h2 class="modal-title"></h2>
                                      </div>
                                      <div class="_modal-body">
                                        <form id="multiForm" action="forward.php" method="POST">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label>Comments (if any)</label>
                                                         <textarea name="comment" id="comment" rows="3" placeholder="Enter Comments, if any, here" class="form-control"></textarea>
                                                    </div>
                                                    <div class="row">
                                                    <label>Select Department(s)</label>
                                                    <select name="multiselect[]" id="select_multiple_depts" class="form-control" multiple="multiple" style="width: 350px;">
                                                        <?php
                                                            $mysqli = new mysqli("localhost", "root", "root", "Users");
                                                            $query = "SELECT * from tbl_Dept where dept_ID !=".$_SESSION["userDeptID"];
                                                            if ($result = $mysqli->query($query)) {

                                                                     /* fetch associative array */
                                                                while ($row = $result->fetch_assoc()) {
                                                                  echo '<option value="' .$row['dept_ID'].'">' .$row['dept_Name'].'</option>';
                                                                }
                                                            }
                                                         ?>
                                                    </select>
                                                </div>
                                                </div>
                                             </div>
                                              <div class="_modal-footer">
                                               <input type="hidden" name="fwd_record_id" id="fwd_record_id" />
                                                 <input type="hidden" name="fwd_operation" id="fwd_operation" />
                                                 <input type="submit" name="fwd_action" id="fwd_action" class="btn btn-success" value="Forward" />
                                                 <input type="cancel" name="cancel_comment" id="cancel_comment" class="btn btn-danger" style="width: 100px;" value="Cancel" />
                                                 </form>
                                              </div>
                                            </div>
                                            </div>
</html>
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

        <script type="text/javascript" language="javascript" >
                        $(document).ready(function(){
                        // $('#select_multiple_depts').multiselect({            
                        //     includeSelectAllOption: true,
                        //     enableFiltering: true,
                        //     buttonWidth:'260px',
                        //     maxHeight:500,
                        //     enableCaseInsensitiveFiltering: true
                        // });
                         $('#select_multiple_depts').select2({placeholder: 'Select Department'});

                         var dataTable = $('#user_data').DataTable({
                          "processing":true,
                          "serverSide":true,
                          "order":[],
                          "ajax":{
                           url:"fetch_2.php",
                           type:"POST"
                          },
                          "dataSrc": function(res){
                                 var count = res.data.length;
                                 //alert(count);

                                 return res.data;
                             },
                          "columnDefs":[
                           {
                            "targets":[3, 4],
                            "orderable":false,
                           },
                          ],

                         });

                          });
                         
                         $(document).on('click', '.update', function(){
                          var record_id = $(this).attr("id");
                          var modal = document.getElementById('myModal');
                          $.ajax({
                           url:"fetch_single_1_outward.php",
                           method:"POST",
                           data:{"record_id":record_id},
                           dataType:"json",
                           success:function(data)
                           {
                            //var fwd_to = $.parseJSON(data);
                            var table_initializer = "<thead class='thead-light'><tr><th>Department</th><th>Date Forwarded</th><th>Has Read?</th><th>Read Date</th><th>Comment, if any</th></tr></thead>";

                            if (data.cc.length > 0)
                            {
                            for (i=0;i<data.cc.length;i++)
                                {
                                table_initializer += "<tr><td>"+data.cc[i]["recepient_dept"]+"</td><td>"+data.cc[i]["sent_date"]+"</td><td>"+data.cc[i]["read_flag"]+"</td><td>"+(data.cc[i]["read_date"] == null ? "-" : data.cc[i]["read_date"])+"</td><td>"+(data.cc[i]["comment"] == null ? "-" : data.cc[i]["comment"])+"</td></tr>";
                                }
                            }
                            else
                                table_initializer = "None.";
                            //table_initializer += "</tr>";
                            //var final_table=table_initializer;

                            $('#sender_dept').val(data.senderDept);
                            $('#receiver_dept').val(data.receiverDept);
                            $('#date').val(data.date);
                            $('#receiver_name').val(data.recepientName);
                             $('#sender_name').val(data.senderName);
                              $('#subject').val(data.subject);
                               $('#mode').val(data.mode);
                                $('#content').val(data._content);
                                 $('#refNo').val(data.refNo);
                            $('.modal-title').text("View Record Details");
                            $('#record_id').val(record_id);
                            $('#tblSent').html(table_initializer);
                            //$('#tblSent').addClass('table');
                            //$('#user_uploaded_image').html(data.user_image);
                            $('#action').val("Ok");
                            $('#operation').val("View"); 
                            // $('#userModal').modal('show');
                            modal.style.display = "block";
                            fn();
                           }
                          })
                         });
                         
                         $(document).on('click', '.delete', function(){
                            $('.modal-title').text("Add Comment & Forward");
                          var record_id = $(this).attr("id");
                          var modal = document.getElementById('myModal1');
                           var modal_record_id = document.getElementById('myModal1').querySelectorAll("#fwd_record_id");
                           modal_record_id[0].value = record_id;
                           modal.style.display = "block";
                           fn1();
                          // if(confirm("Are you sure you want to delete this?"))
                          // {
                          //  $.ajax({
                          //   url:"forward.php",
                          //   method:"POST",
                          //   data:{"record_id":record_id},
                          //   success:function(data)
                          //   {
                          //    alert('Forwarded to recepients successfully');
                          //    dataTable.ajax.reload();
                          //   }
                          //  });
                          // }
                          // else
                          // {
                          //  return false; 
                          // }

                         });

                         function fn(){
                            var span = document.getElementsByClassName("_close")[0];
                            var modal = document.getElementById('myModal');
                            span.onclick = function() {
                                modal.style.display = "none";
                            }
                            window.onclick = function(event) {
                                if (event.target == modal) {
                                    modal.style.display = "none";
                                }
                            }
                          }

                          function fn1(){
                            var span = document.getElementsByClassName("_close")[1];
                            var modal = document.getElementById('myModal1');
                            span.onclick = function() {
                                modal.style.display = "none";
                            }
                            window.onclick = function(event) {
                                if (event.target == modal) {
                                    modal.style.display = "none";
                                }
                            }
                          }
                        </script>

                        <script>
                                        $(document).ready(function(){
                                         refresh_fn();
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
                                         
                                         load_unseen_notification();
                                         
                                         
                                         $(document).on('click', '.notif', function(){
                                          $('.notif_count').html('');
                                          load_unseen_notification('yes');
                                         });
                                         
                                         $(document).on('click', '#cancel_comment', function(){
                                          var modal = document.getElementById('myModal1');
                                          modal.style.display = "none";
                                         });

                                         function refresh_fn(){
                                         var fn = setInterval(load_unseen_notification, 3000);
                                         }

                                        });
                        </script>

                        <script>
                            $(document).on('click', '.update', function(){
                          var record_id = $(this).attr("id");
                          var modal = document.getElementById('myModal');
                          $.ajax({
                           url:"fetch_single_1.php",
                           method:"POST",
                           data:{"record_id":record_id},
                           dataType:"json",
                           success:function(data)
                           {
                            $('#sender_dept').val(data.senderDept);
                            $('#receiver_dept').val(data.receiverDept);
                            $('#date').val(data.date);
                            $('#receiver_name').val(data.recepientName);
                             $('#sender_name').val(data.senderName);
                              $('#subject').val(data.subject);
                               $('#mode').val(data.mode);
                                $('#content').val(data._content);
                                 $('#refNo').val(data.refNo);
                            $('.modal-title').text("View Record Details");
                            $('#record_id').val(record_id);
                            //$('#user_uploaded_image').html(data.user_image);
                            $('#action').val("Ok");
                            $('#operation').val("View"); 
                            // $('#userModal').modal('show');
                            modal.style.display = "block";
                            fn();
                           }
                          })
                         });
                        </script>




