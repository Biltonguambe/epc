 <?php
    require_once 'usuarios.php';
    $u = new Usuario;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>login</title>
</head>
<body>
    <br><br><br><br><br><br><br>
    <main>
    <p>****************** EPC de Dongane ******************</p>
        <form action="<?= $_SERVER['PHP_SELF']?>" method="post">
             <h3>Faça o Login para ter acesso ao portal</h3>
             <label for="email">Email</label>
             <input type="email" name="email" id="email" placeholder="Digite o seu email">
             <label for="senha">Senha</label>
             <input type="password" name="senha" id="senha" placeholder="Digite a sua senha">
             <input type="submit" value="Logar">    
        </form>
                
                
    </main>
    <?php
    
        //verificar se a pessooa clicou mo dopao
        if(isset($_POST['email']))
        {
            $email = addslashes( $_POST['email']);
            $senha = addslashes($_POST['senha']); 
            

            //verificar se esta tudo preemchido
            if(!empty($email) && !empty($senha))
            {
                $u->conectar("projecto","localhost","root","");
                if($u->msgErro == "")//se esta tudo ok
                {
                    if($u->logar($email,$senha))
                    {
                        header("location: alunus.php");
                    }
                    else
                    {
                    echo "Email e/ou semha estao imcorrectos!";
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
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>