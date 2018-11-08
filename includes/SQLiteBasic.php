<?php require_once 'SQLiteConnection.php';

	function enumRows($dbname){
		
		$conn = (new SQLiteConn)->connect($dbname);
		try{
			$rows = $conn->query('select count(*) from '.$dbname)->fetchColumn();
			return $rows;
		} catch(PDOException $e) {
			return "PDO/SQLite Error: " . $e->getMessage();
		}
	}
?>