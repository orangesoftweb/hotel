<?php

function reservation($floor, $room, $action, $list_rooms) {
	//Se evalua la accion del usuario dependiendo de lo contenido en el arreglo
	//Si la columna elegida por el usuario esta libre se modifica el arreglo con la opcion elegida
	if($list_rooms[$floor-1][$room-1] == "L") {
		$list_rooms[$floor-1][$room-1] = $action;
	}
	//Si la habitacion elegida por el usario esta ocupada se muestra una notificacion en cada caso
	else if($list_rooms[$floor-1][$room-1] == "O") {
		echo "<script>alert('La habitación ya esta ocupada. ";
		
		if($action == "L") {echo "No se puede liberar";}//Free
		else if($action == "R") {echo "No se puede reservar";}//Reserved
		else if($action == "O") {echo "No se puede volver a ocupar";}//Occupied
		echo " ') ";
		echo "</script>'";
	}
		//Si la habitacion elegida por el usuario esta reservada y la opción es reservar se muetra una alerta
		else if($list_rooms[$floor-1][$room-1] == "R" && $action == "R") {
			echo "<script> alert('La habitación ya esta reservada'); </script>'";
		}
		//Si la habitación esta reservada y la opcion es diferente a reservar se modifica el arreglo
		else if($list_rooms[$floor-1][$room-1] == "R" && $action != "R") {
			$list_rooms[$floor-1][$room-1] = $action;
		}
	//Se retorna el arreglo modificado
	return $list_rooms;
}

function hotel($list_rooms) {
	//Se crea una tabla
	echo "<center><table border='1'>";
		echo "<tr>";
		echo "<th colspan='6'>HABITACIONES</th>";
		echo "<tr>";
			
			echo "<th></th>
			<th>1</th>
			<th>2</th>
			<th>3</th>
			<th>4</th>
			<th>5</th>
		</tr>";
	
	//Se recorre todo el array con un foreach y se imprime cada habitacion y piso
	$i = 1;
	foreach($list_rooms as $room) {
		echo "<tr>";
			echo "<th>";
			echo $i;
			echo "</th>";
		foreach($room as $index) {
			echo "<td>";
				if($index=="R") echo "<font color=green>".$index ."</font>";
				if($index=="O") echo "<font color=red>".$index ."</font>";
				if($index=="L") echo "<font color=blue>".$index ."</font>";
			echo "</td>";
		}
		echo "</tr>";
		$i++;
	}
	echo "</table>";
}
?>