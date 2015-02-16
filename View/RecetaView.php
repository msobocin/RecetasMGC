<?php
/**
 * @author Michal
 * @author Grace
 * @author Carlo
 */
require_once 'Controler/RecetaControler.php';
require_once 'Model/Receta.php';
require_once 'Model/Ingrediente.php';
require_once 'Controler/IngredienteControler.php';

class RecetaView {
	public function view($recetas) {
		echo '<div class="container-fluid" id="alto">';
		echo '<div class="row ">';
		
		echo '<div class="col-xs-12 col-sm-9 col-md-2 col-lg-2 ">';
		echo '</div>';
		
		echo '<div class="col-xs-12 col-sm-9 col-md-8 col-lg-8 ">';
		echo '<form role="form" id="recetas" action="recetas.php">';
		echo '<table class="table table-hover " width=70%>';
		echo "<thead>
			        <tr>
					  <th></th>
					  <th>Nombre</th>
			          <th>Descripcion</th>
			          <th>Tiempo</th>
			          <th>Comensales</th>
			        </tr>
			      </thead>
				<tbody>";
		
		foreach ( $recetas as $fila ) {
	
		
			
		
			echo "<tr>";
			echo '<td><img src="data:image/jpeg;base64,'.base64_encode($fila->getImagen()).'" class="img-responsive" alt="'.$fila->getNombre().'" width=200/></td>';
			echo "<td>" . $fila->getNombre () . "</td>";
			echo "<td>" . $fila->getDescripcion () . "</td>";
			echo "<td>" . $fila->getTiempo () . "</td>";
			echo "<td>" . $fila->getPersonas () . "</td>";
// 			echo '<td><input type="submit" name="enviar" value="ver" ';
			echo '<td><button type="submit" class="btn btn-default" name="receta" value="'.$fila->getId().'">Ver</button></td>';
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
	
	public function viewReceta($receta) {
		echo '<div class="container-fluid" id="alto">';
		?>
		<div class="row">
			<div class="col-sm-10 col-sm-offset-2">
			<h1><?php echo $receta->getNombre(); ?></h1>
			</div>
		</div>
		<div class="row ">
			<div class="col-sm-4 col-sm-offset-2">
				<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($receta->getImagen()).'" class="img-responsive" alt="'.$receta->getNombre().'" width=400/>'; ?>
			</div>
			<div class="col-sm-6">
				<h3>Ingredientes:</h3>
				<ul>
				<?php 
				foreach ($receta->getIngredientes() as $ingrediente) {
					echo '<li>';
					echo $ingrediente->getIngrediente().": ".$ingrediente->getCantidad()." ".$ingrediente->getUnidad();
					echo '</li>';
				}
				
				?>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<h3>Preparacion:</h3>
				<p><?php echo $receta->getPreparacion(); ?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3 col-sm-offset-6">
			<?php 
			
			echo '<a class="btn btn-default" href="generarpdf.php?id='.$receta->getId().'" role="button"  target="_blank">Descgarga como PDF</a>';
			
			?>
			</div>
		</div>
		<?php
		
		echo '</div>';
		
		
		
		?>
		
<script type="text/javascript" src="amcharts/amcharts.js"></script>
<script type="text/javascript" src="amcharts/pie.js"></script>
<script type="text/javascript" src="amcharts/themes/chalk.js"></script>

<style>
@import url(http://fonts.googleapis.com/css?family=Covered+By+Your+Grace);
#chartdiv {	
	width		: 100%;
	height		: 500px;
	font-size	: 11px;
}
</style>

<div id="chartdiv"></div>	

<?php 
$ingredienteControler=new IngredienteControler();

echo "<script>";

echo 'var chart = AmCharts.makeChart("chartdiv", {
    "type": "pie",	
	"theme": "none",
 		
    "legend": {
        "markerType": "circle",
        "position": "right",
		"marginRight": 80,		
		"autoMargins": false
    },
 		
    "dataProvider": [
    
 		';
 		
	foreach ($receta->getIngredientes() as $ingrediente) {
		echo '{
        "Ingrediente": "'.$ingrediente->getIngrediente().'",
        "Cantidad": '.$ingredienteControler->consultCuantas($ingrediente->getId()).'
    },';
	}

    echo '],
				
				
    "valueField": "Cantidad",
    "titleField": "Ingrediente",
    "balloonText": "[[title]]<br><span style=\'font-size:14px\'><b>[[value]]</b> ([[percents]]%)</span>",
    "exportConfig": {
        "menuTop":"0px",
        "menuItems": [{
            "icon": \'/lib/3/images/export.png\',
            "format": \'png\'
        }]
    }
});';
    echo 'chart.addTitle("Tenemos mas recetas con estos ingredientes");';
echo "</script>";
		
		
	?>	
		
<?php 
	}
	
}

?>


	
