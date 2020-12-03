<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<center>
<?php include "ClaseAutomata.php"; 
      include "Funciones.php";

$ABC1="";
$ABC2="";
$Inicio=0;
$Key1=0;
$EI="";
$contrans1=0;
$transaux=array();
$contrans2=0;
$Key2=0;
$EI1="";
$EIFBool2="";
$EAux=array();
$EIFBoolaux="";
$EIFBool1="";
$EIFBool="";
$EI2="";
$EIFBool2="";
$Estados1=array();
$Estados2=array();
$EIaux="";
$EstadosAux1=array();
$EstadosAux2=array();
$transa1=array();
$transa2=array();


if(isset($_POST['submit1']) && isset($_POST['Alfabeto1']) && isset($_POST['Abc1']) )
{
	$ABC1=$ABC1.$_POST['Alfabeto1'];
	
	if(strlen($_POST['Abc1'])==1 && $_POST['Abc1']!=" ")
    {
      if(validarExistente($ABC1,$_POST['Abc1'])==0)
      {
        console_log($_POST['Abc1']." ha sido agregada exitosamente!");
        $ABC1=$ABC1.$_POST['Abc1'];
        console_log("El alfabeto actualmente es : ".$ABC1);
      }
      else
      {
        console_log($_POST['Abc1']." ya existe actualmente, por lo que no será añadido al alfabeto.");
        echo "<html><H3>Letra ".$_POST['Abc1']." ya ingresada.</h3></html>";
        console_log("El alfabeto actualmente es : ".$ABC1);
      }       
    }
    else
    {console_log($_POST['Abc1']." no corresponde a UN caracter, por lo que no será añadido al alfabeto.");
      $ABC1=$_POST['Alfabeto1'];
       echo'<html>Ingrese una letra</html>';
    }
    console_log("Como ha hecho ingreso al alfabeto de el AP 1, se ha guardado la información en distintas variables las cuales volverán a ser enviadas posteriormente con el metodo POST");
	$ABC2=$ABC2.$_POST['Alfabeto2'];
	
	
}
if(isset($_POST['submit2']) && isset($_POST['Alfabeto2']) && isset($_POST['Abc2']) )
{

$ABC2=$ABC2.$_POST['Alfabeto2'];
	
	if(strlen($_POST['Abc2'])==1  && $_POST['Abc2']!=" ")
    {
      if(validarExistente($ABC2,$_POST['Abc2'])==0)
      {
        console_log($_POST['Abc2']." ha sido agregada exitosamente!");
        $ABC2=$ABC2.$_POST['Abc2'];
        console_log("El alfabeto actualmente es : ".$ABC2);
      }
      else
      {
        console_log($_POST['Abc2']." ya existe actualmente, por lo que no será añadido al alfabeto.");
        echo "<html><H3>Letra ".$_POST['Abc2']." ya ingresada.</h3></html>";
        console_log("El alfabeto actualmente es : ".$ABC2);
      }       
    }
    else
    {console_log($_POST['Abc2']." no corresponde a UN caracter, por lo que no será añadido al alfabeto.");
      $ABC2=$_POST['Alfabeto2'];
       echo'<html>Ingrese una letra</html>';
    }
    console_log("Como ha hecho ingreso al alfabeto de el AP 2, se ha guardado la información en distintas variables las cuales volverán a ser enviadas posteriormente con el metodo POST");
	$ABC1=$ABC1.$_POST['Alfabeto1'];
}
if(isset($_POST['submit3']) && isset($_POST['ABC1']) && isset($_POST['ABC2']))
{
	$ABC1=$_POST['ABC1'];
	$ABC2=$_POST['ABC2'];
	$Inicio=1;
	console_log("Dado que clickeo en Siguiente, se han almacenado ambos alfabetos y se ha habilitado la variable que permite continuar con el ingreso de los estados iniciales");

}
if(isset($_POST['submit4']) && isset($_POST['Alfabeto1']) && isset($_POST['Alfabeto2']) && isset($_POST['EI1']))
{
	console_log("Ha ingresado contenido en el estado inicial de AP1 que será evaluado a continuación para ver si es valido y agregarlo");
    $ABC1=$_POST['Alfabeto1'];
    $ABC2=$_POST['Alfabeto2'];
    $EI2=$_POST['EI2'];
    $EIFBool2=$_POST['EIFBool2'];
    $Key2=$_POST['Key2'];
    $EIaux=$_POST['EI1'];
    $EIFBool1="no";
    if(isset($_POST['Finado']))
    {
      $EIFBool1=$_POST['Finado'];

    }
    else
    {
    	$EIFBool1="off";
    }
    if(Invalidarspaces($EIaux))
    {
      $Key1++;
      $EI1=RemoverEspacios($EIaux);
     
      console_log("Ha ingresado el estado $EI , final = $EIFBool");
    }
    else
    {
      echo'<html><H3>Ingrese estado valido</H3></html>';
      console_log("Ha intentado ingresar $EI, pero este solo contiene espacios, por lo que no será agregado, ingrese un estado valido.");    
    }
    $Inicio=1;

 
 }
