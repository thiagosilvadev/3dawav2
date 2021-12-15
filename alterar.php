<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Alterar onibus</title>
</head>
<body>
<div class="container mt-5">
<h1>Alterar onibus</h1>
<br><br>
<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$bancodeDados = "faeterj3dawnoite";
$conn = new mysqli($servidor, $usuario, $senha, $bancodeDados);
if ($conn->connect_error) {
    die("Conexao com o banco de dados falhou!!!");
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $sql = "SELECT * FROM onibus WHERE id = $id";
    $result = $conn->query($sql);
    $linha = $result->fetch_assoc();

?>


 <form id="incluirForm" method="POST" action="alterar.php">
        <div class="mb-3">
          <label for="marca" class="form-label">Marca</label>
          <input required type="text" class="form-control" name="marca"  value=<?php echo $linha['marca']?>>
        </div>
        <div class="mb-3">
          <label for="modelo" class="form-label">Modelo</label>
          <input required type="text" class="form-control" name="modelo" value=<?php echo $linha['modelo']?>>
        </div>
        <div class="mb-3">
          <label for="chassis" class="form-label">Chassis</label>
          <input required type="text" class="form-control" name="chassis" value=<?php echo $linha['chassis']?>>
        </div>
        <div class="mb-3">
          <label for="placa" class="form-label">Placa</label>
          <input required type="text" class="form-control" name="placa" value=<?php echo $linha['placa']?>>
        </div>
        <div class="mb-3">
          <label for="qtdAssentos" class="form-label">Quantidade de Assentos</label>
          <input required type="number" class="form-control" name="qtdAssentos" value=<?php echo $linha['qtdAssentos']?>>
        </div>
        <div class="mb-3 form-check">
          <input  type="checkbox" class="form-check-input" name="temBanheiro" checked="<?php echo $linha['temBanheiro'] == '0' ? 'false' : 'true'?>">
          <label class="form-check-label" for="temBanheiro">Tem banheiro</label>
        </div>
        <div class="mb-3 form-check">
          <input  type="checkbox" class="form-check-input" name="temArCondicionado" checked="<?php echo $linha['temArCondicionado'] == '0' ? 'false' : 'true'?>">
          <label class="form-check-label" for="temArCondicionado" >Tem Ar condicionado</label>
        </div>
        <input type="hidden" name="id" value="<?php echo $linha['id'] ?>">
        <button type="submit" class="btn btn-primary">Criar</button>
      </form>








<?php
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {

    $marca = $_POST["marca"];
    $id = $_POST["id"];
    $modelo = $_POST["modelo"];
    $chassis = $_POST["chassis"];
    $placa = $_POST["placa"];
    $qtdAssentos = $_POST["qtdAssentos"];
    $temBanheiro = $_POST["temBanheiro"];
    $temArCondicionado = $_POST["temArCondicionado"];

    $sql = "UPDATE onibus SET marca='$marca', modelo='$modelo', chassis='$chassis', placa='$placa', qtdAssentos='$qtdAssentos', temBanheiro='$temBanheiro', temArCondicionado='$temArCondicionado' where id = $id";
    $result = $conn->query($sql);

    echo '<h2 class="text-success">Onibus Alterado com sucesso</h2>';
}
?>



</div>
</body>
</html>