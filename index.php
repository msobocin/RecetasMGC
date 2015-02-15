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

// $ingrediente = new Ingrediente();
// // $ingrediente2 = new Ingrediente();
// $receta = new Receta();

// $ingrediente->setAll(1,"Azucar","kg/kgs","3/4");

// $arrIngredientes = array();
// array_push($arrIngredientes,clone $ingrediente);

// $ingrediente->setAll(2,"Vodka","litro/s","5");
// array_push($arrIngredientes,clone $ingrediente);

// $receta->setAll(0,"Vodka con Azucar",$arrIngredientes,"Mesclar azucar con vodka!",0,2);

// $recetaBD = new RecetaControler();
// $recetaBD->save($receta);
// $arrRecetas=$recetaBD->consultRecetaId(1);
// $recetaBD->consult();

// foreach ($arrRecetas as $receta) {
// 	echo $arrRecetas->getNombre()."<br/>";
// 	foreach ($arrRecetas->getIngredientes() as $ingrediente) {
// 		echo $ingrediente->getIngrediente()."<br/>";
// 	}
// }

//ejemplo de generar pie chart

$ingrediente=new IngredienteControler();

// echo $ingrediente->consultCuantas(1);

// echo $ingrediente->consultCuantas(1);

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
    "dataProvider": [{
        "cuantos": "Leche",
        "ingrediente": '.$ingrediente->consultCuantas(1).'
    }, {
        "cuantos": "Arroz",
        "ingrediente": '.$ingrediente->consultCuantas(2).'
    }],
    "valueField": "ingrediente",
    "titleField": "cuantos",
    "balloonText": "[[title]]<br><span style=\'font-size:14px\'><b>[[value]]</b> ([[percents]]%)</span>",
    "exportConfig": {
        "menuTop":"0px",
        "menuItems": [{
            "icon": \'/lib/3/images/export.png\',
            "format": \'png\'
        }]
    }
});';
echo "</script>";

?>