<?php
try{
    $pdo =new PDO('mysql:host =localhost;dbname=blog','root','');
}catch (PDOException $e){
    exit('Database error');
}

// $host="127.0.0.1";
// $user="root";
// $pass="";
// $database="blog";


// $connect= mysqli_connect($host,$user,$pass,$database);
// if(mysqli_connect_error()){
//     die("not connected to database".mysqli_connect_error());

// }else{
//     echo "database connected";
// }
?>