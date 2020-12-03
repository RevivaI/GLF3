
function estado(){
  this.caracter = null; //nombre del estado
  this.opciones = [ ]; //conecciones a los estados
  this.nomb_estados = [ ]; //noombres de los estados segun opciones
}

estado.prototype.setCaracter = function(value){
  this.caracter= value;
}

function maquina(){
  this.estados = [ ]; //  (K)  conjunto de estados existentes -- tipo estado
  this.caracteres = [ ]; //  (Σ) alfabeto de entrada para funcionamiento
  this.est_inicial = null; // (s) estado inicial - inicio por defecto al inciar la maquina
  this.est_final = [ ]; // (F) estados finales a los que se pueden llegar
  this.camino = [ ]; //camino recorrido por los carateres  -- puede ser variable global

}
//---revisar si estado inicial es final entonces recibe palabra vacia, designar como no reconocida si sucede lo contrario
//--revisar si al terminar posicion corresponde a est_final, si no designar como desconosido
//--revisar el string para saber si solo tiene los caracteres definidos
//--revisar que cada estado tenga opciones sin  repetir

function HazTodo(e)
{
  var ewe=new maquina;

  for(var i=0;i<e.Estados.length;i++)
  {
    setEstados(ewe,e.Estados[i].Caracter);
    for(var j=0;j<e.Estados[i].Nomb_estados.length;j++)
    {
      setOpciones(ewe,e.Estados[i].Caracter,e.Estados[i].Opciones[j],e.Estados[i].Nomb_estados[j]);
    }
  }


  ewe.caracteres=e.Caracteres.split('');
  ewe.est_final=e.Est_Final;
  ewe.est_inicial=e.Est_Inicial;
  ER(ewe);
  return ewe;

}
function HazTodo2(e)
{
  var ewe=new maquina;

  for(var i=0;i<e.Estados.length;i++)
  {
    setEstados(ewe,e.Estados[i].Caracter);
    for(var j=0;j<e.Estados[i].Nomb_estados.length;j++)
    {
      setOpciones(ewe,e.Estados[i].Caracter,e.Estados[i].Opciones[j],e.Estados[i].Nomb_estados[j]);
    }
  }


  ewe.caracteres=e.Caracteres.split('');
  ewe.est_final=e.Est_Final;
  ewe.est_inicial=e.Est_Inicial;
  

  return ewe;

}
function CreaTabla(e,o)
{

  if(o==1)
  {
    e=HazTodo(e);
  }
 
  var aux;
  aux="<table border 1><tr><th>Alfabeto de entrada</th><th>";
  for(var i=0;i<e.caracteres.length;i++)
  {

    aux+=e.caracteres[i]+" ";
  }
  aux+="</th><tr><tr><th>Estado Inicial </th><th>"+e.est_inicial+"</th><tr><tr><th>Estados Finales <th>";
  for(var j=0;j<e.est_final.length;j++)
  {
    aux+=" "+e.est_final[j]+" ";
  }
  aux+="</th></th></tr><tr><th>Estados</th><th>transiciones</th></tr><tr>";
  for(var k=0;k<e.estados.length;k++)
  {
    aux+="<th>"+e.estados[k].caracter+"</th><th><table border 1>";
    for(l=0;l<e.estados[k].opciones.length;l++)
    {
      
      aux+="<th>&nbsp;&nbsp;&nbsp;&nbsp;"+e.estados[k].opciones[l]+"&nbsp;&nbsp;&nbsp;&nbsp;</th><th>→</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+e.estados[k].nomb_estados[l]+"&nbsp;&nbsp;&nbsp;&nbsp;</th><tr>";
    }
    aux+="</tr></table></tr>";
  }
  aux+="</table></br>";
  return aux;
}
function CreaTabla2(a,e1)
{


    a=HazTodo2(a);
    e1=HazTodo2(e1);
    var e=new maquina();
  e=union(a,e1);

  var aux;
  aux="<table border 1><tr><th>Alfabeto de entrada</th><th>";
  for(var i=0;i<e.caracteres.length;i++)
  {

    aux+=e.caracteres[i]+" ";
  }
  aux+="</th><tr><tr><th>Estado Inicial </th><th>"+e.est_inicial+"</th><tr><tr><th>Estados Finales <th>";
  for(var j=0;j<e.est_final.length;j++)
  {
    aux+=" "+e.est_final[j]+" ";
  }
  aux+="</th></th></tr><tr><th>Estados</th><th>transiciones</th></tr><tr>";
  for(var k=0;k<e.estados.length;k++)
  {
    aux+="<th>"+e.estados[k].caracter+"</th><th><table border 1>";
    for(l=0;l<e.estados[k].opciones.length;l++)
    {
  
      aux+="<th>&nbsp;&nbsp;&nbsp;&nbsp;"+e.estados[k].opciones[l]+"&nbsp;&nbsp;&nbsp;&nbsp;</th><th>→</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+e.estados[k].nomb_estados[l]+"&nbsp;&nbsp;&nbsp;&nbsp;</th><tr>";
    }
    aux+="</tr></table></tr>";
  }
  aux+="</table></br>";
  return aux;
}
function CreaTabla3(a,e1)
{

 
    a=HazTodo2(a);
    e1=HazTodo2(e1);
  
  var e=new maquina();
  e=concatenacion(a,e1);
 
  var aux;
  aux="<table border 1><tr><th>Alfabeto de entrada</th><th>";
  for(var i=0;i<e.caracteres.length;i++)
  {

    aux+=e.caracteres[i]+" ";
  }
  aux+="</th><tr><tr><th>Estado Inicial </th><th>"+e.est_inicial+"</th><tr><tr><th>Estados Finales <th>";
  for(var j=0;j<e.est_final.length;j++)
  {
    aux+=" "+e.est_final[j]+" ";
  }
  aux+="</th></th></tr><tr><th>Estados</th><th>transiciones</th></tr><tr>";
  for(var k=0;k<e.estados.length;k++)
  {
    aux+="<th>"+e.estados[k].caracter+"</th><th><table border 1>";
    for(l=0;l<e.estados[k].opciones.length;l++)
    {
     
      aux+="<th>&nbsp;&nbsp;&nbsp;&nbsp;"+e.estados[k].opciones[l]+"&nbsp;&nbsp;&nbsp;&nbsp;</th><th>→</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+e.estados[k].nomb_estados[l]+"&nbsp;&nbsp;&nbsp;&nbsp;</th><tr>";
    }
    aux+="</tr></table></tr>";
  }
  aux+="</table></br>";
  return aux;
}


