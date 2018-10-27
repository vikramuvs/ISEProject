<?php
//$var1 = $_POST['get1'];

$var = array('source' => 'btn clicked. this is response from ajax'//,
			//'get' =>'get value is '.$var1
			);
echo json_encode($var);
?>