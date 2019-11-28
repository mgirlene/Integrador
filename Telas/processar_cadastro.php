<?php
    require_once("conexao.php");

    $nome = $_POST['nome'];
    $matricula = $_POST['matricula'];
    $curso = $_POST['curso'];
    $senha = md5($_POST['senha']);
    $tipo_user = "aluno";
    
    class user{
        public $nome;
        public $matricula;
        public $curso;
        public $senha;
        public $tipo_user;
    }
       try{
        $existe = "SELECT id_usuario FROM usuario WHERE matricula = :m";
        $verifica = $conexao->prepare($existe);
        $verifica->bindValue(':m', $matricula);
        $verifica->execute();

        if($verifica->rowCount() > 0){
            return false;
        }

        else{
            $sql = "INSERT INTO usuario (tipo_usuario,matricula,nome,senha) VALUES (:tipo_usuario,:matricula,:nome,:senha)";
            $query = $conexao->prepare($sql);
            
            $query->bindValue(':tipo_usuario', $tipo_user);
            $query->bindValue(':matricula', $matricula );
            $query->bindValue(':nome', $nome );
            $query->bindValue(':senha', $senha);
            $resultado = $query->execute();
            $ultimo_id = $conexao->lastInsertId();

            header("Location: login.php");
    
        }
       
       } catch (PDOException $e) {
           echo "erro";
           echo $e->getMessage();
       }

       try{
            $sql = "INSERT INTO aluno (id_curso, id_usuario) values ($curso, $ultimo_id)";
            $query = $conexao->prepare($sql);
            $res = $query->execute();
       } catch (PDOException $e) {
        echo "erro";
        echo $e->getMessage();
       }

?>