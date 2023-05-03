
<?php
    include_once "privada.php";
    session_start();
    if(!isset($_SESSION['id']))
    {
        header("location: idex.php");
        exit;
    }   
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.rtl.min.css">

    <title>Cadastrar alunos</title>
  </head>
  <body>
  <h10><i>Sistema criado por: <u>Eng Bilton Guambe</u></i></h10>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"> EPC Dongane</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= $_SERVER['PHP_SELF']?>">Relatorio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=novo">Cadastrar Novo aluno</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=listar">Listar alunos</a>
        </li>
      

        <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             PAUTA
             </a>
             <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
               <li><a class="dropdown-item" href="?page=turmaa">Turma "A"</a></li>
               <li><a class="dropdown-item" href="?page=turmac">Turma "C"</a></li>
               <li><a class="dropdown-item" href="?page=turmad">Turma "D"</a></li>
            </ul>
           </li>

           <li class="nav-item">
            <a class="nav-link" href="cadastrar.php">Cadastrar Novo Admistrador</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href=""></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href=""></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href=""></a>
            </li>
            
            <li class="nav-item">
            <a class="nav-link" href=""></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href=""></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href=""></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href=""></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href=""></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href=""></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href=""></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href=""></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href=""></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href=""></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href=""></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href=""></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href=""></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href=""></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href=""></a>
            </li>

           <a class="nav-link" href=""><strong><?=$nomeId?></strong></a>
           <li class="nav-item right">
          <a class="nav-link" href="sair.php"><u>SAIR</u></a>
        </li>
        



       
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <div class="row">
    <div class="col mt-5">
      <?php

        include("configAlun.php");
        include("config.php");
        switch(@$_REQUEST['page'])
        {
          case "novo";
            include("novoAluno.php");
          break;
          case "listar";
            include("listarUsuario.php"); 
          break;
          case "salvar";
            include('salvarUsuario.php');
          break;
          case "editar";
            include('editarUsuario.php');
          break;
          case "logar";
            include('idex.php');
          break;
          case "turmaa";
            include("turmaa.php");
          break;
          case "turmac";
            include("turmac.php");
          break;
          case "turmad";
            include("turmad.php");
          break;
          default;
            echo "<p> O teu email e: <strong>".$emailID."</p></strong>";
            print "<h1>Bem Vindo ao portal da Escola Primaria Completa de Dongane!</h1>";
           
      
      
          $sql = "SELECT * FROM alunos";
          $res = $coneccao->query($sql);
          $totalCadastrados = $res->num_rows;
          //echo "Total: ".$total;

          $sql = "SELECT * FROM alunos where frequencia = 'Desistiu'";
          $res = $coneccao->query($sql);
          $totalDesistidos = $res->num_rows;
          //echo "Total: ".$total;

          $sql = "SELECT * FROM alunos where frequencia != 'Desistiu'";
          $res = $coneccao->query($sql);
          $total = $res->num_rows;
          //echo "Total: ".$total;

          $sql = "SELECT * FROM alunos WHERE situacao = 'aprovado' and frequencia != 'Desistiu'";
          $res = $coneccao->query($sql);
          $aprovados = $res->num_rows;
          //echo "Aprovados: ".$aprovados;

          $sql = "SELECT * FROM alunos WHERE situacao = 'reprovado' and frequencia != 'Desistiu'";
          $res = $coneccao->query($sql);
          $reprovados = $res->num_rows;
          //echo "Reprovados: ".$reprovados;

          $sql = "SELECT * FROM alunos WHERE media < 5 and frequencia != 'Desistiu' ";
          $res = $coneccao->query($sql);
          $menorede5 = $res->num_rows;
          //echo "Menore de 5: ".$menorede5;

          $sql = "SELECT * FROM alunos WHERE media > 15 and frequencia != 'Desistiu' ";
          $res = $coneccao->query($sql);
          $maiorde15 = $res->num_rows;
          //echo "Maiore de 15: ".$maiorde15;
      
          //calculo de percemtagem
          $peraprovado = ($aprovados*100)/$total;
          $prereprovado = ($reprovados*100)/$total;
          $premaior = ($maiorde15*100)/$aprovados;
          $premenor = ($menorede5*100)/$reprovados;

          $sql = "SELECT * FROM alunos WHERE situacao = 'aprovado' and turma = 'A' and frequencia != 'Desistiu'";
          $res = $coneccao->query($sql);
          $aprovadoA = $res->num_rows;
          $sql = "SELECT * FROM alunos WHERE situacao = 'aprovado' and turma = 'C' and frequencia != 'Desistiu'";
          $res = $coneccao->query($sql);
          $aprovadoC = $res->num_rows;
          $sql = "SELECT * FROM alunos WHERE situacao = 'aprovado' and turma = 'D'and frequencia != 'Desistiu'";
          $res = $coneccao->query($sql);
          $aprovadoD = $res->num_rows;
          

          $sql = "SELECT * FROM alunos WHERE situacao = 'reprovado' and turma = 'A' and frequencia != 'Desistiu'";
          $res = $coneccao->query($sql);
          $reprovadoA = $res->num_rows;
          $sql = "SELECT * FROM alunos WHERE situacao = 'reprovado' and turma = 'C' and frequencia != 'Desistiu'";
          $res = $coneccao->query($sql);
          $reprovadoC = $res->num_rows;
          $sql = "SELECT * FROM alunos WHERE situacao = 'reprovado' and turma = 'D' and frequencia != 'Desistiu'";
          $res = $coneccao->query($sql);
          $reprovadoD = $res->num_rows;

          $perDesistidos = (int)(($totalDesistidos*100)/$totalCadastrados);

    
      ?>
      <br><strong>==========================================RELATORIO GLOBAL DA ESCOLA====================================================</strong>
      <p>
        Na Escola Primaria Completa de Dongame num <strong>total de <?=$totalCadastrados?></strong> estudantes matriculados, <strong>desistiram <?=$totalDesistidos?></strong> aluons e <strong><?=$total?></strong>
        continuam frequentando as aulas, porem pode se concluir que cerca de <strong><?=$perDesistidos?>%</strong> dos estudantes <strong>desistiram</strong>  e o remanescente continua frequentando as aulas.
      </p>

        Quanto ao aproveitamento, foram <strong>aprovados <?=$aprovados?></strong> aluons e <strong>reprovaram <?=$reprovados?></strong>
        dos quais <?=$menorede5?> reprovaram com  uma nota <strong>inferior a 5 valores</strong> e <?=$maiorde15?> passaram com uma nota <strong>superior a 15 Valores</strong>.
        <p>Dos que passaram <strong><?=$aprovadoA?></strong> sao da tura A, <strong><?=$aprovadoC?></strong> sao da turma C e por fim <strong><?=$aprovadoD?></strong> da turma D,

        contudo vejamos que dos reprovados <strong><?=$reprovadoA?></strong> sao da tura A, <strong><?=$reprovadoC?></strong> sao da turma C e por fim <strong><?=$reprovadoD?></strong> da turma D.</p>

       Sob ponto de vista percentual, cerca de <strong><?=(int)$peraprovado?>%</strong> dos estudantes <strong>passaram</strong> de classe e cerca de<strong> <?=(int)$prereprovado?>% reprovaram </strong> sendo que <strong> <?=(int)$premaior?>% </strong> passaram com uma media <strong> superior a 15 valores </strong> e cerca de <strong> <?=(int)$premenor?>% </strong>
       reprovaram com uma nota <strong> inferior a 5 valores </strong> .<br><br>
    

      <?php

          $sql = "SELECT * FROM alunos WHERE turma = 'A' and frequencia != 'Desistiu'";
          $res = $coneccao->query($sql);
          $totalA = $res->num_rows;

          $sql = "SELECT * FROM alunos WHERE turma = 'C' and frequencia != 'Desistiu'";
          $res = $coneccao->query($sql);
          $totalC= $res->num_rows;

          $sql = "SELECT * FROM alunos WHERE turma = 'D'and frequencia != 'Desistiu'";
          $res = $coneccao->query($sql);
          $totalD = $res->num_rows;
          
          

           $peraprovadoA = (int)(($aprovadoA*100)/$totalA);
           $peraprovadoC = (int)(($aprovadoC*100)/$totalC);
           $peraprovadoD = (int)(($aprovadoD*100)/$totalD);
        
 
            $perereprovadoA = (int)(($reprovadoA*100)/$totalA);
            $perereprovadoC = (int)(($reprovadoC*100)/$totalC);
            $perereprovadoD = (int)(($reprovadoD*100)/$totalD);

            
            if($peraprovadoA > $peraprovadoC && $peraprovadoA > $peraprovadoD)
              {
              echo "<strong>Lidera  turma C que cerca de ".$peraprovadoA."% dos estudantes tiveram um aproveitamento possitivo</strong>";
              }
              elseif($peraprovadoC > $peraprovadoA && $peraprovadoC > $peraprovadoD)
              {
                echo "<strong>Lidera  turma C que cerca de ".$peraprovadoC."% dos estudantes tiveram um aproveitamento possitivo</strong>";
              }
              else
              {
                echo "<strong>Lidera  turma C que cerca de ".$peraprovadoD."% dos estudantes tiveram um aproveitamento possitivo</strong>";
              }


             
              if($perereprovadoA > $perereprovadoC && $perereprovadoA > $perereprovadoD)
              {
              echo " <strong>e, preocupa nos a turma A onde cerca de ".$perereprovadoA."% dos alunos reprovaram de classe.</strong>";
              }
              elseif($perereprovadoC > $perereprovadoA && $perereprovadoC > $perereprovadoD)
              {
                echo " <strong>e, preocupa nos a turma C onde cerca de ".$perereprovadoC."% dos alunos reprovaram de classe.</strong>";
              }
              else
              {
                echo " <strong>e, preocupa nos a turma D onde cerca de ".$perereprovadoD."% dos alunos reprovaram de classe.</strong>";
              }
      
          }
      ?>
    </div>
  </div>
</div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <br><br><br><br><br><br>
  </body>
</html>

