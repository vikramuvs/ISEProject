<?php
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

	$sql = "INSERT INTO tbl_Records (ID, SenderDept ,SenderName, RecepientDept ,RecepientName, OutwardNo, OutwardDate, OutwardMode ,InwardDate, RefNo, InwardNo, Subject, Status) 
	VALUES (1, '$senderDept', '$senderName', '$recepientDept' ,'$recepientName', '$outwardNo', STR_TO_DATE('$outwardDate','%d/%m/%Y'), '$outwardMode' , STR_TO_DATE('$inwardDate','%d/%m/%Y'), '$refNo', '$inwardNo', '$subject', 'P' )";

	$result = $con->query($sql);

	// if (!mysqli_query($con,$sql))
	if (!$result)
	{
		echo 'Fail' . $sql . $con->error;
	}
	else
	{
		echo 'Success';
	}

 }
?>