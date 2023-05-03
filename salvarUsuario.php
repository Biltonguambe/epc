<?php

        
        

    switch (@$_REQUEST["acao"]) {
        case 'cadastrar':
            $nome = $_POST["nome_completo"];
            $turma = $_POST["turma"];
            $matematica = $_POST["matematica"];
            $portugues = $_POST["portugues"];
            $educacaofisica = $_POST["educacaofisica"];
            $media = (int)(($portugues+$matematica+$educacaofisica)/3);
            $frequencia = "";
            
            
           
            if($media > 10)
            {
                $sql = "INSERT INTO alunos (nome_completo, turma, matematica, portugues, educacaofisica, media, situacao, frequencia) VALUES ('{$nome}', '{$turma}', '{$matematica}', '{$portugues}', '{$educacaofisica}', '{$media}', 'aprovado', '')";
            
                $res = $coneccao->query($sql);

                if($res == true)
                {
                    print "<script>alert('cadastrado com sucesso!');</script>";
                    print "<script>location.href='?page=listar';</script>";
                }
                else
                {
                    print "<script>alert('mao foi possiver cadastrar!');</script>";
                    print "<script>location.href='?page=listar';</script>";
                }
                break;
            }
            else
            {
                $sql = "INSERT INTO alunos (nome_completo, turma, matematica, portugues, educacaofisica, media, situacao, frequencia) VALUES ('{$nome}', '{$turma}', '{$matematica}', '{$portugues}', '{$educacaofisica}', '{$media}', 'reprovado', '')";
            
                $res = $coneccao->query($sql);

                if($res == true)
                {
                    print "<script>alert('cadastrado com sucesso!');</script>";
                    print "<script>location.href='?page=listar';</script>";
                }
                else
                {
                    print "<script>alert('mao foi possiver cadastrar!');</script>";
                    print "<script>location.href='?page=listar';</script>";
                }
                break;
            }
        
        case 'editar':
            $nome = $_POST["nome_completo"];
            $turma = $_POST["turma"];
            $matematica = $_POST["matematica"];
            $portugues = $_POST["portugues"];
            $educacaofisica = $_POST["educacaofisica"];
            $media = (int)(($portugues+$matematica+$educacaofisica)/3);
            $contacto = $_POST["contacto"];
            $frequencia = $_POST["frequencia"];
           
          
            if($media >= 10 )
            {
                $sql = "UPDATE alunos SET nome_completo ='{$nome}', turma ='{$turma}', matematica ='{$matematica}', portugues ='{$portugues}', educacaofisica ='{$educacaofisica}', media ='{$media}', situacao ='aprovado', frequencia ='{$frequencia}' WHERE id=".$_REQUEST["id"];

                $res = $coneccao->query($sql);

                if($res == true)
                {
                    print "<script>alert('Editado com Sucesso com sucesso!');</script>";
                    print "<script>location.href='?page=listar';</script>";
                }
                else
                {
                    print "<script>alert('mao foi possiver Editar!');</script>";
                    print "<script>location.href='?page=listar';</script>";
                }
                break;
            }
            else
            {
                $sql = "UPDATE alunos SET nome_completo ='{$nome}', turma ='{$turma}', matematica ='{$matematica}', portugues ='{$portugues}', educacaofisica ='{$educacaofisica}', media ='{$media}', situacao ='reprovado', frequencia ='{$frequencia}' WHERE id=".$_REQUEST["id"];

                $res = $coneccao->query($sql);

                if($res == true)
                {
                    print "<script>alert('Editado com Sucesso com sucesso!');</script>";
                    print "<script>location.href='?page=listar';</script>";
                }
                else
                {
                    print "<script>alert('mao foi possiver Editar!');</script>";
                    print "<script>location.href='?page=listar';</script>";
                }
                break;
            }
        
        
        
        case 'excluir':
              $sql = "DELETE FROM alunos WHERE id=".$_REQUEST["id"];
              $res = $coneccao->query($sql);

            if($res == true)
            {
                print "<script>alert('Excluido com Sucesso com sucesso!');</script>";
                print "<script>location.href='?page=listar';</script>";
            }
            else
            {
                print "<script>alert('mao foi possiver Excluir!');</script>";
                print "<script>location.href='?page=listar';</script>";
            }
            break;
    }

?>