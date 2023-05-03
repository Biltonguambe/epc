<?php
    //include 'config.php';
    require 'usuarios.php';
    $u = new usuario;

    /*$h = $_POST['nome'];
    $c = $_POST['confSenha'];
    $e = $_POST['email'];
    $j = $_POST['senha'];
    echo "$h";
    echo "$e";
    echo "$j";
    echo "$c";
    */

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>

    <main>
        
        <form action="<?= $_SERVER['PHP_SELF']?>" method="post">
        <h1>Cadastrar Novo Admistrador</h1>
            <label for="nome">nome</label>
            <input type="text" name="nome" id="nome" placeholder="Digite o seu nome">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Digite o seu email">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" placeholder="Digite a sua senha">
            <label for="confSenha">Confirmar Senha</label>
            <input type="password" name="confSenha" id="confSenha" placeholder="Repita a sua senha ">
            <input type="submit" value="CADASTRAR">
            
        </form>
        <p><button onclick="javascript:history.go(-1)">VOLTAR</button></p>
    </main>
    
    <?php
    
        //verificar se a pessooa clicou mo dopao
        if(isset($_POST['nome']))
        {
            $nome = addslashes($_POST['nome']);
            $email = addslashes( $_POST['email']);
            $senha = addslashes($_POST['senha']); 
            $confSenha = addslashes($_POST['confSenha']);

            //verificar se esta tudo preemchido
            if(!empty($nome) && !empty($email) && !empty($senha) && !empty($confSenha))
            {
                $u->conectar("projecto","localhost","root","");
                if($u->msgErro == "")//se esta tudo ok
                {
                    if($senha == $confSenha)
                    {
                        if($u->cadastrar($nome,$email,$senha))
                        {
                            echo "cadastrado com sucesso, acesse para cadastrar";
                        }
                        else
                        {
                            echo "email ja cadastrado";
                        }
                    }
                    else
                    {
                        echo "semha e comfirmar semha sao diferemtes";
                    }
                    
                }
                else
                {
                    echo "Erro: ".$u->msgErro;
                }
            }
            else
            {
                echo "preemcha todos os campos";
            }
        }

        
    ?>
</body>
</html>