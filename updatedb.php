
<?php
include("dbconn.php");

if(isset($_GET['id'])){
$update=$_GET['id'];
echo $update;

$uName=$_POST['uName'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$password=$_POST['password'];

// echo $fname.$lname.$mnumber.$address.$email.$password;

$sql = "UPDATE register SET username='$uName', phone='$phone', email='$email', password='$password' WHERE id='$update'";
$resut=mysqli_query($conn,$sql);

if($resut){
    header("Location:userpro.php");
}
else
{
echo"Error".$sql."<br>".mysqli_error($conn);
}


}
?>