function setEstados(maquina,caracter){ //crea los estados
  var aux=new estado();
  aux.setCaracter(caracter);
  maquina.estados.push(aux);
  var aux2=[ ];
}

function setAlfabeto(maquina,caracter){ //alfabeto se obtiene de las transiciones
  maquina.caracteres.push(caracter);
}

function setEstadoInicial(maquina,ini){  //almacena el nombre de estado inicial
  maquina.est_inicial=ini;
}

function setEstadosFinales(maquina,fin){ //almacena solo los nombres de los estados finales
  maquina.est_final.push(fin);
}

function setOpciones(maquina,c,op,est){ //agrega a maquina la opcion 'op' de 'c' hacia 'est'
  var aux;
  var comp=0;
  for(var i=0; i<maquina.estados.length;i++){
    if(maquina.estados[i].caracter==c){
      for(var j=0;j<maquina.estados[i].nomb_estados.length;j++){
        if(maquina.estados[i].nomb_estados[j]==est){
          aux=maquina.estados[i].opciones[j]+"+"+op;
          maquina.estados[i].opciones[j]=aux;
          comp=1;
        }
      }
      if(comp==0){
      maquina.estados[i].opciones.push(op);
      maquina.estados[i].nomb_estados.push(est);
      break;}
    }
  }
}

function transicion(maquina,nodo,op){ // nodo -> nombre del estado  /  op -> opcion realizada  // retorna el nombre del nodo al que se dirige
  for(var i=0;i<maquina.estados.length;i++){
    if(maquina.estados[i].caracter==nodo){ //busca el estado entre todos
      for(var j=0;j<maquina.estados[i].opciones.length;j++){ //al encontrarlo busca entre las opciones a op
        if(maquina.estados[i].opciones[j]==op){
          return maquina.estados[i].nomb_estados[j]; //al encontrarlo retorna el nombre del estado al que corresponde
        }
      }
    }
  }
}

