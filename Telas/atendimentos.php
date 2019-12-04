<?php
session_start();
if (!isset($_SESSION['id_usuario']) || $_SESSION['tipo_usuario'] != "aluno") {
    header("Location: login.php");
    exit;
}
$id = $_SESSION['id_usuario'];

require_once("conexao.php");
$aluno = "SELECT * FROM aluno WHERE id_usuario = :id_aluno";
$query1 = $conexao->prepare($aluno);
$query1->bindValue(':id_aluno', $id);
$query1->execute();
$aluno = $query1->fetch();

$sql = "SELECT	a.dia_semana, u.nome ,a.horario, a.duvida, d.nome_disciplina From atendimento as a
INNER JOIN aluno as al on a.id_aluno = al.id_aluno
INNER JOIN usuario as u on al.id_usuario = u.id_usuario
INNER JOIN disciplina as d on d.id_disciplina = a.id_disciplina
where a.id_aluno = :a";
$query = $conexao->prepare($sql);
$query->bindValue(':a', $aluno['id_aluno']);
$query->execute();
$atendimento = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <title>Atendimentos</title>
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
    include "menu_agendamento.php";
    ?>
    <div class="tabela">
        <table class="table table-striped" border="1px">
            <thead>
                <tr>
                    <th scope="col">Dia</th>
                    <th scope="col">Disciplina</th>
                    <th scope="col">Horário</th>
                    <th scope="col">Dúvida</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($atendimento as $a) {
                    echo "<tr>
                            <td> $a[dia_semana]</td>
                            <td> $a[nome_disciplina]</td>
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
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
</body>

</html>