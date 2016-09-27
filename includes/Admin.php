<?php

require_once 'connection.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author elizabetho
 */
class Admin {

    public function login($username, $password) {
        global $conn;

        $sql = "SELECT * FROM admins WHERE username = ? AND password = ?";
        $query = $conn->prepare($sql);

        $query->bindValue(1, $username);
        $query->bindValue(2, $password);

        $query->execute();
        if ($query->rowcount() > 0) {
            return $query->fetchAll(PDO::FETCH_OBJ);
        } else {
            return false;
        }
    }

}