if(isset($_POST['submit5']) && isset($_POST['Alfabeto1']) && isset($_POST['Alfabeto2']) && isset($_POST['EI2']))
{
	console_log("Ha ingresado contenido en el estado inicial de AP2 que será evaluado a continuación para ver si es valido y agregarlo");

	$ABC1=$_POST['Alfabeto1'];
    $ABC2=$_POST['Alfabeto2'];
    $EI1=$_POST['EI1'];
    $EIFBool1=$_POST['EIFBool1'];
    $Key1=$_POST['Key1'];

    $EIaux=$_POST['EI2'];
 
    if(isset($_POST['Finado2']))
    {
      $EIFBool2=$_POST['Finado2'];
    }
    else
    {
    	$EIFBool2="off";
    }
    if(Invalidarspaces($EIaux))
    {
      $Key2++;
      $EI2=RemoverEspacios($EIaux);
      console_log("Ha ingresado el estado $EI , final = $EIFBool");
    }
    else
    {
      echo'<html><H3>Ingrese estado valido</H3></html>';
      console_log("Ha intentado ingresar $EI, pero este solo contiene espacios, por lo que no será agregado, ingrese un estado valido.");    
    }
    $Inicio=1;

	// SI NO // NO SI // SI SI // NO NO
}
if($Key1==1 && $Key2==1)
{
	console_log("Ya que están ingresados ambos estados iniciales, se prosigue a activar la variable que habilita el ingreso del resto de los estados");
	$Inicio=2;
	//$EIFBool1; seteados
	//$EIFBool2; seteados
	$Estados1[0]=RemoverEspacios($_POST['EI1']);
	$Estados2[0]=RemoverEspacios($_POST['EI2']);
	if($EIFBool1=="off")
	{
		$Estados1[1]="no";
	}
    if($EIFBool1=="on")
    {
    	$Estados1[1]="si";
    }
    if($EIFBool2=="off")
	{
		$Estados2[1]="no";
	}
    if($EIFBool2=="on")
    {
    	$Estados2[1]="si";
    }
    $ABC1=$_POST['Alfabeto1'];
    $ABC2=$_POST['Alfabeto2'];
    
}
if (isset($_POST['submit6']))//Ingresa desde AP1
{
	console_log("Será evaluado el contenido agregado anteriormente, si este es valido se agregará a un arreglo que contiene el contenido del estado inicial del AP1
		");
	$Estados2=unserialize($_POST['arra2']);
	$ABC1=$_POST['Alfabeto1'];
	$ABC2=$_POST['Alfabeto2'];
	$Estados1=unserialize($_POST['arra1']);
	$EFin="no";
	if(isset($_POST['efin1']))
    {
      $EFin=boxtosi($_POST['efin1']);
    }

	$EstadoIngreso1=$_POST['estado1'];
	if(validarExistente2($Estados1,$EstadoIngreso1)==0 && Invalidarspaces($EstadoIngreso1))
    {
      $EAux[0]=RemoverEspacios($EstadoIngreso1);
      $EAux[1]=$EFin;
      $Estados1=array_merge($Estados1,$EAux);
      console_log("Ha ingresado el estado $EstadoIngreso1 , final = $EFin");
    }
    else
    {
      if(validarExistente2($Estados1,$EstadoIngreso1)!=0)
      {
        echo '<html><H3>Estado ya ingresado</H3><html>';
        console_log("Ha intentado ingresar el estado $E, pero este ya existe.");
      }
      else
      {
        if(!Invalidarspaces($EstadoIngreso1))
        {
          echo '<html><H3>Favor no ingresar estados en blanco</H3><html>';
          console_log("Ha intentado ingresar un estado en blanco, no será agregado");
        }
      }
      
    }$Inicio=2;


	
}
if(isset($_POST['submit7']))
{
	console_log("Será evaluado el contenido agregado anteriormente, si este es valido se agregará a un arreglo que contiene el contenido del estado inicial del AP2
		");
	$Estados1=unserialize($_POST['arra1']);
	$ABC2=$_POST['Alfabeto2'];
	$ABC1=$_POST['Alfabeto1'];
	$Estados2=unserialize($_POST['arra2']);
	$EFin="no";
	if(isset($_POST['efin2']))
    {
      $EFin=boxtosi($_POST['efin2']);
    }

	$EstadoIngreso2=$_POST['estado2'];
	if(validarExistente2($Estados2,$EstadoIngreso2)==0 && Invalidarspaces($EstadoIngreso2))
    {
      $EAux[0]=RemoverEspacios($EstadoIngreso2);
      $EAux[1]=$EFin;
      $Estados2=array_merge($Estados2,$EAux);
      console_log("Ha ingresado el estado $EstadoIngreso2 , final = $EFin");
    }
    else
    {
      if(validarExistente2($Estados2,$EstadoIngreso2)!=0)
      {
        echo '<html><H3>Estado ya ingresado</H3><html>';
        console_log("Ha intentado ingresar el estado $EstadoIngreso2, pero este ya existe.");
      }
      else
      {
        if(!Invalidarspaces($EstadoIngreso2))
        {
          echo '<html><H3>Favor no ingresar estados en blanco</H3><html>';
          console_log("Ha intentado ingresar un estado en blanco, no será agregado");
        }
      }
      
    }$Inicio=2;
    
}
if(isset($_POST['submit8']))
{	
	console_log("Ahora que están listos ambos estados, se almacenarán en sus respectivas variables para continuar con las transiciones y se activa la variable que permite acceder al ingreso de transiciones");
	$ABC1=$_POST['Alfabeto1'];
	$Estados1=$_POST['arra1'];
	$ABC2=$_POST['Alfabeto2'];
	$Estados2=$_POST['arra2'];
	$Inicio=3;
}
if(isset($_POST['submit9']))
  {
  	console_log("Se ha ingresado una transicion para el AP1, este será evaluada para ver si ya existe esta transicion");
  	$Inicio=3;
    $Estados1=$_POST['Estados1'];
    $Estados2=$_POST['Estados2'];
    $ABC1=$_POST['ABC1'];
    $ABC2=$_POST['ABC2'];
    $transa1=unserialize($_POST['transa1']);
    $transa2=unserialize($_POST['transa2']);
    $transaux[0]=$_POST['0'];
    $transaux[1]=$_POST['1'].'/'.$_POST['2'].'/'.$_POST['3'];
    $transaux[2]=$_POST['4'];
    if(count($transa1)==0)
    {
    	$transa1=array_merge($transa1,$transaux);
    	console_log("Como es la primera transicion agregada se agregará sin evaluar");
    }
    else
    {
    	if(validarExistente3($transa1, $transaux[0], $transaux[1], $transaux[2]))
    	{
    		$transa1=array_merge($transa1,$transaux);
    		console_log("Se ha evaluado y no existe anteriormente el estado, por lo que será agregada al arreglo");
    	}
    	else
    	{
    		echo'transicion ya agregada';
    		console_log("La transicion fue evaluada y ya fue agregada anteriormente, por lo que no será agregada al arreglo");
    	}
    }
    

    
  }
if(isset($_POST['submit10']))
{	
	console_log("Se ha ingresado una transicion para el AP2, este será evaluada para ver si ya existe esta transicion");

	$Inicio=3;
    $Estados1=$_POST['Estados1'];
    $Estados2=$_POST['Estados2'];
    $ABC1=$_POST['ABC1'];
    $ABC2=$_POST['ABC2'];
    $transa1=unserialize($_POST['transa1']);
    $transa2=unserialize($_POST['transa2']);
    $transaux[0]=$_POST['0'];
    $transaux[1]=$_POST['1'].'/'.$_POST['2'].'/'.$_POST['3'];
    $transaux[2]=$_POST['4'];
    if(count($transa2)==0)
    {
    	$transa2=array_merge($transa2,$transaux);
    }
    else
    {
    	if(validarExistente3($transa2, $transaux[0], $transaux[1], $transaux[2]))
    	{
    		console_log("Se ha evaluado y no existe anteriormente el estado, por lo que será agregada al arreglo");
    		$transa2=array_merge($transa2,$transaux);
    	}
    	else
    	{
    		echo'transicion ya agregada';
    		console_log("La transicion fue evaluada y ya fue agregada anteriormente, por lo que no será agregada al arreglo");
    	}
    }
    
}
if($Inicio==0)
{
	console_log("Se muestran ambos cuadros de entrada de información, si ingresa valores en los box, estos al apretar agregar letra enviarán la información con el metodo POST a la misma pagina");
	echo'<html>
	<table>
		<th><table border="3">
			<tr>
				<th colspan="2">Ingreso Alfabeto AP 1</th>
				<th colspan="2">Ingreso Alfabeto AP 2</th>
			</tr>
				<form action="" method="post" >
			<tr>
				<th><input type="text" name="Abc1" placeholder="Ingrese letra"></th>
					<input type="hidden" name="Alfabeto1" value='.$ABC1.'>
					<input type="hidden" name="Alfabeto2" value='.$ABC2.'>
					
				<th><input type="submit" name="submit1" value="Agregar letra"</th>
				</form>
				<form action="" method="post" >
				<th><input type="text" name="Abc2" placeholder="Ingrese letra"></th>
					<input type="hidden" name="Alfabeto1" value='.$ABC1.'>
					<input type="hidden" name="Alfabeto2" value='.$ABC2.'>
						
				<th><input type="submit" name="submit2" value="Agregar letra"</th>
				</form>
			
		</th>';
		console_log(" Se realiza una evaluación si hay contenido en el alfabeto, en caso de haberlo se desplegará y de haber contenido en ambos se habilitará el boton para continuar con el ingreso de los automatas.");
	if($ABC1!="" || $ABC2!="")
	{
		console_log("evaluando hay contenido en el Alfabeto de 1 o en el de 2, por lo que se desplegará el contenido ingresado, y será evaluado a continuación si es que ambos tienen contenido, en caso de tenerlos habilitará el botón para poder continuar con el ingreso del automata");
	 	echo'
	 	<tr>
	 		<th colspan="2">Alfabeto AP1 : '.$ABC1.'</th>
	 		<th colspan="2">Alfabeto AP2 : '.$ABC2 .'</th>
	 	</tr></table>
	 	<th><table >
	 		<tr>
	 			<th> </th>
	 		</tr>
	 		<tr>
	 			<th>';
	 			if($ABC1!="" && $ABC2!="")
	 			{
	 				console_log("como existe contenido en ambos alfabetos, se habilitó el botón siguiente");
	 				echo '<form action="" method="post" >
	 			<input type="hidden" name="ABC1" value='.$ABC1.'>
	 			<input type="hidden" name="ABC2" value='.$ABC2.'>
	 			<input type="submit" name="submit3" value"Siguiente">
	 			</form>';
	 			}

	 			echo'</th>
	 		</tr>
	 		</table>
	 	</th>
	 	
	 	</table></html>';
	}


}
if($Inicio==1)
{
	console_log("Ahora se muestra el cuadro de ingreso de los estados iniciales del automata, para poder almacenarlos de forma distinta al resto de los estados, una vez ingrese alguno de los 2 estados iniciales, se bloqueará el ingreso de este, y quedará unicamente habilitado el del automata que aun no tiene agregado su estado inicial.");
	echo'<html>
	<table>
		<th><table border="3">
			<tr>
				<th colspan="3">Ingreso Estado Inicial AP 1</th>
				<th colspan="3">Ingreso Estado Inicial AP 2</th>
			</tr><tr>';
			if($Key1==0)
			{

				echo'<form action="" method="post" >
				
				<th><input type="text" name="EI1" placeholder="Ingrese estado"></th>
				<th>¿Estado Finalizado?<input type="checkbox" name="Finado">
					<input type="hidden" name="Alfabeto1" value='.$ABC1.'>
					<input type="hidden" name="Alfabeto2" value='.$ABC2.'>
					<input type="hidden" name="EI2" value='.$EI2.'>
					<input type="hidden" name="EIFBool2" value='.$EIFBool2.'>
					<input type="hidden" name="Key2" value='.$Key2.'>
				<th><input type="submit" name="submit4" value="Agregar Estado"</th>
				</form>';
			}
			else
			{
				console_log("Ha sido ingresado correctamente el estado inicial del AP1 y se bloquea su entrada");
				echo' <td colspan="3"><h3>PRIMER ESTADO AGREGADO</h3></td>';
			}
			
			
				if($Key2==0)
				{echo
					'<form action="" method="post" >
				<th><input type="text" name="EI2" placeholder="Ingrese estado"></th>
				<th>¿Estado Finalizado?<input type="checkbox" name="Finado2">
					<input type="hidden" name="Alfabeto1" value='.$ABC1.'>
					<input type="hidden" name="Alfabeto2" value='.$ABC2.'>
					<input type="hidden" name="EI1" value='.$EI1.'>
					<input type="hidden" name="EIFBool1" value='.$EIFBool1.'>
					<input type="hidden" name="Key1" value='.$Key1.'>
				<th><input type="submit" name="submit5" value="Agregar estado"</th>
				</form>';
				}
				else
			{
				echo' <td colspan="3"><h3>PRIMER ESTADO AGREGADO</h3></td>';
				console_log("Ha sido ingresado correctamente el estado inicial del AP2 y se bloquea su entrada");
			}
				
			
		echo'</th>';

	 	echo'
	 	<tr>
	 		<th colspan="3">Alfabeto AP1 : '.$ABC1.'</th>
	 		<th colspan="3">Alfabeto AP2 : '.$ABC2 .'</th>
	 	</tr></table>
	 	<th><table >
	 		<tr>
	 			<th> </th>
	 		</tr>
	 		<tr>
	 			<th>';

	
	
	

}
if($Inicio==2)
{
	console_log("En este paso se almacenará los estados que agregue y si es finalizado, con el metodo POST y al igual que anteriormente con inputs hiddens, se envia la información anteriormente almacenada para su posterior uso.");
 echo'<html>
	<table>
		<th><table border="23">
			<tr>
				<th colspan="3">Ingreso estados AP 1</th>
				<th colspan="3">Ingreso estados AP 2</th>
			</tr>
				<form action="" method="post" >
			<tr>

				<th>&nbsp;&nbsp;<input type="text" name="estado1" placeholder="Ingrese estado">&nbsp;</th>
				<th>&nbsp;¿Estado Finalizado?<input type="checkbox" name="efin1">&nbsp;
					<input type="hidden" name="Alfabeto1" value='.$ABC1.'>
					<input type="hidden" name="Alfabeto2" value='.$ABC2.'>
					<input type="hidden" name="arra1" value='.serialize($Estados1).'>
					<input type="hidden" name="arra2" value='.serialize($Estados2).'>

					
				<th>&nbsp;&nbsp;<input type="submit" name="submit6" value="Agregar estado">&nbsp;</th>
				</form>
				<form action="" method="post" >
				<th>&nbsp;&nbsp;<input type="text" name="estado2" placeholder="Ingrese estado">&nbsp;</th>
				<th>&nbsp;&nbsp;¿Estado Finalizado?<input type="checkbox" name="efin2">&nbsp;
					<input type="hidden" name="Alfabeto1" value='.$ABC1.'>
					<input type="hidden" name="Alfabeto2" value='.$ABC2.'>
					<input type="hidden" name="arra1" value='.serialize($Estados1).'>
					<input type="hidden" name="arra2" value='.serialize($Estados2).'>
						
				<th>&nbsp;<input type="submit" name="submit7" value="Agregar estado">&nbsp;</th>
				</form>
				
		</th>';
		echo'
		<th><form action="" method="post">
		
		<input type="hidden" name="Alfabeto1" value='.$ABC1.'>
		<input type="hidden" name="Alfabeto2" value='.$ABC2.'>
		<input type="hidden" name="arra1" value='.serialize($Estados1).'>
		<input type="hidden" name="arra2" value='.serialize($Estados2).'>
		<input type="submit" name="submit8" value="Finalizar estados">
		</th></form>
	 	<tr>
	 		<th colspan="3">Alfabeto AP1 : '.$ABC1 .'</th>
	 		<th colspan="3">Alfabeto AP2 : '.$ABC2 .'</th>
	 	</tr>
	 	<tr>
	 		<th colspan="3">Estados AP 1</th>
	 		<th colspan="3">Estados AP 2</th>
	 	</tr>
	 	<tr>
	 		<th colspan="3">';MostrarEstados($Estados1);echo'</th>
	 		<th colspan="3">';MostrarEstados($Estados2);echo'</th>
	 	<tr>
	 	</table>
	 	<th><table >
	 		<tr>
	 			<th> </th>
	 		</tr>
	 		<tr>
	 			<th>';
//<th>'.MostrarEstados($Estados1).'</th>
	 	//	<th>'.MostrarEstados($Estados2).'</th>
}
if($Inicio==3)
{
console_log("Ahora de la misma forma que los ingresos anteriores, segun el automata al que le agregue transiciones se irá almacenando y enviando los contenidos anteriormente agregados");
console_log("Ingrese transicion o en caso de ya haber ingresado todas, haga click en Finalizar Automata para enviar todo el contenido agregado anteriormente a FinalAFD.php con en el metodo POST");
  echo "<h1>A partir del Alfabeto de entrada, añada transiciones del automata de la forma :<h1>
  <h2>Estado --- (Letra que consume / Extracción de pila / Ingreso de pila) --- Estado de destino</h2>
<h3>(Si ya terminó de ingresar, haga click en Finalizar Automatas)</h3> ";

  echo'<table border="15"><tr><th>Ingreso Transiciones Automata Pila 1</th><th>Ingreso Transiciones Automata Pila 1</th></tr><tr><th >';
  echo'<form action="" method="post">
  <input type="hidden" name="Estados1" value='.$Estados1.'>
  <input type="hidden" name="Estados2" value='.$Estados2.'>
  <input type="hidden" name="ABC1" value='.$ABC1.'>
  <input type="hidden" name="ABC2" value='.$ABC2.'>
  <input type="hidden" name="transa1" value='.serialize($transa1).'>
  <input type="hidden" name="transa2" value='.serialize($transa2).'>


  ';
  	
  TablaTransZ($ABC1,unserialize($Estados1),$contrans1);
  echo'<input type="submit" name="submit9" value="Agregar transicion"></th></form>';

  echo'</th><th colspan="5"><form action="" method="post">
  <input type="hidden" name="Estados1" value='.$Estados1.'>
  <input type="hidden" name="Estados2" value='.$Estados2.'>
  <input type="hidden" name="ABC1" value='.$ABC1.'>
  <input type="hidden" name="ABC2" value='.$ABC2.'>
  <input type="hidden" name="transa1" value='.serialize($transa1).'>
  <input type="hidden" name="transa2" value='.serialize($transa2).'>


  ';
   
   TablaTransZ($ABC2,unserialize($Estados2),$contrans2);
   echo'<input type="submit" name="submit10" value="Agregar transicion"></th></form>
   <tr>
   	<th> ';
   		MostrarTransiciones($transa1);
   	echo'</th>
   	<th>';
   	  MostrarTransiciones($transa2);
   	  echo'
   		
   	</th>';
   	if(count($transa1)>0 && count($transa2)>0)
   	{
   		echo '<tr><th colspan="3">
   		<form action="FinalAP.php" method="post">
   		<input type="hidden" name="Estados1" value='.$Estados1.'>
  <input type="hidden" name="Estados2" value='.$Estados2.'>
  <input type="hidden" name="ABC1" value='.$ABC1.'>
  <input type="hidden" name="ABC2" value='.$ABC2.'>
  <input type="hidden" name="transa1" value='.serialize($transa1).'>
  <input type="hidden" name="transa2" value='.serialize($transa2).'>
   	<input type="submit" value="Finalizar"></th></tr>';
   	}
   
   	echo'

   </table>';
  

    
}
?>


</center>
</body>
</html>