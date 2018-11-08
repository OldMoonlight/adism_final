<?php require_once 'SQLiteConnection.php';

	function fetchMail($id){
		
		$conn = (new SQLiteConn)->connect('mail');
		try{
			$sql = "SELECT mail_id, name, email, subject, message, IP, timestamp
					FROM mail
					WHERE mail_id = ? ";
			$stmt = $conn->prepare($sql);


			return $stmt->execute(array ($id)) ? $stmt->fetchAll() : false;
		} catch(PDOException $e) {
			return "PDO/SQLite Error: " . $e->getMessage();
		}
	}
	
	function fetchOffsetMail($limit, $page){
		
		$conn = (new SQLiteConn)->connect('mail');
		try{
			$sql = "SELECT mail_id, name, email, subject, IP, read, timestamp
					FROM mail
					ORDER BY timestamp DESC
					LIMIT :offset,:limit";
			$stmt = $conn->prepare($sql);
			
			$offset = $page * $limit;
			$stmt->bindValue (':limit',       $limit);
			$stmt->bindValue (':offset',      $offset);
			return $stmt->execute() ? $stmt->fetchAll() : false;
		} catch(PDOException $e) {
			return "PDO/SQLite Error: " . $e->getMessage();
		}
    }

	function addMail ($name, $email, $subject, $message, $IP){
		
		$conn = (new SQLiteConn)->connect('mail');
		try{
			$sql = "INSERT INTO mail (name, email, subject, message, IP, timestamp, read)
					VALUES (:name, :email, :subject, :message, :IP, :timestamp, 0)";
			$stmt = $conn->prepare($sql);
		
			$timestamp = mktime ();
			$stmt->bindParam(':name',         $name);
			$stmt->bindParam(':email',        $email);
			$stmt->bindParam(':subject',      $subject);
			$stmt->bindParam(':message',      $message);
			$stmt->bindParam(':IP',           $IP);
			$stmt->bindParam(':timestamp',    $timestamp);
		
			return $stmt->execute();
		} catch(PDOException $e) {
			return "PDO/SQLite Error: : " . $e->getMessage();
		}
	}

	function unreadMail (){
	
		$conn = (new SQLiteConn)->connect('mail');
		try{
			$rows = $conn->query('select count(*) from mail where read = 0')->fetchColumn();
			return ($rows) ? $rows : 0 ;
		} catch(PDOException $e) {
			return "PDO/SQLite Error: " . $e->getMessage();
		}
	}
	
	function deleteMail($id){
		
		$conn = (new SQLiteConn)->connect('mail');
		try{
			$sql = "DELETE FROM mail
					WHERE mail_id = :mail_id";
			$stmt = $conn->prepare($sql);
			
			$stmt->bindParam(':mail_id',     $id);
			return $stmt->execute();
		} catch(PDOException $e) {
			return "PDO/SQLite Error: : " . $e->getMessage();
		}
	}