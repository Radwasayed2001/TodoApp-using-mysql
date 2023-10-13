<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $conn = mysqli_connect("localhost","root","","todoapp");
    if(!$conn) {
        $_SESSION['errorUpdate'] = mysqli_connect_error($conn);
        header("location:../update.php?id={$_GET['id']}&title=$updatedtitle");
        die;
    }
    else {
        $updatedtitle = trim(htmlspecialchars(htmlentities($_POST['updatedtitle'])));
        if(empty($updatedtitle)){
            $_SESSION['errorUpdate'] = "This Field is required";
            header("location:../update.php?id={$_GET['id']}&title=$updatedtitle");
            die;
        }
        $sql = "UPDATE `tasks` SET `title`='$updatedtitle' WHERE `id`='{$_GET['id']}'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_affected_rows($conn) == 1) {
            $_SESSION['success'] = "Task Updated";
            header("location:../index.php");
            die;
        }
        else {
            $_SESSION['errorUpdate'] = "Failed";
            header("location:../update.php?id={$_GET['id']}&title=$updatedtitle");
            die;
        }
    }
}