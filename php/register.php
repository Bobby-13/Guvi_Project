<?php

   $name = $_POST['name'];
   $email = $_POST['email'];
   $pass = $_POST['password'];
   $cpass = $_POST['cpassword'];
   
   //SQL Connection
   $conn=mysqli_connect("localhost","root","","login") or die ('Connection failed');
   $select = mysqli_query($conn, "SELECT * FROM register WHERE email = '$email'");

   //Mongo Connection
   require_once   'C:\xampp\htdocs\Projectphp\vendor\autoload.php';
   $dbcon = new MongoDB\Client('mongodb://localhost:27017');
   $mydb = $dbcon->Aaaa;
   $mycol = $mydb->Baa;

   $document = array(
   "name" => $name,
   "pass" => $pass,
   "email" => $email,
   "dob" => "00/00/0000",
   "age" => "nil",
   "bio" => "your words",
   "phno" => "91+",
   "address" =>"your location"
   );


// $find = ['email'=> $email];
// $count = $mycol->findOne($find);
// if($count != null){
//     echo "user Already  exist";
// }

    // $val = $mycol->insertOne($document);
    // if($val){
    //     echo "Data inserted successfully";
    // }
    // else{
    //     echo "Data not  inserted successfully";
    // }
 

   if(mysqli_num_rows($select) > 0){
      echo "user already exist"; 
    }
    else if($pass != $cpass){
        echo "Password Mismatch"; 
      }
    else{
         $insert = mysqli_query($conn, "INSERT INTO register(UserName, email, Password) VALUES('$name', '$email', '$pass')") or die('query failed');
         $val = $mycol->insertOne($document);
         if($insert && $val){
            echo "registered successfully!";
         }else{
           echo "registeration failed!";
         }
      }



?> 