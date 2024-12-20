<?php
include("dbconn.php");

$uName=$_POST['uName'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$password=$_POST['password'];


$sql= "Insert into register(username,phone,email,password)values('$uName','$phone','$email','$password')";

if(mysqli_query($conn,$sql)){
    echo"new record created successfully";
    header("Location:userpro.php");
}
else
{
    echo"Error".$sql."<br>".mysqli_error($conn);

}


?>