<h1>TURMA "C"</h1>

<?php
      $sql = "SELECT * FROM alunos WHERE turma = 'C' and frequencia != 'Desistiu'";
      $res = $coneccao->query($sql);
      $qtd = $res->num_rows;
      

      if($qtd > 0)
      {
          print "<table class= 'table table-hover table-striped table-bordered'>";
          print "<tr>";
              print "<td>#</td>";
              print "<th>nome</th>";
              print "<th>Matematica</th>";
              print "<th>Portugues</th>";
              print "<th>Educacao Fisica</th>";
              print "<th>Media</th>";
              print "<th>Situacao</th>";
              print "<th>Accoens</th>";
              print "</tr>";
          while($row = $res->fetch_object())
          {   print "<tr>";
              print "<td>".$row->id."</td>";
              print "<td>".$row->nome_completo."</td>";
              print "<td>".$row->matematica."</td>";
              print "<td>".$row->portugues."</td>";
              print "<td>".$row->educacaofisica."</td>";
              print "<td>".$row->media."</td>";
              print "<td>$row->situacao</td>";

              
              print "<td>
                      <button onclick=\"location.href= '?page=editar&id=".$row->id."';\" class= 'btn btn-success'>Editar</button>
  
                      <button onclick=\"if(confirm('Tem certeza de que deseja excluir?')){location.href= '?page=salvar&acao=excluir&id=".$row->id."';}else{false;}\"  class= 'btn btn-danger'>Exculir</button>
              
                    </td>";
              print "</tr>";
          }
          print "</table>";
      }
      else
      {
          print "<p class='alert alert-danger'> Sem resultado disponivel!</p>";
      }
?>

<Section>
    <h1>Relatorio</h1>
      <?php

    $sql = "SELECT * FROM alunos WHERE turma = 'C' and frequencia != 'Desistiu'";
    $res = $coneccao->query($sql);
    $total = $res->num_rows;
    //echo "Total: ".$total;

    $sql = "SELECT * FROM alunos WHERE turma = 'C' and situacao = 'aprovado' and frequencia != 'Desistiu'";
    $res = $coneccao->query($sql);
    $aprovados = $res->num_rows;
    //echo "Aprovados: ".$aprovados;

    $sql = "SELECT * FROM alunos WHERE turma = 'C' and situacao = 'reprovado' and frequencia != 'Desistiu'";
    $res = $coneccao->query($sql);
    $reprovados = $res->num_rows;
    //echo "Reprovados: ".$reprovados;

    $sql = "SELECT * FROM alunos WHERE turma = 'C' and media < 5  and frequencia != 'Desistiu'";
    $res = $coneccao->query($sql);
    $menorede5 = $res->num_rows;
    //echo "Menore de 5: ".$menorede5;

    $sql = "SELECT * FROM alunos WHERE turma = 'C' and media > 15  and frequencia != 'Desistiu'";
    $res = $coneccao->query($sql);
    $maiorde15 = $res->num_rows;
    //echo "Maiore de 15: ".$maiorde15;
 
     //calculo de percemtagem
     $peraprovado = ($aprovados*100)/$total;
     $prereprovado = ($reprovados*100)/$total;
     $premaior = ($maiorde15*100)/$aprovados;
     $premenor = ($menorede5*100)/$reprovados;
    ?>
    
    <li>
        Na turma C da Escola Primaria Completa de Dongane num <strong>total de <?=$total?></strong> estudantes, foram <strong>aprovados <?=$aprovados?></strong> aluons e <strong>reprovaram <?=$reprovados?></strong>
      dos quais <?=$menorede5?> reprovaram com  uma nota <strong>inferior a 5 valores</strong> e <?=$maiorde15?> passaram com uma nota <strong>superior a 15 Valores</strong>.
    </li>
    <br>
    <li>
        No concernente a percentagem, cerca de <strong><?=(int)$peraprovado?>%</strong> dos estudantes <strong>passaram</strong> de classe e cerca de<strong> <?=(int)$prereprovado?>% reprovaram </strong> semdo que <strong> <?=(int)$premaior?>% </strong> passaram com uma media <strong> superior a 15 valores </strong> e cerca de <strong> <?=(int)$premenor?>% </strong>
        reprovaram com uma nota <strong> inferior a 5 valores </strong> .
    </li>
    <br>

</Section>

