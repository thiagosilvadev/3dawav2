<?php


if(isset($_GET)) {


$marca = $_GET['marca'];
$modelo = $_GET['modelo'];
$chassis = $_GET['chassis'];
$placa = $_GET['placa'];
$qtdAssentos = $_GET['qtdAssentos'];
$temBanheiro = $_GET['temBanheiro'];
$temArCondicionado = $_GET['temArCondicionado'];
   
$servidor = "localhost";
$usuario = "root";
$senha = "";
$bancodeDados = "faeterj3dawnoite";
$conn = new mysqli($servidor, $usuario, $senha, $bancodeDados);
if ($conn->connect_error) {
    die("Conexao com o banco de dados falhou!!!");
}

$sql = "INSERT INTO onibus(`marca`, `modelo`, `chassis`, `placa`, `qtdAssentos`, `temBanheiro`, `temArCondicionado`) VALUES ('$marca','$modelo','$chassis','$placa','$qtdAssentos', '$temBanheiro','$temArCondicionado')";
$result = $conn->query($sql);
if ($result === TRUE) {
    http_response_code(200);
    echo json_encode([
        'msg' => 'Cadastro criado com successo'
    ]);
} else {
    http_response_code(500);

    echo json_encode($result);
}
}