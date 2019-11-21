<html>

<head>
    <meta charset="UTF-8">
</head>

<body>
    <?php
    require_once("conexao.php");

    $sql = "INSERT INTO curso (nome_curso) VALUES (:nome_curso)";
    $query = $conexao->prepare($sql);
    $curso = "Alimentos";
    $query->bindParam(':nome_curso', $curso);
    $resultado = $query->execute();

    $curso = "Analise e desenvolvimento de sistemas";
    $resultado = $query->execute();

    $curso = "Apicultura";
    $resultado = $query->execute();

    $curso = "Informatica";
    $resultado = $query->execute();

    $curso = "Quimica";
    $resultado = $query->execute();

    ?>
</body>

</html>