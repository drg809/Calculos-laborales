<?php

//Variables 

$dr = 33;
$ar = 45;
$tipo = $_POST['tipo'];
$salario = $_POST['salario'];
$numpg = $_POST['numpg'];
$paga = $_POST['paga'];
$plusm = $_POST['plusm'];
$finicio = $_POST['finicio'];
$ffinal = $_POST['ffinal'];
$fecharef = "2012-02-12";
$tipo = $_POST['tipo'];

//Tipo del despido
if ($tipo == "") {
  echo "Campo vacío";
}

if ($tipo == "proced") {
    $dr = 20;
	$ar = 20;
}

if ($tipo == "econom") {
	$dr = 20;
	$ar = 20;
}

if ($tipo == "impro") {
  	$dr = 33;
	$ar = 45;
}
echo "</br>";
//Cotizados antes de reforma
$datetime1 = new DateTime($finicio);
$datetime2 = new DateTime($fecharef);
$intervalo = $datetime1->diff($datetime2);
$dias1 = $intervalo->format('%a');
//Resultado $dias1; == "dias cotizados antes de la ley:  "

echo "</br>";
//Cotizados tras reforma
$datetime1 = new DateTime($fecharef);
$datetime2 = new DateTime($ffinal);
$intervalo = $datetime1->diff($datetime2);
$dias2 = $intervalo->format('%a');
//Resultado $dias2; == "dias cotizados después de la ley:  "
//Muestra los dias después de la ley


echo "</br>";

//Calculamos sueldo diario + pagas + plus mensual entre 365 (todos los cobros) y redondea cifra
$sueldodiasr = ($salario / 30) + ($salario * $numpg / 365) + ($plusm / 365);
$sueldodiario = round($sueldodiasr);


echo "</br>";

//Calculo días cotizados por año cotizado antes y despues de la reforma, si en año 365->al==xx
$diasfinal1 = round($dias1 * $ar / 365);
$diasfinal2 =  round($dias2 * $dr / 365);

if ($diasfinal1 > 1260) {
  	$diasfinal1 = 1260;
}

if ($diasfinal2 > 720) {
  	$diasfinal2 = 720;
}

//Calculo el resultado final (el sueldo diario * los dias correspondientes antes + después de reforma
$resultado = ($sueldodiario * $diasfinal1) + ($sueldodiario * $diasfinal2);

?>

<HTML>
	<HEAD>
     <title>Despido</title>
	 <link rel="stylesheet" type="text/css" href="estilo.css"> 
	</HEAD>
	<BODY bgcolor="#56fs34">
	 <center><h2>Despido calculado</h2></P><br><br>
	<center><input type="button" style="width:90; height:30" value="Volver" onClick="javascript:history.go(-1);"></center><p> 
	<table align="center">
	 <tr>
	  <td><b>Días cotizados antes de reforma:</b></td>
	  <td><?php echo $dias1; ?></td>
	 </tr>
	 <tr>
	  <td><b>Días cotizados después de reforma:</b>&nbsp;&nbsp;</td>
	  <td><?php echo $dias2; ?></td>
	 </tr>
	 <tr>
	  <td><b>Sueldo diario:</b></td>
	  <td><?php echo $sueldodiario; ?> Euros</td>
	 </tr>
	 <tr>
	  <td><b>Total a cobrar:</b></td>
	  <td><?php echo $resultado; ?> Euros</td>
	 </tr>			
	</table>
   </center>  
  </BODY>
</HTML>
