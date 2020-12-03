<?php 

class Estado 
{
  public $Caracter=null;//Nombre de estado/Etiqueta
  public $Opciones=array();//Arreglo que contiene los estados que se une
  public $Nomb_estados=array();//Arreglo que contiene la transicion de los estados de arriba
 
} 
class Maquina
{
  public $Estados=array();
  public $Caracteres; 
  public $Est_Inicial; 
  public $Est_Final=array();

}
function llenarEstados($auto,$e)
 {
  for($i=0;$i<count($e);$i++)
  {
    $Aux=new Estado;
    $Aux->Caracter=$e[$i];
    $auto->Estados[$i]=$Aux;
  }
 }

  function setOpciones($maquina,$c,$op,$est)
{
  for($i=0;$i<count($maquina->Estados);$i++)
  {
    if($maquina->Estados[$i]->Caracter==$c)
    {
      array_push($maquina->Estados[$i]->Opciones,$op);
      array_push($maquina->Estados[$i]->Nomb_estados,$est);
      break;
    }
  }
}
 function LlenarOpciones($auto,$Estados1,$Trans,$Estados2)
  {
    for($i=0;$i<count($Trans);$i++)
    {
      setOpciones($auto,$Estados1[$i],$Trans[$i],$Estados2[$i]);
    }
  }


 
 
 function existe($lista,$estado)
 {
  $cont=1;
  for($i=0;count($lista);$i++)
  {
    
    if($estado->Caracter==$lista[$i]->Caracter)
    {

      return 0;
    }
    $cont=$cont+1;
    if($cont-3>count($lista))
      {
        return 1;
      }
      
  }
  
  

 }
 function SetEFinales($automata,$e)
  {
    for($i=1;$i<count($e);$i=$i+2)
    {
      if($e[$i]=="si")
      {
        array_push($automata->Est_Final,$e[$i-1]);
      }
    }
  }

?>