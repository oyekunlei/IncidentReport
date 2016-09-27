<?php
	require_once 'connection.php';
	class User{
		public function register($name, $surname, $email, $phone, $username, $password)
		{
			global $conn;

			$sql = "INSERT INTO users(name, surname, email, phone, username, password) VALUES(?,?,?,?,?,?)";
			$query = $conn->prepare($sql);
			$query->bindValue(1, $name);
			$query->bindValue(2, $surname);
			$query->bindValue(3, $email);
			$query->bindValue(4, $phone);
			$query->bindValue(5, $username);
			$query->bindValue(6, $password);

			if($query->execute() > 0)
			{
				return true;
			}
			else{
				return false;
			}
		}

		public function login($username, $password)
		{
			global $conn;

			$sql = "SELECT * FROM users WHERE username = ? AND password = ?";
			$query = $conn->prepare($sql);
			$query->bindValue(1, $username);
			$query->bindValue(2, $password);

			$query->execute();
			if($query->rowcount() > 0)
			{
				return $query->fetchAll(PDO::FETCH_OBJ);
			}
			else
			{
				return false;
			}
		}

		public function edit($id, $name, $surname, $email, $phone)
		{
			global $conn;

			$sql = "UPDATE users SET name = ?, surname = ?, email = ?, phone = ? WHERE id = ?";
			$query = $conn->prepare($sql);
			$query->bindValue(1, $name);
			$query->bindValue(2, $surname);
			$query->bindValue(3, $email);
			$query->bindValue(4, $phone);
			$query->bindValue(5, $id);

			if($query->execute() > 0)
			{
				return true;
			}
			else{
				return false;
			}
		}

		public function editPassword($id, $password)
		{
			global $conn;

			$sql = "UPDATE users SET password = ? WHERE id = ?";
			$query = $conn->prepare($sql);
			$query->bindValue(1, $password);
			$query->bindValue(2, $id);

			if($query->execute() > 0)
			{
				return true;
			}
			else{
				return false;
			}
		}
                
                public function getUser($id) {
                    global $conn;

			$sql = "SELECT * FROM users WHERE id = ?";
			$query = $conn->prepare($sql);
			$query->bindValue(1, $id);

			$query->execute();
			if($query->rowcount() > 0)
			{
				return $query->fetch(PDO::FETCH_OBJ);
			}
			else
			{
				return false;
			}
                }
	}
?>