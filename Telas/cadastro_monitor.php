<?php
session_start();
if (!isset($_SESSION['id_usuario']) || $_SESSION['tipo_usuario'] != "admin") {
	header("Location: login.php");
	exit;
}
require_once("conexao.php");
$sql = "SELECT * FROM disciplina";
$query = $conexao->prepare($sql);
$resultado = $query->execute();
$disciplina = $query->fetchAll(PDO::FETCH_ASSOC);

$sql2 = "SELECT * FROM curso";
$query2 = $conexao->prepare($sql2);
$resultado = $query2->execute();

$cursos = $query2->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

	<title>Cadastro Monitor</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
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
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form class="login100-form validate-form flex-sb flex-w" method="POST" action="processar_cadastro_monitor.php" id="formCM">
					<span class="login100-form-title p-b-51">
						Cadastrar Monitor
					</span>


					<div class="wrap-input100 validate-input m-b-16" data-validate="Esse campo é obrigatório">
						<input class="input100" type="text" name="nome" placeholder="Nome">
						<span class="focus-input100"></span>
					</div>


					<div class="wrap-input100 validate-input m-b-16" data-validate="Esse campo é obrigatório">
						<input class="input100" type="text" name="matricula" placeholder="Matrícula">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Esse campo é obrigatório">
						<select class="input100" name="curso">
							<option value="">
								Curso:
							</option>
							<?php
							foreach ($cursos as $curso) {
								echo "<option value ='$curso[id_curso]'>
                                    $curso[nome_curso]
                                    </option>";
							}
							?>
						</select>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Esse campo é obrigatório">
						<select class="input100" name="disciplina">
							<option value="">
								Disciplina:
							</option>
							<?php
							foreach ($disciplina as $disc) {
								echo "<option value ='$disc[id_disciplina]'>
                                    $disc[nome_disciplina]
                                    </option>";
							}
							?>
						</select>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Esse campo é obrigatório">
                        <input class="input100" type="password" name="senha" id="senha" placeholder="Senha">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-16" data-validate="Esse campo é obrigatório">
                        <input class="input100" type="password" name="confSenha" id="confSenha" placeholder="Confirmar senha">
                        <span class="focus-input100"></span>
                    </div>

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn">
							Cadastrar
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	<?php
	include "rodape.php";
	?>

	<div id="dropDownSelect1"></div>

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
	<script src="js/monitor.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
	<!--===============================================================================================-->
</body>

</html>