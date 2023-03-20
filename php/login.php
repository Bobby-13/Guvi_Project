<?php


$email=$_POST['email'];
$pswd=$_POST['password'];

$conn=mysqli_connect("localhost","root","","login") or die ('Connection failed');
$select = mysqli_query($conn, "SELECT * FROM register WHERE email = '$email'");

if(mysqli_num_rows($select) < 1){
    echo "Not yet Registered"; 
  }

else{
    $select1 = mysqli_query($conn, "SELECT * FROM register WHERE email = '$email' && Password = '$pswd'");
   if(mysqli_num_rows($select1) > 0){
      echo "Your Profile"; 
    } 
    else{
        echo "wrong Password";
    }
}

?>