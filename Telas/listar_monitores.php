<?php
session_start();
if (!isset($_SESSION['id_usuario']) || $_SESSION['tipo_usuario'] != "admin") {
    header("Location: login.php");
    exit;
}
require_once("conexao.php");
$sql = "SELECT m.id_monitor, u.nome, u.matricula, d.nome_disciplina From monitor as m 
INNER JOIN usuario as u on m.id_usuario = u.id_usuario
INNER JOIN disciplina as d on m.id_disciplina = d.id_disciplina";
$query = $conexao->prepare($sql);
$resultado = $query->execute();
$monitor = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <title>Monitores</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>

<body>
    <?php
    include "menu_admin.php";
    ?>
    <div class="tabela">
        <table class="table table-striped" border="1px">
            <thead>
                <tr>
                    <th scope="col">Monitor</th>
                    <th scope="col">Matrícula</th>
                    <th scope="col">Disciplina</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($monitor as $m) {
                        echo "<tr>
                            <td> $m[nome]</td>
                            <td>$m[matricula]</td>
                            <td>$m[nome_disciplina]</td>
                        </tr>";
                    }
                ?>
            </tbody>
        </table>

    </div>

    <?php
    include "rodape.php";
    ?>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <script src="js/main.js"></script>
    <!--===============================================================================================-->
</body>

</html>