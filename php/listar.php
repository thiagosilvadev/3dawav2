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


$sql = "SELECT * from onibus ORDER BY '$order' DESC";
$result = $conn->query($sql);

$arr[] = array();
$i = 0;
While ($linha = $result->fetch_assoc()){
    $arr[$i] = $linha;
     $i++;
}

echo json_encode($arr, JSON_UNESCAPED_UNICODE);


?>