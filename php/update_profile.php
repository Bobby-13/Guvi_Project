<?php

require_once   'C:\xampp\htdocs\Projectphp\vendor\autoload.php';
$dbcon = new MongoDB\Client('mongodb://localhost:27017');
$mydb = $dbcon->Aaaa;
$mycol = $mydb->Baa;
 

 $email=$_POST['email'];
 $name=$_POST['name'];
 $dob=$_POST['dob'];
 $age=$_POST['age'];
 $address=$_POST['address'];
 $bio=$_POST['bio'];
 $phno=$_POST['phno'];

$filter = [ 'email' => $email];

$update = [
    '$set' => [ 
        'name' => $name,
        'dob'=> $dob,
        'age' => $age ,
        'address' =>$address,
        'bio' => $bio,
        'phno' => $phno,
    ]
];

$result = $mycol->updateOne($filter, $update);

if ($result->getModifiedCount() > 0) {
    
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
} else {
    echo "No documents were updated";
}


?>