<?php
require_once("conexao.php");
$ds = $_GET['diasemana'];
$d = $_GET['disciplina'];

$sql = "SELECT h.hora_inicio,h.hora_fim From horarios as h
INNER JOIN monitor as m on h.id_monitor = m.id_monitor
INNER JOIN disciplina as d on d.id_disciplina = m.id_disciplina
Where d.id_disciplina = :d AND h.dia_semana = :ds";
$query = $conexao->prepare($sql);
$query->bindValue(':d', $d);
$query->bindValue(':ds', $ds);
$query->execute();
$horarios = $query->fetch();

$dadosInicio = explode(":", $horarios['hora_inicio']);
$dadosFim = explode(":", $horarios['hora_fim']);

$retorno = [intval($dadosInicio[0]), intval($dadosFim[0])];
echo json_encode($retorno);
?>
