<?php

require_once 'connection.php';

class Issue {

    public function add($reporterID, $title, $description, $lng, $lat) {
        global $conn;

        $sql = "INSERT INTO issues(reporterID, title, description, lng, lat) VALUES(?,?,?,?,?)";
        $query = $conn->prepare($sql);

        $query->bindValue(1, $reporterID);
        $query->bindValue(2, $title);
        $query->bindValue(3, $description);
        $query->bindValue(4, $lng);
        $query->bindValue(5, $lat);

        if ($query->execute() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function edit($id, $title, $description, $lng, $lat) {
        global $conn;

        $sql = "UPDATE issues SET title = ?, description = ?, lng = ?, lat = ? WHERE id = ?";
        $query = $conn->prepare($sql);

        $query->bindValue(1, $title);
        $query->bindValue(2, $description);
        $query->bindValue(3, $lng);
        $query->bindValue(4, $lat);
        $query->bindValue(5, $id);

        if ($query->execute() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function changeStatus($id, $status) {
        global $conn;

        $sql = "UPDATE issues SET status = ? WHERE id = ?";
        $query = $conn->prepare($sql);

        $query->bindValue(1, $status);
        $query->bindValue(2, $id);

        if ($query->execute() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function unresolve($id) {
        global $conn;

        $sql = "UPDATE issues SET status = 'unresolved' WHERE id = ?";
        $query = $conn->prepare($sql);

        $query->bindValue(1, $id);

        if ($query->execute() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getIssues() {
        global $conn;

        $sql = "SELECT * FROM issues";
        $query = $conn->prepare($sql);

        $query->execute();
        if ($query->rowcount() > 0) {
            return $query->fetchAll(PDO::FETCH_OBJ);
        } else {
            return false;
        }
    }

    public function getIssue($id) {
        global $conn;

        $sql = "SELECT * FROM issues WHERE id = ?";
        $query = $conn->prepare($sql);

        $query->bindValue(1, $id);

        $query->execute();
        if ($query->rowcount() > 0) {
            return $query->fetch(PDO::FETCH_OBJ);
        } else {
            return false;
        }
    }

    public function getIssuesByStatus($status) {
        global $conn;

        $sql = "SELECT * FROM issues WHERE status = ?";
        $query = $conn->prepare($sql);

        $query->bindValue(1, $status);

        $query->execute();
        if ($query->rowcount() > 0) {
            return $query->fetchAll(PDO::FETCH_OBJ);
        } else {
            return false;
        }
    }

}

?>