<?php

$conn = mysqli_connect("localhost","root","");
$sql = "CREATE DATABASE IF NOT EXISTS todoapp";
$result  = mysqli_query($conn,$sql);
$conn = mysqli_connect("localhost","root","","todoapp");
$sql = "CREATE TABLE IF NOT EXISTS tasks(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `title` VARCHAR(200) NOT NULL
    )";
$result  = mysqli_query($conn,$sql);
mysqli_close($conn);