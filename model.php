<?php 
		$conn = conn();
		// This function is used to create connections to the DB
		function conn() {
			$servername = "localhost";
			$username = "root";
			$password = "";

			// Create connection
			$conn = new mysqli($servername, $username, $password);

			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}

			return $conn;
		}

		// This function return all the results from table resultados, concurso > 11032
		function all_results() {
			$conn = conn();
			
			$sql = "SELECT * FROM tris.resultados where concurso > 11032 order by concurso desc ; ";
			$result = $conn->query($sql);

			return $result;

		}

		function resultsr(){
			$conn = conn();

			$arr_result = array();
			
			for ($j=0; $j < 5; $j++) { 

				$r = $j + 1;
			
				for ($i=0; $i < 10; $i++) { 

					$sql = "SELECT count(r{$r}) from tris.resultados where r{$r}={$i} and concurso > 11032;";
					$result = $conn->query($sql);

					$row = $result->fetch_assoc();

					$arr_result[$i][$j] = $row["count(r{$r})"];
				}

			}

			return $arr_result;
		}

		
		$conn->close();
?>