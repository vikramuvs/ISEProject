<?php
//session_start();
ini_set('display_errors', 'On');

function get_total_all_records()
{
	if (isset($_SESSION["userDeptID"]))
	{
		include("database.php");
		$userDeptID = $_SESSION["userDeptID"];
		$query="SELECT R.ID as 'ID', A.dept_Name as 'SenderDept', B.dept_Name as 'RecepientDept', SenderName, RecepientName, InwardNo, DATE_FORMAT(InwardDate, '%d-%m-%Y') as InwardDate, Mode, RefNo, Subject, Status, DATE_FORMAT(EntryDate, '%d-%m-%Y %H:%i:%s') as EntryDate, O.intended_or_copy_recepient as 'RecepientType' from tbl_Records as R inner join tbl_Dept A on A.dept_ID = R.SenderDept inner join tbl_Dept B on B.dept_ID = R.RecepientDept inner join tbl_Recepients O on O.record_id = R.ID where O.receiver_id =".$userDeptID;
		$statement = $connection->prepare($query);
		$statement->execute();
		return $statement->rowCount();
	}
	else
		header('Location: Login.php');
}

?>