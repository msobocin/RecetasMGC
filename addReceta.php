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

require_once 'View/libHTML.php';
require_once 'View/RecetaView.php';

head();

$receta=new Receta();
$ingrediente=new Ingrediente();
$exito = array(
			    "succes" => false,
			    "id" => 0,
				);

if (isset($_REQUEST['enviar'])) {
	
	$cuantos=count($_REQUEST['ingredientes']);
	$arrIngredientes=array();
	for ($i = 0; $i < $cuantos; $i++) {
		$ingrediente->setAll($_REQUEST['ingredientes'][$i],"","",$_REQUEST['cantidad'][$i]);
		array_push($arrIngredientes, clone $ingrediente);
	}
	$imagen=fopen($_FILES['imagen']['tmp_name'], 'rb');
	$receta->setAll(0,$_REQUEST['nom'],$_REQUEST['descripcion'],$arrIngredientes,$_REQUEST['preparacion'],$_REQUEST['tiempo'],$_REQUEST['personas'],$imagen);
	
	$recetaControler = new RecetaControler();
	$exito=$recetaControler->save($receta);
	

}
?>
	<div class="container-fluid">
		<form role="form" enctype="multipart/form-data" method="post" class="form-horizontal col-sm-8 col-sm-offset-2" action="addReceta.php">
		<?php 
		if (isset($_REQUEST['enviar']) && $exito['succes']) {
			echo "<p>Receta añadida correctamente!</p>";
			echo "<p>Puedes ver su receta <a href='recetas.php?receta=".$exito['id']."'>Aqui</a></p>";
		}
		?>
		<p><center><h3>Cree su propia Receta ¡¡</h3><center></p>
		<div class="form-group">
    <label for="imagen">Imagen</label>
    <input type="file" id="imagen" name="imagen">
    <p class="help-block">Elige el imagen de la receta(JPG o PNG).</p>
  </div>
  <div class="form-group">
    <label for="nom" class="col-sm-3 control-label">Nombre de la Receta</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="nom" name="nom" placeholder="Nombre" required="required">
    </div>
  </div>
  <div class="form-group">
    <label for="descripcion" class="col-sm-3 control-label">Descripcion</label>
    <div class="col-sm-8">
    	<textarea class="form-control" rows="3" id="descripcion" name="descripcion" placeholder="Descripcion" required="required"></textarea>
    </div>
  </div>
  <div class="form-group">
  	<div class="row">
  		<div class="col-sm-5">
  			<p><strong>Ingredientes:</strong></p>
  		</div>
  	</div>
  	<div class="row">
  		<div class="col-sm-5 col-sm-offset-3">
		    <table class="table" id="taula">
		    	<tr>
		    		<th>Cantidad</th>
		    		<th>Ingrediente</th>
		    	</tr>
		    	<tr>
		    	<td class="col-sm-5">
		    		<input type="text" class="form-control" id="cantidad" name="cantidad[]" placeholder="0" required="required">
		    	</td>
		    	<td>
		    	<select name="ingredientes[]" id="ingredientesSelect" class="form-control">
		    	<?php 
		    	$ingredienteControler= new IngredienteControler();
		    	$listaIngredientes = $ingredienteControler->listaIngredientes();
		    	
		    	foreach ($listaIngredientes as $ing) {
		    		echo '<option value="'.$ing->getId().'">'.$ing->getIngrediente().'('.$ing->getUnidad().')</option>';
		    	}
		    	
		    	?>
		    	</select>
		    	</td>
		    	<td><button type="button" class="btn btn-default" id="anadir" onclick="anadirIngrediente()">+</button></td>
		    	</tr>
		    </table>
		</div>
    </div>
  </div>
    <div class="form-group">
    <label for="preparacion" class="col-sm-3 control-label">Preparacion</label>
    <div class="col-sm-8">
    	<textarea class="form-control" rows="3" id="preparacion" name="preparacion" placeholder="Preparacion" required="required"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="tiempo" class="col-sm-3 control-label">Tiempo(horas)</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="tiempo" name="tiempo" placeholder="0" required="required">
    </div>
  </div>
  <div class="form-group">
    <label for="personas" class="col-sm-3 control-label">Comensales</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="personas" name="personas" placeholder="0" required="required">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-10">
      <button type="submit" class="btn btn-default" name="enviar">Añadir</button>
    </div>
  </div>
</form>
	
	<script type="text/javascript">
	function anadirIngrediente() {
		var table = document.getElementById('taula').getElementsByTagName('tbody')[0];

		var select = document.getElementById('ingredientesSelect');
		var options = select.innerHTML;
	    var row = table.insertRow(table.rows.length);
	    var cell1 = row.insertCell(0);
	    var cell2 = row.insertCell(1);
	    var cell3 = row.insertCell(2);
	    cell1.innerHTML = '<input type="text" class="form-control" id="cantidad" name="cantidad[]" placeholder="0" required="required">';
	    cell2.innerHTML = '<select name="ingredientes[]" class="form-control">'+options+'</select>';
	    cell3.innerHTML = '<button type="button" class="btn btn-default" id="anadir" onclick="anadirIngrediente()">+</button>';
	}


	</script>
</div>
<?php
footer();
?>