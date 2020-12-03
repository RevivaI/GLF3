<?php 

function validarExistente($e,$y)
{
  $cont=0;
  for($i=0;$i<strlen($e);$i++)
  {
    if($e[$i]==$y)
      $cont++;
  }
  return $cont;
}
function boxtosi($e)
{
  if($e=="on")
    return "si";
  else
    return "no";
}
function LargoAceptado($e)
{
  if($e!="")
    return true;
  else
    return false;
}
function validarExistente2($e,$y)
{
  $cont=0;
  if($y=="")
  {
    $cont++;
  }
  else
  {
    for($i=0;$i<count($e);$i++)
    {
      if($e[$i]==$y)
        $cont++;
    }
    return $cont;
  }
  
}
function MostrarEstados($e)
{
  
  $count=0;
  for($i=0;$i<count($e);$i++)
  {
    if($i%2==0)
    {
      $e[$i]=str_replace("/"," ",$e[$i]);
      echo '( '.$e[$i].' )';
      $e[$i]=str_replace(" ","/",$e[$i]);
    }
    else
    {
      if($e[$i]=="no")
      {
        echo' no final<br>';
      }
      else
        echo' final<br>';

      $count=0;
    }
  }

}
  function Invalidarspaces($e)
  { $cont=0;
    for($i=0;$i<strlen($e);$i++)
    {
      if($e[$i]!=" ")
      {
        $cont++;
      }
    }
    if($cont==0)
    {
      return false;
    }
    else
      return true;
  }
function RemoverEspacios($f)
{
  $e=$f;
  $e=str_replace(" ","/",$e);
  return $e;
}



function TablaTransAFND($ABC,$Estados,$conta)
{
  $cont=$conta;
  echo '<table border="1">
    <tr>
      <th>ESTADO</th><th>Transición</th><th>Destino</th>
      <tr>
            <th><select name='.$cont.'>';
    for($i=0;$i<count($Estados);$i++)
    {
      if($i%2==0)
      {
        echo'<option value='.$Estados[$i].'>'.$Estados[$i].'</option>';
      }
      
    }
    $cont++;
    echo'<th><input type="text" name='.$cont.' placeholder="Transicion..." value="Ɛ" required>';
    $cont++;
    echo'</th><th><select name='.$cont.'>';
    
    for($j=0;$j<count($Estados);$j++)
    {
      if($j%2==0)
      {
        echo'<option value='.$Estados[$j].'>'.$Estados[$j].'</option>';
      }
    }
    $cont++;
    echo'</select> </th></tr>';
  
    
  echo'</table>';
}
function TablaTransZ($ABC,$Estados,$conta)
{

  $cont=$conta;
  echo '<table border="16">
    
      <th >ESTADO</th ><th>Consume</th><th>Extrae</th><th>Ingresa</th><th>Destino</th>
      <tr>
            <th><select name='.$cont.'>';
    for($i=0;$i<count($Estados);$i++)
    {
      if($i%2==0)
      {
        echo'<option value='.$Estados[$i].'>'.$Estados[$i].'</option>';
      }
      
    }
    echo '</select>';
    $cont++;
#-------------------------------------------------------------------------

    echo '<th><select name='.$cont.'>';
    echo'<option value="Ɛ">Ɛ</option>';
    for($U=0;$U<strlen($ABC);$U++)
    {
      echo'<option value='.$ABC[$U].'>'.$ABC[$U].'</option>';
    }
    echo'</select>';
    $cont++;

    echo '<th><input type="text" name="'.$cont.'" value="Ɛ" placeholder="Extrae..." required>';
    #___________________________________________________________________________________
    
     $cont++;
    echo '<th><input type="text" name="'.$cont.'" value="Ɛ" placeholder="Ingresa..." required>';
    $cont++;
    #___________________________________________________________________________________
    //echo'<th><input type="text" name='.$cont.' placeholder="Transicion..." value="Ɛ" required>';
    

    echo'</th><th><select name='.$cont.'>';
    
    for($j=0;$j<count($Estados);$j++)
    {
      if($j%2==0)
      {
        echo'<option value='.$Estados[$j].'>'.$Estados[$j].'</option>';
      }
    }
    $cont++;
    echo'</select> </th>';
  
    
  echo'</table>';
}


//_------------------------------------------
function ArrayP1($ABC,$Estados) //RETORNA q0 q0 q0 q0 q1 q1 q1 q1 q2 q2 q2 q2 q3 q3 q3 q3 
{
  $Cont=0;
  $Array=array();
  for($i=0;$i<count($Estados);$i++)
  {
    for($j=0;$j<strlen($ABC);$j++)
    {
        array_push($Array,$Estados[$i]);
        
    }
    
  }
  return $Array;
}
function GetEstados($Estados)
{
  $Arr=array();
  for($i=0;$i<count($Estados);$i++)
  {
    if($i%2==0)
      array_push($Arr,$Estados[$i]);
  }
  return $Arr;
  
}
function ArrayP2($ABC,$Estados)//RETORNA A B C D A B C D A B C D A B C D 
{
  
  $Cont=0;
  $Array=array();
  
  for($i=0;$i<count($Estados);$i++)
  {
    for($j=0;$j<strlen($ABC);$j++)
    {
      $Array[$Cont]=$ABC[$j];
      $Cont++;
    }
  }
  return $Array;
} 





