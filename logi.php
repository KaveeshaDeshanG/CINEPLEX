<?php
include("dbconn.php");

session_start();

if(isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email and password match hardcoded value
    if($email == 'admin' && $password == 'admin') {
        $_SESSION['email'] = $email; 
        header("Location: userpro.php");
        exit();
    } else {
        // Check if email or password is empty
        if(empty($email) || empty($password)) {
            header("Location:login.php");
            exit();
            
        } else {

   
        
        $sql="Select * from register where email='$email'&& password='$password' ";

        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result))
        {
            $row=mysqli_fetch_assoc($result);

            if($row['email']==$email && $row['password']==$password){
               $_SESSION['uname'] = $row ['username']; 
                
                header("Location:index.php");
                exit();
            }

        }else{
            echo"empty";
            header("Location:login.php");
            exit();
        }
    }

}
}
else{
    echo"empty";
    header("Location:login.php");
    exit();
}



?>