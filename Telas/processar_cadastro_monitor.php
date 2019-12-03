<?php
    require_once("conexao.php");

    $nome = addslashes($_POST['nome']);
    $matricula = addslashes($_POST['matricula']);
    $curso = addslashes($_POST['curso']);
    $disciplina = addslashes($_POST['disciplina']);
    $senha = addslashes(md5($_POST['senha']));
    $tipo_user = "monitor";
    
    class user{
        public $nome;
        public $matricula;
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

            header("Location: listar_monitores.php");
    
        }
       
       } catch (PDOException $e) {
           echo "erro";
           echo $e->getMessage();
       }

       try{
            $sql = "INSERT INTO monitor (id_usuario,id_disciplina,id_curso) values ($ultimo_id, $disciplina,$curso)";
            $query = $conexao->prepare($sql);
            $res = $query->execute();
       } catch (PDOException $e) {
        echo "erro";
        echo $e->getMessage();
       }

?>