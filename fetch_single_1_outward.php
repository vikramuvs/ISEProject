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
    $query = "SELECT R.ID as 'ID', A.dept_Name as 'SenderDept', B.dept_Name as 'RecepientDept', SenderName, RecepientName, DATE_FORMAT(OutwardDate, '%d-%m-%Y') as OutwardDate, Mode, RefNo, Subject, Content, Status, DATE_FORMAT(EntryDate, '%d-%m-%Y %H:%i:%s') as EntryDate, O.intended_or_copy_recepient as 'RecepientType' from tbl_Records as R inner join tbl_Dept A on A.dept_ID = R.SenderDept inner join tbl_Dept B on B.dept_ID = R.RecepientDept inner join tbl_Recepients O on O.record_id = R.ID where O.sender_id =" .$userDeptID. " AND R.ID=" .$_POST["record_id"];

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

 // $q1 = "SELECT D1.dept_Name as 'SenderDept', D2.dept_Name as 'RecepientDept', R.sent_date as 'SentDate', R.entry_into_table_date as 'TableEntryDate', R.read_or_not, R.read_date, R.comment FROM tbl_Recepients as R join tbl_Dept as D1 on R.sender_id = D1.dept_ID join tbl_Dept as D2 on R.receiver_id = D2.dept_ID  where R.intended_or_copy_recepient != 'Copy' and R.record_id =28"; //.$_POST["record_id"]; //intended recepients list query

  //$q1 = "SELECT D1.dept_Name as 'SenderDept', D2.dept_Name as 'RecepientDept', R.sent_date as 'SentDate' FROM tbl_Recepients as R join tbl_Dept as D1 on R.sender_id = D1.dept_ID join tbl_Dept as D2 on R.receiver_id = D2.dept_ID  where R.intended_or_copy_recepient != 'Copy' and R.record_id =28"; 


  //  $statement1 = $connection->prepare($q1);
  //  $statement1->execute();
  //  $result1 = $statement1->fetchAll();
  //  if (count($result1) > 0)
  //   {
  //   $output["fwd"] = array();

  //   for ($i=0;$i<count($result1);$i++)
  //   {
  //     $output["fwd"][$i] = array();
  //     $output["fwd"][$i]["sender_dept"] = $result1[$i]["SenderDept"];
  //     $output["fwd"][$i]["recepient_dept"] = $result1[$i]["RecepientDept"];
  //     $output["fwd"][$i]["sent_date"] = $result1[$i]["SentDate"];
  //     $output["fwd"][$i]["read_flag"] = $result1[$i]["read_or_not"];
  //     $output["fwd"][$i]["read_date"] = $result1[$i]["read_date"];
  //     $output["fwd"][$i]["comment"] = $result1[$i]["comment"];
  //   }
  // }
  //   else
  //     $output["fwd"] = "none";


   // echo json_encode($result1);
   // echo '<br>';
   // echo '<br>';

   $q2 = "SELECT D2.dept_Name as 'RecepientDept', R.sent_date as 'SentDate', R.entry_into_table_date as 'Table Entry Date', R.read_or_not, R.read_date, R.comment FROM `tbl_Recepients` as R join tbl_Dept as D1 on R.sender_id = D1.dept_ID join tbl_Dept as D2 on R.receiver_id = D2.dept_ID  where R.intended_or_copy_recepient = 'Copy' and R.record_id = " .$_POST["record_id"]; //CC recepients list query
  //$q2 = "SELECT D1.dept_Name as 'SenderDept', D2.dept_Name as 'RecepientDept', R.sent_date as 'SentDate' FROM `tbl_Recepients` as R join tbl_Dept as D1 on R.sender_id = D1.dept_ID join tbl_Dept as D2 on R.receiver_id = D2.dept_ID  where R.intended_or_copy_recepient = 'Copy' and R.record_id =28"; 


   $statement2 = $connection->prepare($q2);
   $statement2->execute();
   $result2 = $statement2->fetchAll();
   $output["cc"] = array();

   if (count($result2) > 0)
    {
    //$output["cc"] = array();

     for ($i=0;$i<count($result2);$i++) {
      $output["cc"][$i] = array();
      // $output["cc"][$i]["sender_dept"] = $result2[$i]["SenderDept"];
      $output["cc"][$i]["recepient_dept"] = $result2[$i]["RecepientDept"];
      $output["cc"][$i]["sent_date"] = $result2[$i]["SentDate"];
      $output["cc"][$i]["read_flag"] = $result2[$i]["read_or_not"];
      $output["cc"][$i]["read_date"] = $result2[$i]["read_date"];
      $output["cc"][$i]["comment"] = $result2[$i]["comment"];
    }
  }

  // else 
  //   $output["cc"] = "none";

 // echo json_encode($result2);

   echo json_encode($output);
   }
 }
  else
  header('Location: Login.php');
  ?>