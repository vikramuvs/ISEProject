<?php
session_start();
ini_set('display_errors', 'On');
if (isset($_SESSION["userDeptID"]))
{
  $userDeptID = $_SESSION["userDeptID"];
  include('database.php');
  include('function.php');

  if(isset($_POST["record_id"]))
  {
   $output = array();
   $query = "SELECT R.ID as 'ID', A.dept_Name as 'SenderDept', B.dept_Name as 'RecepientDept', SenderName, RecepientName, DATE_FORMAT(OutwardDate, '%d-%m-%Y') as OutwardDate, Mode, RefNo, Subject, Content, Status, DATE_FORMAT(EntryDate, '%d-%m-%Y %H:%i:%s') as EntryDate, O.intended_or_copy_recepient as 'RecepientType' from tbl_Records as R inner join tbl_Dept A on A.dept_ID = R.SenderDept inner join tbl_Dept B on B.dept_ID = R.RecepientDept inner join tbl_Recepients O on O.record_id = R.ID where O.receiver_id =" .$userDeptID. " AND R.ID=" .$_POST["record_id"];

   $statement = $connection->prepare($query);
   $statement->execute();
   $result = $statement->fetchAll();
   foreach($result as $row)
   {
    $output["senderDept"] = $row["SenderDept"];
    $output["receiverDept"] = $row["RecepientDept"];
    $output["senderName"] = $row["SenderName"];
    $output["recepientName"] = $row["RecepientName"];
    $output["date"] = $row["OutwardDate"];
    $output["subject"] = $row["Subject"];
    $output["_content"] = $row["Content"];
    $output["recepientType"] = $row["RecepientType"];
    $output["mode"] = $row["Mode"];
    $output["refNo"] = $row["RefNo"];
   }
   echo json_encode($output);
 }
}
  else
  header('Location: Login.php');
  ?>