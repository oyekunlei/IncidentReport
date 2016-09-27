<?php

session_start();
require_once '../includes/Worker.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$worker = new Worker();
if (isset($_POST['id']) && !empty($_FILES['image'])) {
    $id = $_POST['id'];
    $image = $_FILES['image']['name'];
    $path = "../workers/" . $image;
    $image_path = "workers/" . $image;

    if(move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
        if ($worker->editWorkerImage($id, $image_path)) {
            $_SESSION['success'] = "Worker image has been edited successfully";
            header("Location: ../editworker.php?id=". $id);
        } else {
            header("Location: ../editworker.php?id=". $id);
        }
    } else {
        $_SESSION['error'] = "Image could not be uploaded";
        header("Location: ../editworker.php?id=". $id);
    }
} else {
    $_SESSION['error'] = "Please fill in all fields correctly";
    header("Location: ../editworker.php?id=". $id);
}
