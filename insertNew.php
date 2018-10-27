 <?php
	ini_set('display_errors', 'On');

	$con = mysqli_connect('localhost', 'root', 'root');

	if (!$con)
	{
		echo 'Not Connected to Sql Server';
	}

	if(isset($_POST) && array_key_exists('Insert',$_POST))
        {
        
	if (!mysqli_select_db($con, 'Users'))
		echo 'Database not selected';

	if (isset($_POST['senderName'])) {
    $senderName = $_POST['senderName'];
	}

	if (isset($_POST['recepientName'])) {
    $recepientName = $_POST['recepientName'];
	}

	if (isset($_POST['outwardNo'])) {
    $outwardNo = $_POST['outwardNo'];
	}

	if (isset($_POST['outwardNo'])) {
    $outwardDate = $_POST['outwardNo'];
	}

	if (isset($_POST['inwardDate'])) {
    $inwardDate = $_POST['inwardDate'];
	}

	if (isset($_POST['refNo'])) {
    $refNo = $_POST['refNo'];
	}

	if (isset($_POST['inwardNo'])) {
    $inwardNo = $_POST['inwardNo'];
	}

	if (isset($_POST['subject'])) {
    $subject = $_POST['subject'];
	}

	$sql = "INSERT INTO tbl_Records (SenderName, RecepientName, OutwardNo, OutwardDate, InwardDate, RefNo, InwardNo, Subject ) 
	VALUES ('$senderName', '$recepientName', '$outwardNo', '$outwardDate', '$inwardDate', '$refNo', '$inwardNo', '$subject' )";

	$result = $con->query($sql);

	if (!mysqli_query($con,$sql))
	{
		echo 'Fail';
	}
	else
	{
		echo 'Success';
	}

}
?>