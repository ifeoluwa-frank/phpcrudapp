<?php
include_once 'connection/db.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = mysqli_query($conn, "DELETE FROM `books` WHERE id = '$id'");
    header('Location: index.php');
}