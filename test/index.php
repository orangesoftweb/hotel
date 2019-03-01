<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Reservaciones</title>
</head>

<?php
include ('library.php');
	
	if(isset($_POST['send'])) {
		//Se toma la información del formulario
		$floor = $_POST['floor'];
		$room = $_POST['room'];
		$action = $_POST['action'];
		$options = $_POST['list_rooms'];
		
		//El string generado en el input oculto se convierte en un array
		$count = 0;
		for($i = 0; $i <= 4; $i++) {
			for($j = 0; $j <= 4; $j++) {
				$count = 5 * $i + $j;
				//Cada captura cada elemento del array extrayendo dicho elemento del string
				$list_rooms[$i][$j] = substr($options, $count, 1);
			}
			$count = 0;
		}
		//Se devuelve el array con la informacion modificada por el usuario
		$list_rooms = reservation($floor, $room, $action, $list_rooms);
		
		//Se ejecuta la funcion para mostrar el hotel, dado el array modificado
		hotel($list_rooms);//funcion para mostrar las habitaciones en el hotel
	}
	else if(isset($_POST['delete']) || !isset($_POST['send'])) {
		$list_rooms = array(array("L", "L", "L", "L", "L"), array("L", "L", "L", "L", "L"),array("L", "L", "L", "L", "L"), array("L", "L", "L", "L", "L"), array("L", "L", "L", "L", "L"));
		
		hotel($list_rooms);//Funcion para mostrar las habitaciones en el hotel
	}
	
?>
<body>
	<table style="margin: auto;" border="1">
		
		<form action="index.php" method="post">
			<!-- Se separa el array $list_rooms en un string y se oculta -->
			<input type="text" name="list_rooms" value="<?php 
			foreach($list_rooms as $room) {
				foreach($room as $floor) {
					echo $floor;
				}
			}
			?>" style="display: none">
			
			<!-- Se crean los input que van a capturar la informacion introducida por el usuaario -->
			<tr>
				<td>Piso:</td>
				<td><input type="text" name="floor"></td>
			</tr>
			<tr>
				<td>Habitacion:</td>
				<td><input type="text" name="room"></td>
			</tr>
			<tr>
				<td>Reservar:</td>
				<td><input type="radio" name="action" value="R"></td>
			</tr>
			<tr>
				<td>Ocupar:</td>
				<td><input type="radio" name="action" value="O"></td>
			</tr>
			<tr>
				<td>Liberar:</td>
				<td><input type="radio" name="action" value="F"></td>
			</tr>
			<tr>
				<td><input type="submit" name="send" value="Reservar"></td>
				<td><input type="submit" name="delete" value="Cancelar"></td>
			</tr>
			
		</form>
		
		<br>
	
	</table>
	<p>F= Libre, R= Reservada, O= Ocupada</p>
</body>
</html>