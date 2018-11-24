<?php
session_start();
ini_set('display_errors', 'On');
include('database.php');
include('function.php');

if (isset($_SESSION["userDeptID"]))
{
$userDeptID=$_SESSION["userDeptID"];
//$query = '';
$output = array();
$query = "SELECT R.ID as 'ID', A.dept_Name as 'SenderDept', B.dept_Name as 'RecepientDept', SenderName, RecepientName, DATE_FORMAT(OutwardDate, '%d-%m-%Y') as OutwardDate, Mode, RefNo, Subject, DATE_FORMAT(EntryDate, '%d-%m-%Y %H:%i:%s') as EntryDate, O.intended_or_copy_recepient as 'RecepientType' from tbl_Records as R inner join tbl_Dept A on A.dept_ID = R.SenderDept inner join tbl_Dept B on B.dept_ID = R.RecepientDept inner join tbl_Recepients O on O.record_id = R.ID where O.sender_id =".$userDeptID;

if(isset($_POST["search"]["value"]))
{
 $query .= ' AND (SenderDept LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= ' AND RecepientDept LIKE "%'.$_POST["search"]["value"].'%")';
}
if(isset($_POST["order"]))
{
 $query .= ' ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= ' ORDER BY ID DESC ';
}
if($_POST["length"] != -1)
{
 $query .= ' LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();

foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row["ID"];
 $sub_array[] = $row["RecepientDept"];
 $sub_array[] = $row["Subject"];
 $sub_array[] = '<button type="button" name="view" id="'.$row["ID"].'" class="btn btn-warning btn-xs update">View</button>';
 $sub_array[] = '<button type="button" name="forward" id="'.$row["ID"].'" class="btn btn-danger btn-xs delete">Forward</button>';
 $data[] = $sub_array;
}
$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  $filtered_rows,
 "recordsFiltered" => get_total_sent_records(),
 "data"    => $data
);
echo json_encode($output);
}
else
	header('Location: Login.php');
?>