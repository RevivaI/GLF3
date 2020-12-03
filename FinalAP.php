<!DOCTYPE html>
<html>
<head>
	<title>Final AP</title>
</head>
<body>
	  <script src="automata2.js"></script>
<center>
<?php
include "ClaseAutomata.php"; 
      include "Funciones.php";
      console_log("En la tabla en pantalla se puede apreciar la información agregada por usted de ambos automatas, tambien se llamarán a los metodos que convierten los AP utilizando union y concatenación, los cuales serán mostrados");
	$ABC1=$_POST['ABC1'];
	$ABC2=$_POST['ABC2'];
	$Estados1=unserialize($_POST['Estados1']);
	$Estados2=unserialize($_POST['Estados2']);
	$transa1=unserialize($_POST['transa1']);
	$transa2=unserialize($_POST['transa2']);
	$Automata1=new Maquina;
	$Automata2=new Maquina;
	$Automata1=LlenarAutomata2($Automata1,$Estados1,$transa1,$ABC1);
	$Automata2=LlenarAutomata2($Automata2,$Estados2,$transa2,$ABC2);
	echo '<table border="15"><tr><th>Automata Pila 1</th><th>Automata Pila 2</th></tr><tr><th>';
	MostrarAutomata($Automata1);
	echo'</th><th>';
	MostrarAutomata($Automata2);
	echo'</th></tr></table>';
	$Testa=json_encode($Automata1);
	$Testa2=json_encode($Automata2);
    //$aux=json_encode($Automata);
    $Testa3= '<script>document.write(CreaTabla2('.$Testa.','.$Testa2.'))</script>';
    echo '<br><br><br>Union de ambos automatas</br></br></br>';
    echo $Testa3;
    $Testa4= '<script>document.write(CreaTabla3('.$Testa.','.$Testa2.'))</script>';
    echo '<br><br><br>Concatenación de ambos automatas</br></br></br>';
    echo $Testa4;
    echo '<br><br><br>';


?>






</center>
</body>
</html>