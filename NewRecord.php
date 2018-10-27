<?php
	
	require_once("phpGrid_Lite/conf.php"); 

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

	$con = new mysqli('localhost', 'root', 'root', 'Users');

	if ($con->connect_error)
	{
		echo 'Not Connected to Sql Server' . $con->connect_error;
	}        
	/*if (!mysqli_select_db($con, 'Users'))
		echo 'Database not selected';*/	
    $senderName = mysqli_real_escape_string($con, $_POST['senderName']);
    $senderDept = mysqli_real_escape_string($con, $_POST['senderDept']);
    $recepientName = mysqli_real_escape_string($con, $_POST['recepientName']);	
    $recepientDept = mysqli_real_escape_string($con, $_POST['recepientDept']);
    $outwardNo = mysqli_real_escape_string($con, $_POST['outwardNo']);	
    $outwardDate = mysqli_real_escape_string($con, $_POST['outwardDate']);	
    $inwardDate = mysqli_real_escape_string($con, $_POST['inwardDate']);
    $outwardMode = mysqli_real_escape_string($con, $_POST['outwardMode']);	
    $refNo = mysqli_real_escape_string($con, $_POST['refNo']);	
    $inwardNo = mysqli_real_escape_string($con, $_POST['inwardNo']);	
    $subject = mysqli_real_escape_string($con, $_POST['subject']);

	/*$senderName  = $_POST['senderName'];
	$recepientName = $_POST['recepientName'];
	$outwardNo = $_POST['outwardNo'];
	$outwardDate = $_POST['outwardDate'];
	$inwardDate = $_POST['inwardDate'];
	$refNo = $_POST['refNo'];
	$inwardNo = $_POST['inwardNo'];
	$subject = $_POST['subject'];*/

	$sql = "INSERT INTO tbl_Records (SenderDept ,SenderName, RecepientDept ,RecepientName, OutwardNo, OutwardDate, OutwardMode ,InwardDate, RefNo, InwardNo, Subject, Status) 
	VALUES ('$senderDept', '$senderName', '$recepientDept' ,'$recepientName', '$outwardNo', STR_TO_DATE('$outwardDate','%d/%m/%Y'), '$outwardMode' , STR_TO_DATE('$inwardDate','%d/%m/%Y'), '$refNo', '$inwardNo', '$subject', 'P' )";

	$result = $con->query($sql);

	// if (!mysqli_query($con,$sql))
	if (!$result)
	{
		status_display('fail');
	}
	else
	{
		status_display('success');
	}

 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>New Record</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="jquery-ui/jquery-ui.css">
<style>
@import url('https://fonts.googleapis.com/css?family=Roboto');

  .ui-tabs-vertical { width: 55em; }
  .ui-tabs-vertical .ui-tabs-nav { padding: .2em .1em .2em .2em; float: left; width: 12em; }
  .ui-tabs-vertical .ui-tabs-nav li { clear: left; width: 100%; border-bottom-width: 1px !important; border-right-width: 0 !important; margin: 0 -1px .2em 0; }
  .ui-tabs-vertical .ui-tabs-nav li a { display:block; }
  .ui-tabs-vertical .ui-tabs-nav li.ui-tabs-active { padding-bottom: 0; padding-right: .1em; border-right-width: 1px; }
  .ui-tabs-vertical .ui-tabs-panel { padding: 1em; float: right; width: 40em;}

body {
    margin:0px;
    padding:0px;
    box-sizing:border-box;
    background:#354545;
}

.header {
	display: grid;
	grid-template-columns: 150px 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
	max-height: 200px;
	width: 100%;
}

.header-text {
	background-color: white;
	font-family: Roboto;
	color: #201e3e;
	font-size: 2.5em;
	grid-column: 1/11;
}
/*
.header-image {
	grid-column: 1;
	height: 150px;
	width: 150px;

}
*/
</style>

