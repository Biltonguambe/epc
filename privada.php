<?php
   include_once "config.php";
   
   session_start();
    if(!isset($_SESSION['id']))
    {
        header("location: idex.php");
        exit;
    }
    else
    {
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM escola WHERE id = '$id'";
        $res = $coneccao->query($sql);
        $mostrar = $res->fetch_assoc();
        $nomeId = $mostrar['nome'];
        $emailID = $mostrar['email'];
    }
?>









