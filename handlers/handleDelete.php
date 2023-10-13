<?php

session_start();
if (isset($_GET['id'])){
$conn = mysqli_connect("localhost", "root", "", "todoapp");
if (!$conn) {
    $_SESSION['error'] =  mysqli_connect_error($conn);
    header("location:../index.php");
    die;
}
$sql = "DELETE FROM `tasks` WHERE `id` = {$_GET['id']}";
$result = mysqli_query($conn, $sql);
if (mysqli_affected_rows($conn) == 1){
    $_SESSION['success'] = "Task Deleted";
    header("location: ../index.php");
    die;
}
else {
    $_SESSION['error'] =  "Failed";
    header("location:../index.php");
    die;
}
}
else {
    header("location:../index.php");
    die;
}