<?php
include "conecta_mysql.php";


$matricula = $_REQUEST["matricula"];
$sql = "DELETE FROM funcionario WHERE matricula = $matricula;";
mysqli_query($mysqli,$sql);

header('location: funcionario.php');

mysqli_close($mysqli);
?>