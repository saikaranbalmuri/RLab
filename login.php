<?php
include 'DBfile.php';

$username=$_REQUEST['username'];
$password=$_REQUEST['password'];

$hash = md5($password);
echo $hash;
$sql="SELECT userid,username,role,image from userdetails where username='".$username."' and password='".$password."'";
$result=$conn->query($sql);

if($result->num_rows>0)
{
	
 	while($row = $result->fetch_assoc()) 
	 {
	 	$value=$row;
	 }
}


echo json_encode($value);
//$row =mysqli_fetch_row($result);

//echo $row['userid'];
?>