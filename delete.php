<?php 
session_start();
include "connection.php"; 

if (isset($_GET['deleteid'])) {
    $sr_no = $_GET['deleteid'];
    $sql = "DELETE FROM `student` WHERE `sr_no`='$sr_no'";
    $data=mysqli_query($con,$sql);
     if ($data) {
      $_SESSION['flash_message'] = "deleted successfully ";
       header('location:display.php');
     }
} 
?>