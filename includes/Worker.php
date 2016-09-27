<?php
require_once 'connection.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Worker
 *
 * @author elizabetho
 */
class Worker {
    public function addWorker($name, $surname, $location, $image, $employee_num) {
        global $conn;
        
        $sql = "INSERT INTO workers(name, surname, location, image, employee_num) VALUES(?,?,?,?,?)";
        $query = $conn->prepare($sql);
        
        $query->bindValue(1, $name);
        $query->bindValue(2, $surname);
        $query->bindValue(3, $location);
        $query->bindValue(4, $image);
        $query->bindValue(5, $employee_num);
                
        if ($query->execute() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function editWorker($id, $name, $surname, $location) {
        global $conn;
        
        $sql = "UPDATE workers SET name = ?, surname = ?, location = ? WHERE id = ?";
        $query = $conn->prepare($sql);
        
        $query->bindValue(1, $name);
        $query->bindValue(2, $surname);
        $query->bindValue(3, $location);
        $query->bindValue(4, $id);
        
        if ($query->execute() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function editWorkerImage($id, $image) {
        global $conn;
        
        $sql = "UPDATE workers SET image = ? WHERE id = ?";
        $query = $conn->prepare($sql);
        
        $query->bindValue(1, $image);
        $query->bindValue(2, $id);
        
        $query->execute();
        
        if ($query->rowcount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function deleteWorker($id) {
        global $conn;
        
        $sql = "DELETE FROM workers WHERE id = ?";
        $query = $conn->prepare($sql);
        
        $query->bindValue(1, $id);
        
        $query->execute();
        
        if ($query->rowcount() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function getWorkers() {
        global $conn;
        
        $sql = "SELECT * FROM workers";
        $query = $conn->prepare($sql);
        
        $query->execute();
        if ($query->rowcount() > 0) {
            return $query->fetchAll(PDO::FETCH_OBJ);
        } else {
            return false;
        }
    }

    public function getWorker($id) {
        global $conn;
        
        $sql = "SELECT * FROM workers WHERE id = ?";
        $query = $conn->prepare($sql);
        
        $query->bindValue(1, $id);
        $query->execute();
        if ($query->rowcount() > 0) {
            return $query->fetch(PDO::FETCH_OBJ);
        } else {
            return false;
        }
    }
}
