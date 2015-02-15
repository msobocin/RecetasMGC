<?php
/**
 * @author Michal
 * @author Grace
 * @author Carlo
 */
require_once 'Controler/RecetaControler.php';
require_once 'Model/Receta.php';
require_once 'Model/Ingrediente.php';

class RecetaView {
	public function view($recetas) {
		echo '<div class="container-fluid" id="alto">';
		echo '<div class="row ">';
		
		echo '<div class="col-xs-12 col-sm-9 col-md-2 col-lg-2 ">';
		echo '</div>';
		
		echo '<div class="col-xs-12 col-sm-9 col-md-8 col-lg-8 ">';
		echo '<form role="form" id="recetas" action="addRecipe.php">';
		echo '<table class="table table-hover " width=70%>';
		echo "<thead>
			        <tr>
					  <th>Nombre</th>
			          <th>Descripcion</th>
			          <th>Tiempo</th>
			          <th>Comensales</th>
			        </tr>
			      </thead>
				<tbody>";
		
		foreach ( $recetas as $fila ) {
			echo "<tr>";
			echo "<td>" . $fila->getNombre () . "</td>";
			echo "<td>" . $fila->getDescripcion () . "</td>";
			echo "<td>" . $fila->getTiempo () . "</td>";
			echo "<td>" . $fila->getPersonas () . "</td>";
			echo '<td><input type="submit" name="enviar" value="ver" ';
			echo "</tr>";
		}
		echo "</tbody></table>";
		
		echo '</form>';
		echo "</div>";
		
		echo '<div class="col-xs-12 col-sm-9 col-md-2 col-lg-2 ">';
		echo '</div>';
		echo "</div>";
		
		echo "</div>";
	}
}

?>
	
