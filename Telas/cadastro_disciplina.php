<html>

<head>
    <meta charset="UTF-8">
</head>

<body>
    <?php
    require_once("conexao.php");

    $sql = "INSERT INTO disciplina (nome_disciplina) VALUES (:nome_disciplina)";
    $query = $conexao->prepare($sql);
    $disciplina = "Portugues";
    $query->bindParam(':nome_disciplina', $disciplina);
    $resultado = $query->execute();

    $disciplina = "Matematica";
    $resultado = $query->execute();

    $disciplina = "Geografia";
    $resultado = $query->execute();

    $disciplina = "Informatica";
    $resultado = $query->execute();

    $disciplina = "Quimica";
    $resultado = $query->execute();

    $disciplina = "Historia";
    $resultado = $query->execute();

    $disciplina = "Ingles";
    $resultado = $query->execute();

    ?>
</body>

</html>