<?php
function head() {
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Recetas Ajax</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/main.css">
<link href='http://fonts.googleapis.com/css?family=Dancing+Script:400,700' rel='stylesheet' type='text/css'>
<script>
function loadXMLDoc(receta)
{

	var xmlhttp;
	var txt,x,xx,i;
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById('info').innerHTML=xmlhttp.responseText;
		}else{
			document.getElementById('info').innerHTML;
		}
	}
	xmlhttp.open("GET","controlReceta.php?receta="+receta,true);
	xmlhttp.send();

}
</script>
</head>

<body>
	<header>
	<div class="container-fluid">
	 	<div class="row color9">
			<div class="col-xs-12 col-sm-9 col-md-6 col-lg-6 logo">
				<img src="img/logo.png" alt="">
			</div>

			<div class="col-xs-12 col-sm-9 col-md-4 col-lg-4 centraLogo">
				<div class="pic">
					<img src="img/pic.png" alt="">
				</div>
				
			</div>
			<div class="col-xs-12 col-sm-9 col-md-2 col-lg-2 inicio">
				<a href="index.php">Inicio</a>
			</div>
	   </div>
	 </header>
<?php
}

function contenido(){
?>
	<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12col-lg-12">
	<div id="contenido2">
	<div id="info">
	</div>
	</div>
	</div>
	</div>
	 
		
	<div>
	<section>
	<div>
	<br>
	
	</div>
	</section>
	</div>
	
	</form>
	</section>
	</div>
	<?php 
}

function footer() {
	?>
	<div>
		<br><br><br>
	</div>
	<footer>
		<div class="container contenido">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12col-lg-12">
					<img src="img/peu.png" alt="">
				</div>
			</div>
		</div>
	</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
<script src="js/jasny-bootstrap.min.js"></script>
  </body>
</html>	
<?php
}
?>
