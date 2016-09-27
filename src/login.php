<?php
session_start();
require_once '../includes/Admin.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$admin = new Admin();
if(isset($_POST['username'], $_POST['password']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if($admin->login($username, $password) != null && $admin->login($username, $password) != FALSE)
    {
        $_SESSION['admin'] = $admin->login($username, $password);
        header("Location: ../issues.php");
    }
    else
    {
        $_SESSION['error'] = "Incorrect username or password";
        header("Location: ../index.php");
    }
}

