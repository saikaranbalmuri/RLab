<?php
include 'DBfile.php';
include 'PushNotifications.php';
header('Access-Control-Allow-Origin: *');

$userid = $_REQUEST['project_name'];
$sql="select userid, message, time_posted, from project_updates where project_id=1";
$result=$conn->query($sql);
if($result->num_rows>0)
{
	
	while($row = $result->fetch_assoc())
	{
		$value[]=$row;
	}
	
	
}
$data=array("Project_up"=>$value);
echo json_encode($data);
?>

