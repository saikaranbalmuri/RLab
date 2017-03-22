<?php
include 'DBfile.php';
header('Access-Control-Allow-Origin: *');
$userid=$_REQUEST["userid"];
//$in_time=$_REQUEST['in_time'];
//$out_time=$_REQUEST['out_time'];
$id=$_REQUEST['id'];
$action=$_REQUEST['action'];
//echo $id;
$date = new DateTime();
$newdate=$date->getTimestamp();
//echo $newdate;
 $date->setTimestamp($newdate);
 $time=$date->format('Y-m-d H:i:s');
 

 if($action=="insert"){
		$sql="Insert into availability_log(id,userid,in_time,out_time) values(Null, '".$userid."','".$time."', Null);";
		//echo $sql;
		$result=$conn->query($sql);
		$last_id = $conn->insert_id;
		//$last_id["id"] = $conn->insert_id;
		//$data=array("Inserted_id"=>$last_id);
		
		$sql2 ="update `availability` set status='Yes' where userid='".$userid."' ";
		$result=$conn->query($sql2);
		
		
		echo "Inserted id:$last_id";
} 

 elseif($action=="update"){
	    $sql1="UPDATE availability_log set out_time='".$time."' where id='".$id."' ";
		$result1=$conn->query($sql1);
		$changed_rows=$conn->affected_rows;
		if($changed_rows>=1){
			echo  "Updated Successfully";
			
			
			$sql3 ="update `availability` set status='No' where userid='".$userid."' ";
			$result=$conn->query($sql3);
		}
		else{
			echo "Updation Failed";
		}
 }	
 else{
		echo "please enter valid details";
 }	

 

?>