function transINI(maquina){
  
  var aux=0;
  for(var i=0;i<maquina.estados.length;i++){

    for(var j=0;j<maquina.estados[i].nomb_estados.length;j++){

      if(maquina.estados[i].nomb_estados[j]==maquina.est_inicial){
        if(aux==0){
          aux=1;
          setEstados(maquina,"#1"); //ingresa nuevo estado a la maquina
          setOpciones(maquina,"#1","Ɛ",maquina.est_inicial); //ingresa transicion de el nuevo estado al estado inicial
          maquina.est_inicial="#1"; //se asigna estdo nuevo como estado inicial
        }
      }
    }
  }
}

function estFinS(maquina){
  for(var i=0;i<maquina.est_final.length;i++){
    for(var j=0;j<maquina.estados.length;j++){
      if(maquina.estados[j].caracter==maquina.est_final[i]){
        if(maquina.estados[j].opciones.length!=0){
          return true;
        }
      }
    }
  }
}

function transFIN(maquina){
  if(estFinS(maquina)==true){
    for(var i=0;i<maquina.est_final.length;i++){
      for(var j=0;j<maquina.estados.length;j++){
        if(maquina.estados[j].caracter==maquina.est_final[i]){
           setOpciones(maquina,maquina.est_final[i],"Ɛ","#2");

         }
      }
    }
    setEstados(maquina,"#2");
    maquina.est_final=[];
    maquina.est_final.push("#2");}
}

function esEstFin(maquina,est){//retorna true si es estado final
  for(var i=0;i<maquina.est_final.length;i++){
    if(maquina.est_final[i]==est){
      return true;
    }
  }
}


function sEstFin(maquina){ //indica true si est inicial queda solo con transicion a estados finales
  var aux=0;
  var aux2=buscarE(maquina,maquina.est_inicial);
  for(var i=0;i<maquina.estados[aux2].nomb_estados.length;i++){
    for(var j=0;j<maquina.est_final.length;j++){
          if(maquina.estados[aux2].nomb_estados[i]==maquina.est_final[j]) aux+=1;
    }
  }
  if(aux==maquina.estados[aux2].nomb_estados.length) return true;
}

function buscarE(maquina,estado){
  for(var k=0;maquina.estados.length;k++){
      if(maquina.estados[k].caracter==estado){
        return k;
      }
  }
}

function tienebucle(maquina,estado){
  for(var i=0;i<estado.nomb_estados.length;i++){
    if(estado.nomb_estados[i]==estado.caracter){
      return true;
    }
  }
}

function existe(maquina,estado){
  for(var i=0;i<maquina.estados.length;i++){
    if(maquina.estados[i].caracter==estado){
      return true;}
  }
}

function esist(arr,est){
    for(var i=0;i<arr.length;i++){
       if(arr[i]==est) return i;
   }
}

function repetido(arr,caract){
  var aux=0;
  for(var i=0;i<arr.length;i++){
      if(arr[i]==caract) aux+=1;
  }
  if(aux>1) return true;
}

function repetido2(arr,caract){
  var aux=0;
  if(arr.length==0) return false;
  for(var i=0;i<arr.length;i++){
      if(arr[i]==caract) aux=1;
  }
  if(aux=1) return true;
}

function reduc(maquina){
   var string;
   var v=buscarE(maquina,maquina.est_inicial);
   var est=new estado();
   est.caracter=maquina.est_inicial;
   for(var i=0;i<maquina.estados[v].nomb_estados.length;i++){
      if(esEstFin(maquina,maquina.estados[v].nomb_estados[i])==true){
        est.opciones.push(maquina.estados[v].opciones[i]);
        est.nomb_estados.push(maquina.estados[v].nomb_estados[i]);
      }
      else{
        var t=buscarE(maquina,maquina.estados[v].nomb_estados[i]);
        for(var h=0;h<maquina.estados[t].nomb_estados.length;h++){
          if(tienebucle(maquina,maquina.estados[t])==true){
            var r=esist(maquina.estados[t].nomb_estados,maquina.estados[t].caracter);
             string="("+maquina.estados[t].opciones[r]+")*";
           }
           if(maquina.estados[t].nomb_estados[h]!=maquina.estados[t].caracter){
              est.nomb_estados.push(maquina.estados[t].nomb_estados[h]);
              if(string!=undefined){est.opciones.push("("+maquina.estados[v].opciones[i]+string+")("+maquina.estados[t].opciones[h]+")");}
              else est.opciones.push("("+maquina.estados[v].opciones[i]+maquina.estados[t].opciones[h]+")");
           }
        }
    }
  } maquina.estados[v]=est;
}


