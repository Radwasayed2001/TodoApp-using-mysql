<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $conn = mysqli_connect("localhost","root","","todoapp");
    if(!$conn) {
        $_SESSION['error'] = mysqli_connect_error($conn);
        header("location: ../index.php");
        die;
    }
    else {
        $title = trim(htmlspecialchars(htmlentities($_POST['title'])));
        if(empty($title)){
            $_SESSION['error'] = "This Field is required";
            header("location: ../index.php");
            die;
        }
        $sql = "INSERT INTO `tasks`(`title`) VALUES ('$title')";
        $result = mysqli_query($conn, $sql);
        if (mysqli_affected_rows($conn) == 1) {
            $_SESSION['success'] = "Task Added";
            header("location: ../index.php");
            die;
        }
        else {
            $_SESSION['error'] = "Failed";
            header("location: ../index.php");
            die;
        }
    }
}