<body>
<div class="container">

  <div class="header">
  	<div class="header-image">
  		<!-- <img src="Images/logo.png"> -->
  	</div>
  	<div class="header-text">File I/O Register
  	</div>
  </div>
    <div id="tabs">
  <ul>
    <li><a href="#new">New</a></li>
    <li><a href="#pending">Pending</a></li>
    <li><a href="#approved">Approved</a></li>
    <li><a href="#search">Search</a></li>
  </ul>
  
  <div id="new" style="height: 90vh;">

 <form action="NewRecord.php" method="post">
 <!--  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button> -->

  	
  		<?php
  			function status_display($status) {
  				echo '<div class="form-row"> <div class="col-lg-12" style="background-color: rgba(3,3,3,.5); color: white; height: 100px; width: 100px; text-align: center;">' . $status . '</div></div>';
  			}
  		?>
  
  <div class="form-row">  
  	<div class="col-lg-6" style="background-color: rgba(0,0,0,0.3); border-radius: 5px; min-height: 150px">
  		Inward Details
  		<select class="form-control" name="senderDept" required>
  			<option value="">Select Department </option>
  			<?php 
  				foreach($results as $row) 
  				echo '<option value="' .$row['dept_ID'].'">' .$row['dept_Name'].'</option>';
  			?>
  		</select>
  		<br/>
      <input type="text" class="form-control" placeholder="Name of Sender" name="senderName" required>
  </div>

<br/>

  <div class="col-lg-6" style="background-color: rgba(0,0,0,0.3); border-radius: 5px; min-height: 150px">
  	Outward Details
  		<select class="form-control" name="recepientDept" required>
  			<option value="">Select Department </option>
  			<?php foreach($results as $row)
  				echo '<option value="' .$row['dept_ID'].'">' .$row['dept_Name'].'</option>';
  				?>
  		</select>
  		<br/>
      <input type="text" class="form-control" placeholder="Name of Recepient" name="recepientName" required>

  </div>
</div>
<br/>
<div class="form-row">
	<div class="col-lg-4">
			<input type="text" class="form-control" placeholder="Outward No." name="outwardNo" required>
		</div>
		<div class="col-lg-4">
                <input type="text" id="datepicker1" placeholder="Select Outward Date"  class="form-control" name="outwardDate" required/>
		</div>
		<div class="col-lg-4">
			<select class="form-control" name="outwardMode" required>
  			<option value="0"> Select Outward Mode </option>
  			<option value="Email"> Email</option>
  			<option value="Post"> Post </option>
  		</select>
		</div>
</div>
<br/>
<div class="form-group">
<div class="form-row">
	<div class="col-lg-4">
			<input type="text" id="datepicker2" placeholder="Select Inward Date"  class="form-control" name="inwardDate" required/>
		</div>
		<div class="col-lg-4">
			<input type="text" class="form-control" placeholder="Letter Ref No." name="refNo" required>
		</div>
		<div class="col-lg-4">
			<input type="text" class="form-control" placeholder="Inward No." name="inwardNo" required>
		</div>
</div>
</div>

<div class="form-group">
    <label for="exampleFormControlTextarea3">Subject</label>
    <textarea class="form-control" id="exampleFormControlTextarea3" rows="7" name="subject" required></textarea>
</div>

<button type="submit" class="btn btn-primary" name="submit">Submit</button>
<button class="btn btn-danger" formnovalidate>Reset Fields</button>
  </form>




</div>

  <div id="pending">
    <?php
    	$dg = new C_DataGrid("SELECT * from tbl_Dept", "dept_ID", 'tbl_Dept');
    	$dg->display();
    ?>
  </div>

  <div id="approved">
  </div>

  <div id="search">
  </div>

</div>
</div>
</body>

<script src="js/jquery.js" ></script>
<script src="js/popper.js" ></script>
<script src="js/bootstrap.min.js"> </script>
<script src="jquery-ui/jquery-ui.min.js"></script>
<script>
  /*$( function() {
    $( "#tabs" ).tabs();
  } );*/
  $( function() {
    $( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
    $( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
});
  </script>

  <script type="text/javascript">
            $(function () {
             $( "#datepicker1" ).datepicker();
                $( "#datepicker1" ).datepicker( "option", "dateFormat", 'dd/mm/yy' );
                 $( "#datepicker2" ).datepicker();
                $( "#datepicker2" ).datepicker( "option", "dateFormat", 'dd/mm/yy' );
            });
        </script>





