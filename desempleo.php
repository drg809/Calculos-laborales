<?php	  
$base = $_REQUEST['base'];
$dias = $_REQUEST['dias'];
$hijos = $_REQUEST['hijos'];

$BR = $base * 6 / 180;
$inic = ($BR * 70 / 100) * 30;
$sig = ($BR * 55 / 100) * 30;

   /*cantidad mínima sin hijos*/
if ($hijos == 0) {
	$min = 497;

}else{
	$min = 664.74;
}
	
	
     /*cantidad máxima con hijos*/
if ($hijos == 0) {
	$max = 1087.20;
}
if ($hijos == 1){
			$max = 1242.52;
}
if ($hijos > 1) {	
		$max = 1397.83;
}	
	/*igualar cantidades a topes*/
if ($inic < $min) {
	$inic = $min;
}

if ($inic > $max) {
	$inic = $max;
}

if ($sig < $min) {
	$sig = $min;
}

if ($sig > $max) {
	$sig = $max;
}
	
	/*cálculo de días según los cotizado*/
if ( $dias < 360 ) {
	$diastotales = 0;
}

if ( $dias >= 360 AND $dias <= 539 ) {
	$diastotales = 120;
}

if ( $dias >= 540 AND $dias <= 719 ) {
	$diastotales = 180;
}

if ( $dias >= 720 AND $dias <= 899 ) {
	$diastotales = 240;
}

if ( $dias >= 900 AND $dias <= 1079 ) {
	$diastotales = 300;
}

if ( $dias >= 1080 AND $dias <= 1259 ) {
	$diastotales = 360;
}

if ( $dias >= 1260 AND $dias <= 1439 ) {
	$diastotales = 420;
}

if ( $dias >= 1440 AND $dias <= 1619 ) {
	$diastotales = 480;
}

if ( $dias >= 1620 AND $dias <= 1799 ) {
	$diastotales = 540;
}

if ( $dias >= 1800 AND $dias <= 1979 ) {
	$diastotales = 600;
}

if ( $dias >= 1980 AND $dias <= 2159 ) {
	$diastotales = 660;
}

if ( $dias >= 2160 ) {
	$diastotales = 720;
}	
?>  

<HTML>
	<HEAD>
     <title>Desempleo</title>
	 <link rel="stylesheet" type="text/css" href="estilo.css"> 
	</HEAD>
	<BODY bgcolor="#56fs34">
	 <center><h2>Desempleo calculado</h2></P><br><br><br>
	
	 
      <table align="center">
		<tr>
		 <td><b>Su base reguladora diaria es:</b></td>
		 <td><?php echo $BR; ?> Euros</td>
		</tr>
		<tr>
		 <td><b>Los 6 primeros meses cobrará:</b></td>
		 <td><?php echo $inic; ?> Euros</td>
		</tr>
		<tr>
		 <td><b>El resto del periodo cobrará:</b></td>
		 <td><?php echo $sig; ?> Euros</td>
		</tr>
		<tr>
		 <td><b>Números de dias totales por desempleo:</b></td>
		 <td><?php echo $diastotales; ?> Días</td>
		</tr>			
	</table>
      <center><input type="button" style="width:90; height:30" value="Volver" onClick="javascript:history.go(-1);"></center><p> 
   
	  </center>
	 </div>  
  </BODY>
</HTML>

