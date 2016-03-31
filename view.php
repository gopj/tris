<?php 

include("controller.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Tr¡$</title>

	<style type="text/css">
		body {
				background-color:black;
				color:#259b24;
				font-family: "Consolas";

			}

	</style>
</head>
<body>

<?php

	
?>

<h2> Tris </h2>

<hr>

<h3> Total resultados por N° </h3>

<table>
	<thead>
		<tr>
			<th></th>
			<th>R1</th>
			<th>R2</th>
			<th>R3</th>
			<th>R4</th>
			<th>R5</th>
		</tr>
	</thead>
	<tbody>
		<?php 

			$arr_res = resultsr();

			for ($j=0; $j < 10; $j++) { 
				$r = $j+1;
				echo "<tr>";
				echo "<td> <strong> $j </strong> </td>";

				for ($i=0; $i < 5; $i++) { 
					echo "<td>" . $arr_res[$j][$i] . "</td>";

					$inv_arr_res[$i][$j] = $arr_res[$j][$i]; 

				}

				echo "</tr>";
			}			   
			
			echo "<pre>";
			print_r($inv_arr_res);
			echo "</pre>";
			//die();
		?>
	</tbody>
</table>

<hr>

<?php 
    // esta parte debe ir en el controlador como una función.
	
	for ($i=0; $i < 10; $i++) { 
		
		for ($j=0; $j < 5; $j++) { 
			
			$p[$j] = min($inv_arr_res[$j]);

			if(($key = array_search($p[$j], $inv_arr_res[$j])) !== false) {

				$p[$j] = $key;

				unset($inv_arr_res[$j][$key]);
			
			}

		}

		$diez[$i] = $p[0] . $p[1] . $p[2] . $p[3] . $p[4];

	}
	
	echo "<h3> Diez numeros del menos jugado al mas. </h3>";
	for ($i=0; $i < 10; $i++) { 
		$n = $i+1;
		echo $n . ": " . $diez[$i] . "<br>";
	}
	
?>


<hr>

<h3> Tabla de Resultado Historico </h3>

<table>
	<thead>
		<tr>
			<th>Concurso</th>
			<th>R1</th>
			<th>R2</th>
			<th>R3</th>
			<th>R4</th>
			<th>R5</th>
			<th>Fecha</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			if (all_results() != "") {

				$result = all_results();
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row["concurso"] . "</td>";
					echo "<td>" . $row["r1"] . "</td>";
					echo "<td>" . $row["r2"] . "</td>";
					echo "<td>" . $row["r3"] . "</td>";
					echo "<td>" . $row["r4"] . "</td>";
					echo "<td>" . $row["r5"] . "</td>";
					echo "<td>" . $row["fecha"] . "</td>";
					echo "</tr>";
				}
			} else {
				echo "0 results";
			}

		?>
	</tbody>
</table>

</body>
</html>