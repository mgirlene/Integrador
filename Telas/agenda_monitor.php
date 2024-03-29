<?php
session_start();
$id = $_SESSION['id_usuario'];

require_once("conexao.php");
$monitor = "SELECT * FROM monitor WHERE id_usuario = :id_monitor";
$query1 = $conexao->prepare($monitor);
$query1->bindValue(':id_monitor', $id);
$query1->execute();
$monitor = $query1->fetch();

$sql = "SELECT	a.dia_semana, u.nome ,a.horario, a.duvida From atendimento as a
INNER JOIN aluno as al on a.id_aluno = al.id_aluno
INNER JOIN usuario as u on al.id_usuario = u.id_usuario where a.id_monitor = :m";
$query = $conexao->prepare($sql);
$query->bindValue(':m', $monitor['id_monitor']);
$query->execute();
$atendimento = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <title>Agenda</title>
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
    include "menu_monitor.php";
    ?>
    <div class="tabela">
        <table class="table table-striped" border="1px">
            <thead>
                <tr>
                    <th scope="col">Dia</th>
                    <th scope="col">Aluno</th>
                    <th scope="col">Horário</th>
                    <th scope="col">Assunto</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($atendimento as $a) {
                    echo "<tr>
                            <td> $a[dia_semana]</td>
                            <td> $a[nome]</td>
                            <td> $a[horario]</td>
                            <td>$a[duvida]</td>
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