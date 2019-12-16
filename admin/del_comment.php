<?php

session_start();

if(isset($_SESSION['mail'])&&(isset($_SESSION['pass']))){
    define('SECURITY',true);
    include_once('../config/connect.php');
    $comm_id = $_GET['comm_id'];
    $sql = "DELETE FROM comment WHERE comm_id = $comm_id";
    $query = mysqli_query($conn,$sql);
    header('location: index.php?page_layout=comment');
}else{
header('location:index.php');
}
