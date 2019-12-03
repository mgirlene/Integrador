<?php
$d = $_GET['t'];
require_once("conexao.php");
$sql = "SELECT	m.id_monitor, d.nome_disciplina, u.nome,h.dia_semana, h.hora_inicio,h.hora_fim From horarios as h
INNER JOIN monitor as m on h.id_monitor = m.id_monitor
INNER JOIN disciplina as d on d.id_disciplina = m.id_disciplina
INNER JOIN usuario as u on m.id_usuario = u.id_usuario Where d.nome_disciplina = :d";
$query = $conexao->prepare($sql);
$query->bindValue(':d', $d);
$query->execute();
$horarios = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <title>Horários</title>
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
    include "menu.php";
    ?>
    <div class="tabela">
        <table class="table table-striped" border="1px">
            <thead>
                <tr>
                    <th scope="col">Disciplina</th>
                    <th scope="col">Monitor</th>
                    <th scope="col">Dia Atendimento</th>
                    <th scope="col">Hora Início</th>
                    <th scope="col">Hora Término</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($horarios as $h) {
                    echo "<tr>
                            <td> $h[nome_disciplina]</td>
                            <td> $h[nome]</td>
                            <td> $h[dia_semana]</td>
                            <td>$h[hora_inicio]</td>
                            <td>$h[hora_fim]</td>
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