<?php
//fetch.php;
session_start();
if(isset($_POST["view"]))
{
 include("dbi.php");

 if($_POST["view"] != '')
 {
  $update_query1 = "UPDATE tbl_CC_Recepient SET notification_status=1 WHERE notification_status=0 and to_user_id=".$_SESSION["userDeptID"];
  $update_query2 = "UPDATE tbl_Orig_Recepient SET notification_status=1 WHERE notification_status=0 and to_user_id=".$_SESSION["userDeptID"];
  mysqli_query($connection, $update_query1);
  mysqli_query($connection, $update_query2);
 }

$q1 = "SELECT * from tbl_CC_Recepient where to_user_id=".$_SESSION["userDeptID"]." and notification_status=0";
$q2 = "SELECT * from tbl_Orig_Recepient where to_user_id=".$_SESSION["userDeptID"]." and notification_status=0";
$r1 = mysqli_query($connection, $q1);
$r2 = mysqli_query($connection, $q2);

$count1 = mysqli_num_rows($r1);
$count2 = mysqli_num_rows($r2);

$count_sum = $count1 + $count2;

 // $query = "SELECT * FROM comments ORDER BY comment_id DESC LIMIT 5";
 // $result = mysqli_query($connect, $query);
 // $output = '';
 
 // if(mysqli_num_rows($result) > 0)
 // {
 //  while($row = mysqli_fetch_array($result))
 //  {
 //   $output .= '
 //   <li>
 //    <a href="#">
 //     <strong>'.$row["comment_subject"].'</strong><br />
 //     <small><em>'.$row["comment_text"].'</em></small>
 //    </a>
 //   </li>
 //   <li class="divider"></li>
 //   ';
 //  }
 // }
 // else
 // {
 //  $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
 // }
 
 // $query_1 = "SELECT * FROM comments WHERE comment_status=0";
 // $result_1 = mysqli_query($connect, $query_1);
 // $count = mysqli_num_rows($result_1);
 $data = array(
  // 'notification'   => $output,
  'unseen_notification' => $count_sum
 );
 echo json_encode($data);
}
?>