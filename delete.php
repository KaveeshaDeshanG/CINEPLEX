<?php
include("dbconn.php");

if(isset($_GET['id'])){
$update=$_GET['id'];
echo $update;

$sql="delete from register where id=$update";
$result=mysqli_query($conn,$sql);
if($result){
    header("Location:userpro.php");
}
else
{
echo"Error".$sql."<br>".mysqli_error($conn);
}


}
?>