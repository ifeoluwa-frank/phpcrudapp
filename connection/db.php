<?php
$conn = mysqli_connect('localhost', 'root', '', 'bookshop');
if($conn){
//   echo "Connection Successful";
}else if($conn->connect_error){
    die('Connection failed: ' . $conn->connect_error );
}