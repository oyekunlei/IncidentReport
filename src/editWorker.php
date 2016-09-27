<?php

session_start();
require_once '../includes/Worker.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$worker = new Worker();
if (isset($_POST['id'], $_POST['name'], $_POST['surname'], $_POST['location'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $location = $_POST['location'];

    if ($worker->editWorker($id, $name, $surname, $location)) {
        $_SESSION['success'] = "Worker has been edited successfully";
        header("Location: ../editworker.php?id=". $id);
    } else {
        $_SESSION['error'] = "Worker could not be edited. Please try again";
        header("Location: ../editworker.php?id=". $id);
    }
} else {
    $_SESSION['error'] = "Please fill in all fields correctly";
    header("Location: ../editworker.php?id=". $id);
}
