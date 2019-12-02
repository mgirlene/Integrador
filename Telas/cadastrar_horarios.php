<?php
session_start();
if (!isset($_SESSION['id_usuario']) || $_SESSION['tipo_usuario'] != "monitor") {
	header("Location: login.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <title>Cadastrar Horários</title>
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
    include "menu_monitor.php";
    ?>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-t-50 p-b-90">
                <form class="login100-form validate-form flex-sb flex-w" method="POST" action="processar_cadastro_horarios.php" id="formH">
                    <span class="login100-form-title p-b-51">
                        Cadastrar Horário
                    </span>

                    <div class="wrap-input100 validate-input m-b-16" data-validate="Esse campo é obrigatório">
                        <select class="input100" name="dias_semana">
                            <option value="">
                                Dia:
                            </option>
                            <option value="Seg">
                                Segunda
                            </option>
                            <option value="Ter">
                                Terça
                            </option>
                            <option value="Qua">
                                Quarta
                            </option>
                            <option value="Qui">
                                Quinta
                            </option>
                            <option value="Sex">
                                Sexta
                            </option>
                        </select>
                    </div>
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Esse campo é obrigatório">
                        <select class="input100" name="hora_inicio">
                            <option value="">Horário Início</option>
                            <option value='07:00'>07:00</option>
                            <option value='08:00'>08:00</option>
                            <option value='09:00'>09:00</option>
                            <option value='10:00'>10:00</option>
                            <option value='11:00'>11:00</option>
                            <option value='13:00'>13:00</option>
                            <option value='14:00'>14:00</option>
                            <option value='15:00'>15:00</option>
                            <option value='16:00'>16:00</option>
                            <option value='17:00'>17:00</option>
                            <option value='19:00'>19:00</option>
                            <option value='20:00'>20:00</option>
                            <option value='21:00'>21:00</option>
                        </select>
                    </div>
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Esse campo é obrigatório">
                        <select class="input100" name="hora_fim">
                            <option value="">Horario Fim</option>
                            <option value='08:00'>08:00</option>
                            <option value='09:00'>09:00</option>
                            <option value='10:00'>10:00</option>
                            <option value='11:00'>11:00</option>
                            <option value='12:00'>12:00</option>
                            <option value='13:00'>13:00</option>
                            <option value='14:00'>14:00</option>
                            <option value='15:00'>15:00</option>
                            <option value='16:00'>16:00</option>
                            <option value='17:00'>17:00</option>
                            <option value='18:00'>18:00</option>
                            <option value='19:00'>19:00</option>
                            <option value='20:00'>20:00</option>
                            <option value='21:00'>21:00</option>
                            <option value='22:00'>22:00</option>
                        </select>
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