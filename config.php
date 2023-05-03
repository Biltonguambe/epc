<?php 

  //criando variaveis de coneccao
  $dbHost = 'Localhost';
  $dbUsername = 'root';
  $dbPassword = '';
  $dbName = 'projecto';

  //executando a coneccao
  $coneccao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

   //verificando o erro de coneccao
   if($coneccao->connect_errno)
   {
    echo "erro";
   }
   else{
    //echo "conectado com sucesso";
   
   }
   

?>