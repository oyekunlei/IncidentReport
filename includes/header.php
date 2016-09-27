<?php
session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Water Incident Report System</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/animate.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                    </button>
                    <a class="navbar-brand" href="index.jsp">Water Incident Report System</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <?php
                        if (isset($_SESSION['admin'])) {
                            $admin = $_SESSION['admin'][0];
                            ?>
                            <li><a href="issues.php"><span class="fa fa-warning"></span> Issues</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa fa-group"></span> Workers
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="workers.php">View Workers</a></li>
                                    <li><a href="addworker.php">Add Worker</a></li>
                                </ul>
                            </li>
                            <li><a href="reports.php"><span class="fa fa-bar-chart"></span> Reports</a></li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa fa-user"></span> <?php echo $admin->name; ?>
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="src/logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                        <?php
                    }
                    else
                    {
                    ?>
                        <li class="active"><a href="index.php"><span class="fa fa-home"></span> Home</a></li>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </nav>
