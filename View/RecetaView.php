<?php
require_once 'model/Book.php';

require_once 'model/Author.php';
require_once 'controler/AuthorControler.php';

class BookView {

	public function view($recetas) {
		?>
		<table class="table table-hover">
			<tr>
					<th>Nombre</th>
					<th>Ingredientes</th>
					<th>Preparacion</th>
					<th>Tiempo</th>
			</tr>
			
		  <?php
		  		foreach ($recetas as $receta) {
	
					echo "<tr>";					
					echo "<td>" . $receta->getNombre() . "</td>";
					echo "<td>" . $receta->getIngrediente() . "</td>";
					echo "<td>" . $receta->getPreparacion() . "</td>";
					echo "<td>" . $receta->getTiempo() . "</td>";
					echo "<tr>";
				}
	
			?>
		  
		</table>
		
		<?php
	}
	
}

	?>
	