function reduccion(maquina){
  while(sEstFin(maquina)!=true){
    reduc(maquina);
  }
  var v=buscarE(maquina,maquina.est_inicial);
  var opA=maquina.estados[v].opciones;
  var estA=maquina.estados[v].nomb_estados;
  var string;
  maquina.estados[v].opciones=[];
  maquina.estados[v].nomb_estados=[];
  for(var i=0;i<estA.length;i++){
    if(repetido(estA,estA[i])!=true) {
      maquina.estados[v].nomb_estados.push(estA[i]);
      maquina.estados[v].opciones.push(opA[i]);
    }
    else{
      if(repetido2(maquina.estados[v].nomb_estados,estA[i])!=true){
        for(var h=0;h<estA.length;h++){
           if(estA[h]==estA[i]){
             if(string!=undefined) string=string+"+"+opA[h];
             else string=opA[i];
           }
         }maquina.estados[v].nomb_estados.push(estA[i]);
      maquina.estados[v].opciones.push(string);}
    }
  }
}

function ER(maquina){
  transINI(maquina);
  transFIN(maquina);
  reduccion(maquina);
  var arr=maquina.estados;
  maquina.estados=[];
  for(var i=0;i<arr.length;i++){
    if(arr[i].caracter==maquina.est_inicial) maquina.estados.push(arr[i]);
    for(var j=0;j<maquina.est_final.length;j++){
      if(arr[i].caracter==maquina.est_final[j]) maquina.estados.push(arr[i]);
    }
  }
}

function union(maquina1,maquina2){ //hacer funcion que verifique el alfbeto
  var aux=maquina1;
  var aux2=new estado();
  aux2.caracter="#1";
  aux2.opciones.push("Ɛ/Ɛ/Ɛ");
  aux2.opciones.push("Ɛ/Ɛ/Ɛ");
  aux2.nomb_estados.push(maquina1.est_inicial);
  aux2.nomb_estados.push(maquina2.est_inicial);
  for(var i=0;i<maquina2.estados.length;i++){
    aux.estados.push(maquina2.estados[i]);
  }
  for(var j=0;j<maquina2.est_final.length;j++){
    aux.est_final.push(maquina2.est_final[j]);
  }
  aux.est_inicial=aux2.caracter;
  aux.estados.push(aux2);
  return aux;
}

function concatenacion(maquina1,maquina2){
  var aux=maquina1;
  var ini=new estado();
  ini.caracter="#1";
  ini.opciones.push("Ɛ/Ɛ/p");
  ini.nomb_estados.push(maquina1.est_inicial);
  aux.est_inicial=ini.caracter;
  aux.estados.push(ini);
  var conc=new estado();
  conc.caracter="#2";
  conc.opciones.push("Ɛ/Ɛ/Ɛ");
  conc.nomb_estados.push(maquina2.est_inicial);
  for(var i=0;i<maquina1.est_final.length;i++){
    maquina1.estados[buscarE(maquina1,maquina1.est_final[i])].opciones.push("Ɛ/p/Ɛ");
    maquina1.estados[buscarE(maquina1,maquina1.est_final[i])].nomb_estados.push(conc.caracter);
  }
  aux.estados.push(conc);
  for(var j=0;j<maquina2.estados.length;j++){
    aux.estados.push(maquina2.estados[j]);
  }
  aux.est_final=maquina2.est_final;
  return aux;
}

var aux2= new maquina();

setAlfabeto(aux2,'ε');
setAlfabeto(aux2,'0');
setAlfabeto(aux2,'1');
setEstadoInicial(aux2,'A1');
setEstadosFinales(aux2,'C1');
setEstadosFinales(aux2,'D1');
setEstadosFinales(aux2,'B1');
setEstados(aux2,'A1');
setEstados(aux2,'B1');
setEstados(aux2,'C1');
setEstados(aux2,'D1');
setOpciones(aux2,'A1','0','B1');
setOpciones(aux2,'A1','1','C1');
setOpciones(aux2,'C1','1','B1');
setOpciones(aux2,'C1','0','D1');
setOpciones(aux2,'B1','1','B1');
//ER(aux);
//console.log(aux);
//ER(aux2);


