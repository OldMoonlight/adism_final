<?php require_once 'SQLiteConnection.php';

	function fetchUpdate($id){
		
		$conn = (new SQLiteConn)->connect('updates');
		try{
			$sql = "SELECT title, content, timestamp
					FROM updates
					WHERE update_id = ? ";
			$stmt = $conn->prepare($sql);


			return $stmt->execute(array ($id)) ? $stmt->fetchAll() : false;
		} catch(PDOException $e) {
			return "PDO/SQLite Error: " . $e->getMessage();
		}
	}
	
	function fetchOffsetUpdates($limit, $page){
		
		$conn = (new SQLiteConn)->connect('updates');
		try{
			$sql = "SELECT update_id, title, content, timestamp
					FROM updates
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


	function editUpdate($id, $title, $content){
		
		$conn = (new SQLiteConn)->connect('updates');
		try{
			$sql = "UPDATE updates 
				   SET title = :title, content = :content
				   WHERE update_id = :update_id";
			$stmt = $conn->prepare($sql);
			
			$stmt->bindValue(':update_id',    $id);
			$stmt->bindValue(':title',        $title);
			$stmt->bindValue(':content',      $content);
			
			return $stmt->execute();
		} catch(PDOException $e) {
			return "PDO/SQLite Error:  " . $e->getMessage();
		}
	}


	function addUpdate ($title, $content){
		
		$conn = (new SQLiteConn)->connect('updates');
		try{
			$sql = "INSERT INTO updates (title, content, timestamp)
					VALUES (:title,  :content, :timestamp)";
			$stmt = $conn->prepare($sql);
		
			$timestamp = mktime ();
			$stmt->bindParam(':title',              $title);
			$stmt->bindParam(':content',            $content);
			$stmt->bindParam(':timestamp',          $timestamp);
		
			return $stmt->execute();
		} catch(PDOException $e) {
			return "PDO/SQLite Error: : " . $e->getMessage();
		}
	}
	
	function deleteUpdate($id){
		
		$conn = (new SQLiteConn)->connect('updates');
		try{
			$sql = "DELETE FROM updates
					WHERE update_id = :update_id";
			$stmt = $conn->prepare($sql);
			
			$stmt->bindParam(':update_id',     $id);
			return $stmt->execute();
		} catch(PDOException $e) {
			return "PDO/SQLite Error: : " . $e->getMessage();
		}
	}?>