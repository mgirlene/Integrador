<?php

require_once("conexao.php");
    session_start();

    $disciplina = addslashes($_POST['disciplina']);
    $dia = addslashes($_POST['diaSemana']);
    $horario = addslashes($_POST['horario']);
    $motivo = addslashes($_POST['motivo']);

    $id = $_SESSION['id_usuario'];

       try{
            $aluno = "SELECT * FROM aluno WHERE id_usuario = :id_aluno";
            $query1 = $conexao->prepare($aluno);
            $query1->bindValue(':id_aluno', $id);
            $query1->execute();
            $aluno = $query1->fetch();

            $monitor = "SELECT * FROM monitor WHERE id_disciplina = :id_dis";
            $query2 = $conexao->prepare($monitor);
            $query2->bindValue(':id_dis', $disciplina);
            $query2->execute();
            $monitor = $query2->fetch();


            $sql = "INSERT INTO atendimento VALUES (DEFAULT,:dia_semana, :duvida,:horario, :id_aluno,:id_monitor,:id_disciplina)";
            $query = $conexao->prepare($sql);
            $query->bindValue(':dia_semana', $dia);
            $query->bindValue(':duvida',  $motivo);
            $query->bindValue(':horario',  $horario);
            $query->bindValue(':id_aluno', $aluno['id_aluno']);
            $query->bindValue(':id_monitor', $monitor['id_monitor']);
            $query->bindValue(':id_disciplina', $disciplina);
            $resultado = $query->execute();
            
             header("Location: atendimentos.php");

       
       } catch (PDOException $e) {
           echo "erro";
           echo $e->getMessage();
       }

?>