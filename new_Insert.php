<?php
	ini_set('display_errors', 'On');

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

	$sql = "INSERT INTO tbl_Records (SenderDept ,SenderName, RecepientDept ,RecepientName, OutwardNo, OutwardDate, OutwardMode ,InwardDate, RefNo, InwardNo, Subject, Status, EntryDate)
	VALUES ('$senderDept', '$senderName', '$recepientDept' ,'$recepientName', '$outwardNo', STR_TO_DATE('$outwardDate','%d/%m/%Y'), '$outwardMode' , STR_TO_DATE('$inwardDate','%d/%m/%Y'), '$refNo', '$inwardNo', '$subject', 'P', 'NOW()' )";

	$result = $con->query($sql);

	// if (!mysqli_query($con,$sql))
	if (!$result)
	{
		echo 'Failed to insert';ß
	}
	else
	{
		echo 'Success in insert';
	}

 }

?>