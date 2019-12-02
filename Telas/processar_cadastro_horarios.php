<?php

require_once("conexao.php");
    session_start();

    $dia = addslashes($_POST['dias_semana']);
    $horaI = addslashes($_POST['hora_inicio']);
    $horaF = addslashes($_POST['hora_fim']);
    $id = $_SESSION['id_usuario'];
    
       try{
            $monitor = "SELECT * FROM monitor WHERE id_usuario = :id_monitor";
            $query1 = $conexao->prepare($monitor);
            $query1->bindValue(':id_monitor', $id);
            $query1->execute();
            $monitor = $query1->fetch();


            $sql = "INSERT INTO horarios VALUES (DEFAULT,:dia_semana, :hora_inicio, :hora_fim, :id_user_monitor)";
            $query = $conexao->prepare($sql);
            $query->bindValue(':dia_semana', $dia);
            $query->bindValue(':hora_inicio',  $horaI);
            $query->bindValue(':hora_fim', $horaF );
            $query->bindValue(':id_user_monitor', $monitor['id_monitor']);
            $resultado = $query->execute();
            
             header("Location: horarios_monitor.php");

       
       } catch (PDOException $e) {
           echo "erro";
           echo $e->getMessage();
       }

?>