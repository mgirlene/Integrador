<?php
require_once("conexao.php");

$matricula = addslashes($_POST['matricula']);
$senha = addslashes(md5($_POST['senha']));

try {
    $existe = "SELECT id_usuario, tipo_usuario FROM usuario WHERE matricula = :m AND senha = :s";
    $verifica = $conexao->prepare($existe);
    $verifica->bindValue(':m', $matricula);
    $verifica->bindValue(':s', $senha);
    $verifica->execute();

    if ($verifica->rowCount() > 0) {
        $dado = $verifica->fetch();
        session_start();
        $_SESSION['id_usuario'] = $dado['id_usuario'];
        $_SESSION['tipo_usuario'] = $dado["tipo_usuario"];
        if ($dado["tipo_usuario"] ==  "aluno")
            header("Location: Agendamento.php");
        else if ($dado["tipo_usuario"] == "monitor")
            header("Location: cadastrar_horarios.php");
        else if($dado["tipo_usuario"] == "admin") 
            header("Location: cadastro_monitor.php");
        return true;
    } else {
        header("Location: login.php");
    }
} catch (PDOException $e) {
    echo "erro";
    echo $e->getMessage();
}
