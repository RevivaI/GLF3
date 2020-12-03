<!DOCTYPE html>

<html>
<head>
	<title></title>
</head>
<body>

  <script src="automata2.js"></script>
<?php

include "ClaseAutomata.php"; 
      include "Funciones.php";

  if(isset($_POST['Submit7']))
  {

    console_log("Se reciben correctamente los datos necesarios para crear el automata con todos los datos ingresados que a continuación será mostrado")
    $ABC=$_POST['Aux'];//LLEGA ABCD
    $Estados=unserialize($_POST['Estados']);//LLEGA Q0 NO Q1 SI Q2 SI Q3 NO
    $Transa=unserialize($_POST['Transiciones']);//RETORNA destinos q0 q1 q0 q0 q1 q2 q0 q3
 
    $Key="AFND";
    
  }

  $Automata=new Maquina;
 
    console_log("Se muestra el Automata y su respectivo ER")
    //$Automata=LlenarAutomata($Automata,$Estados,$Transa,$ABC);
    $Automata=LlenarAutomata2($Automata,$Estados,$Transa,$ABC);
    $Automata->Caracteres=$Automata->Caracteres.'Ɛ';
    echo ' <center><br><br><br>AUTOMATA INGRESADO<br>';
    MostrarAutomata($Automata);
    echo '<br><br><br>ER Correspondiente';
    $Testa=json_encode($Automata);
    //$aux=json_encode($Automata);
    $Testa2= '<script>document.write(CreaTabla('.$Testa.',1))</script>';
    echo $Testa2;
    echo '<br><br><br>';



?>

</body>
</html>