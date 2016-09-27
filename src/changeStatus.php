<?php

session_start();
require_once '../includes/issue.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$issue = new Issue();
if (isset($_POST['id'], $_POST['status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];

    if ($issue->changeStatus($id, $status)) {
        $_SESSION['success'] = "Status Changed";
        header("Location: ../issue.php?id=" . $id);
    } else {
        header("Location: ../issue.php?id=" . $id);
    }
} else {
    $_SESSION['error'] = "Something went wrong";
    header("Location: ../issue.php?id=" . $id);
}
