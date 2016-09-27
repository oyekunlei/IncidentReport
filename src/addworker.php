<?php
session_start();
require_once '../includes/Worker.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$worker = new Worker();
if (isset($_POST['name'], $_POST['surname'], $_POST['location']) && !empty($_FILES['image'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $location = $_POST['location'];
    $image = $_FILES['image']['name'];
    $path = "../workers/" . $image;
    $image_path = "workers/" . $image;
    $employee_num = hexdec(uniqid());

    if(move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
        if ($worker->addWorker($name, $surname, $location, $image_path, $employee_num)) {
            $_SESSION['success'] = "Worker has been added successfully";
            header("Location: ../workers.php");
        } else {
            header("Location: ../addworker.php");
        }
    } else {
        $_SESSION['error'] = "Image could not be uploaded";
        header("Location: ../addworker.php");
    }
} else {
    $_SESSION['error'] = "Please fill in all fields correctly";
    header("Location: ../addworker.php");
}
