<?php
class Usuario
{
    private $pdo;
    public $msgErro = "";
    public function conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;
        global $msgErro;
        try {
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
            
        } catch (PDOException $e) {
            $msgErro =$e->getMessage();       
        }
        
    }

    public function cadastrar($nome,$email,$senha)
    {
        global $pdo;
        global $msgErro;

        //verificar se ja existe o emeil cadastrado
        $sql = $pdo->prepare("SELECT id FROM escola WHERE email = :e");
        $sql->bindValue(":e",$email);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            return false; //ja esta cadastrado
            echo "ja cadastrado";
        }
        else
        {
            //caso mao, cadastrar
            $sql = $pdo->prepare("INSERT INTO escola (nome, email, senha) VALUES (:n, :e, :s)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":s",md5($senha));
            $sql->execute();
            return true;
            
        }

        

    }

    public function logar($email,$senha)
    {
        
        global $pdo;
        global $msgErro;
        //verificar se o email e a semha estao cadastrados, se sim
        $sql = $pdo->prepare("SELECT id FROM escola WHERE email = :e AND senha = :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",md5($senha));
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            //emtrar mo sistema(semsao)
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id'] = $dado['id'];
            return true; //Logado com sucesso
        }
        else
        {
            return false; //mao foi possivel logar
        }
    }
}

?>