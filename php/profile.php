<?php

require_once   'C:\xampp\htdocs\Projectphp\vendor\autoload.php';
$dbcon = new MongoDB\Client('mongodb://localhost:27017');
$mydb = $dbcon->Aaaa;
$mycol = $mydb->Baa;

 $email=$_POST['email'];
 $pswd=$_POST['pswd'];

$document = $mycol->findOne(['email' => $email]);

$obj=array(
   'name'=> $document['name'],
   'email'=> $document['email'],
   'dob'=> $document['dob'],
   'age'=>$document['age'],
   'bio'=>$document['bio'],
   'address'=>$document['address'],
   'phno'=>$document['phno'],
);

echo json_encode($obj);


?>