function GetFinales($Estados)
{
  $Arr=array();
  for($i=1;$i<count($Estados);$i++)
  {
    if($i%2==1)
      array_push($Arr,$Estados[$i]);
  }
  return $Arr;
}
function ValidarTransicion($ABC,$e)
{
  $cont=0;
  for($i=0;$i<strlen($e);$i++)
  {
    for($j=0;$j<strlen($ABC);$j++)
    {
      if($e[$i]==$ABC[$j])
      {
        $cont++;
      }
    }
  }
  if($cont==strlen($e))
  {
    return true;
  }
  else
  {
    return false;
  }
}
function MostrarTransiciones($e)
{
  for($i=0;$i<count($e);$i=$i+3)
  {
    echo'Transicion ( '.$e[$i].'-['.$e[$i+1].']->'.$e[$i+2].')<br>';
     
  }

}
function validarExistente3($Arreglo,$Entrada1,$Entrada2,$Entrada3)
{
  $contad=0;
  for($i=0;$i<count($Arreglo);$i=$i+3)
  {
   
    if($Arreglo[$i]==$Entrada1 && $Arreglo[$i+1]==$Entrada2 && $Arreglo[$i+2]==$Entrada3)
    {
      $contad=$contad+1;
      
    }
  }
  
  if($contad==0)
    return true;
  else
    return false;
}
function LlenarAutomata($Automata,$Estados,$Transa,$ABC)
{
  $Automata->Caracteres=$ABC;
  $EstadosL=GetEstados($Estados);//CONTIENE TODOS LOS ESTADOS 1 SOLA VEZ
//  $EFinales=GetFinales($Estados);//CONTIENE SI O NO SEGUN $EstadosL
  $Esta2=ArrayP1($ABC,$EstadosL);//REPITE LOS ESTADOS AAAA BBBB CCCC DDDD
  $Abcedario=ArrayP2($ABC,$EstadosL);//REPITE EL ABC ABCDABCDABCD
  $Automata->Est_Inicial=$EstadosL[0];
  $Automata->Posicion=$EstadosL[0];
  llenarEstados($Automata,$EstadosL);
  InicializarTabla($Automata);
  SetEFinales($Automata,$Estados);
  LlenarOpciones($Automata,$Esta2,$Abcedario,$Transa);
  return $Automata;
}
function llenarTransiciones($Automata,$Transa)
{
  for($i=0;$i<count($Automata->Estados);$i++)
  {
    for($j=0;$j<count($Transa);$j=$j+3)
    {
      if($Transa[$j]==$Automata->Estados[$i]->Caracter)
      {
        array_push($Automata->Estados[$i]->Opciones,$Transa[$j+1]);
        array_push($Automata->Estados[$i]->Nomb_estados,$Transa[$j+2]);
      }
    }
  }
}

function LlenarAutomata2($Automata,$Estados,$Transa,$ABC)
{
  //GuardarTransiciones/Opciones
  $Automata->Caracteres=$ABC;
  $EstadosL=GetEstados($Estados);
  $Automata->Est_Inicial=$EstadosL[0];
  $Automata->Posicion=$EstadosL[0];
  llenarEstados($Automata,$EstadosL);
  SetEFinales($Automata,$Estados);
  llenarTransiciones($Automata,$Transa);
  return $Automata;

}
function MostrarAutomata($Automata)
{ 
  echo '<html><br>

    <table border 1>
    <tr><th>Alfabeto de entrada</th><th>'.$Automata->Caracteres.'</th><tr>
    <tr><th>Estado Inicial  </th><th>'.$Automata->Est_Inicial.'</th></tr>
    <tr><th>Estados finales  <th>';
       foreach($Automata->Est_Final as $x)
        {
         echo ' '.$x.' ';
        }
      echo'</th></th></tr>
      <tr>
        <th>Estados</th><th>Transiciones</th>
      </tr>
      <tr>';
      for($i=0;$i<count($Automata->Estados);$i++)
      {
        echo'<th>'.$Automata->Estados[$i]->Caracter.'</th>';
        {
          echo'<th><table border 1>';
          for($j=0;$j<count($Automata->Estados[$i]->Opciones);$j++)
          {
            echo'<th>&nbsp;&nbsp;&nbsp;&nbsp;'.$Automata->Estados[$i]->Opciones[$j].'&nbsp;&nbsp;&nbsp;&nbsp;</th><th>→</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$Automata->Estados[$i]->Nomb_estados[$j].'&nbsp;&nbsp;&nbsp;&nbsp;</th><tr>';
          }
          echo'</tr></table></tr>';
        }
      }
      echo '</table></br>';
}

function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}

?>