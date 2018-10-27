<?php
session_start();
ini_set('display_errors', 'On');

if (isset($_SESSION["userDeptID"]) && isset($_POST["fwd_action"]))
{
  $userDeptID = $_SESSION["userDeptID"];
  include('dbi.php');
  include('function.php');

  if(isset($_POST["fwd_record_id"]))
  {
   $output = array();
   $record_id = $_POST["fwd_record_id"];
   $multiselect_values = array();
   $multiselect_values = $_POST["multiselect"];
   $arrayLength = count($multiselect_values);
   if ($arrayLength>0) 
   {
    for ($i=0; $i<$arrayLength; $i++)
    {

      $current_array_value = $multiselect_values[$i];
   // $query = "SELECT R.ID as 'ID', A.dept_Name as 'SenderDept', B.dept_Name as 'RecepientDept', SenderName, RecepientName, InwardNo, DATE_FORMAT(InwardDate, '%d-%m-%Y') as InwardDate, Mode, RefNo, Subject, Status, DATE_FORMAT(EntryDate, '%d-%m-%Y %H:%i:%s') as EntryDate, O.intended_or_copy_recepient as 'RecepientType' from tbl_Records as R inner join tbl_Dept A on A.dept_ID = R.SenderDept inner join tbl_Dept B on B.dept_ID = R.RecepientDept inner join tbl_Recepients O on O.record_id = R.ID where O.receiver_id =" .$userDeptID. " AND R.ID=" .$_POST["record_id"];
    $query = "INSERT INTO tbl_CC_Recepient (record_id, from_user_id, to_user_id, sent_date, table_entry_date, read_or_not) VALUES ('$record_id', '$userDeptID', '$current_array_value', now(), now(), 'No' )"; 
   
   $result = mysqli_query($connection, $query);
   $result += $result;
    }

    if(isset($_POST["comment"]))
    {
      $q = "INSERT INTO tbl_CC_Recepient (record_id, from_user_id, to_user_id, sent_date, table_entry_date, read_or_not) VALUES ('$record_id', '$userDeptID', '$current_array_value', now(), now(), 'No' )";
    }
        
        if (!$result)
            {
                //echo 'outwardfail' . $senderName . $senderDept . $recepientDept . $recepientName .$mvtDate;
                echo 'sql = ' . $query . 'error' . mysqli_error($connection);
            }
        else
            {
                // echo 'outwardsuccess' . $senderName . $senderDept . $recepientDept . $recepientName .$mvtDate;
                echo '<script type="text/javascript">'.  'alert("Record forwarded succesfully!");' . '</script>';
            }
          }
          else
            echo '<script type="text/javascript">'.  'alert("No departments selected!");' . '</script>';

 }
}
  else
  header('Location: Login.php');
  ?>