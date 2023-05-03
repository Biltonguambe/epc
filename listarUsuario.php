<h1>Listar Geral dos Alunos</h1>
<?php
    $sql = "SELECT * FROM alunos where frequencia != 'Desistiu'";
    $res = $coneccao->query($sql);
    $qtdF = $res->num_rows;
    $sql = "SELECT * FROM alunos";
    $res = $coneccao->query($sql);
    $qtd = $res->num_rows;
    
    
    echo "<strong><p>Total de alunos cadastrados: $qtd</p></strong>";
    echo "<strong><p>Total de alunos que ainda frequentam as aulas: $qtdF </p></strong>";

    if($qtd > 0)
    {
        print "<table class= 'table table-hover table-striped table-bordered'>";
        print "<tr>";
            print "<td>#</td>";
            print "<th>nome</th>";
            print "<th>Turma</th>";
            print "<th>Matematica</th>";
            print "<th>Portugues</th>";
            print "<th>Educacao Fisica</th>";
            print "<th>Media</th>";
            print "<th>Situacao</th>";
            print "<th>Frequencia</th>";
            print "<th>Accoens</th>";
            print "</tr>";
        while($row = $res->fetch_object())
        {   print "<tr>";
            print "<td>".$row->id."</td>";
            print "<td>".$row->nome_completo."</td>";
            print "<td>".$row->turma."</td>";
            print "<td>".$row->matematica."</td>";
            print "<td>".$row->portugues."</td>";
            print "<td>".$row->educacaofisica."</td>";
            print "<td>".$row->media."</td>";
            print "<td>$row->situacao</td>";
            print "<td>".$row->frequencia."</td>";
            
           
            
            
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


<br> <br> <br> <br> <br> <br>