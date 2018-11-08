<?php
		date_default_timezone_set('America/Port_of_Spain');
		
		class SQLiteConn{

			function connect($db_name)
			{
				$db_type   = 'sqlite';
				$db_path     = __DIR__ . "/../db/".$db_name.".db";
				$pdo = null;
				
				try{
					$pdo = new PDO($db_type . ':' . $db_path);
					$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					return $pdo;
				}  
				catch (PDOException $e){
					return $e->getMessage();
				}
			}
		}
?>