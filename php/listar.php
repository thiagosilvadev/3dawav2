<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$bancodeDados = "faeterj3dawnoite";
$conn = new mysqli($servidor, $usuario, $senha, $bancodeDados);
if ($conn->connect_error) {
    die("Conexao com o banco de dados falhou!!!");
}

$order = $_GET['order'];
$direction = $_GET['direction'];

$sql = "SELECT * from onibus ORDER BY $order $direction";
$result = $conn->query($sql);

$arr[] = array();
$i = 0;
while ($linha = $result->fetch_assoc()) {
    $arr[$i] = $linha;
    $i++;
}

echo json_encode($arr, JSON_UNESCAPED_UNICODE);
