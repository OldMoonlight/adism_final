<?php require_once 'SQLiteConnection.php';

	function logAttempt(){
		$conn = (new SQLiteConn)->connect('logins');
		try{
			$datemonth = array(':datemonth' => date('nY'));
			
			$stmt = $conn->prepare('SELECT attempts FROM logins WHERE :datemonth');
			$result = $stmt->execute($datemonth);
			if($result){
				$stmt = $conn->prepare('UPDATE logins SET attempts=attempts+1 WHERE datemonth=:datemonth');
				return $stmt->execute($datemonth);
			} else {
				$stmt = $conn->prepare('INSERT INTO logins (datemonth, attempts) VALUES (:datemonth, 1);');
				$result = $stmt->execute($datemonth);
			} return $result;
			
		} catch(PDOException $e) {
			return "PDO/SQLite Logging Error:  " . $e->getMessage();
		}
	}

	
	function fetchAttempts($datemonth){
		
		$conn = (new SQLiteConn)->connect('logins');
		try{
			$sql = "SELECT attempts
					FROM logins
					WHERE datemonth = ? ";
			$stmt = $conn->prepare($sql);

			return $stmt->execute(array ($datemonth)) ? $stmt->fetch() : false;
		} catch(PDOException $e) {
			return "PDO/SQLite fetch Error: " . $e->getMessage();
		}
	}

	

	
	function fetchLog(){
		
		$conn = (new SQLiteConn)->connect('logins');
		try{
			$sql = "SELECT attempts, datemonth
					FROM logins";
			$stmt = $conn->prepare($sql);

			return $stmt->execute() ? $stmt->fetchAll() : false;
		} catch(PDOException $e) {
			return "PDO/SQLite fetch Error: " . $e->getMessage();
		}
	}
	
	function deleteLogin($id){
		
		$conn = (new SQLiteConn)->connect('logins');
		try{
			$sql = "DELETE FROM logins
					WHERE login_id = :login_id";
			$stmt = $conn->prepare($sql);
			
			$stmt->bindParam(':login_id',     $id);
			return $stmt->execute();
		} catch(PDOException $e) {
			"PDO/SQLite Error: : " . $e->getMessage();
		}
	}