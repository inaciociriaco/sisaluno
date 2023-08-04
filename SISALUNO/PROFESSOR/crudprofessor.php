<?php
require_once('../conexao.php');

if (isset($_POST['cadastrar_professor'])) {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $idade = $_POST["idade"];
    $datanascimento = $_POST["datanascimento"];
    $endereco = $_POST["endereco"];
    $status = $_POST["status"];

    $sql = "INSERT INTO Professor (nome, cpf, idade, datanascimento, endereco, status) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$nome, $cpf, $idade, $datanascimento, $endereco, $status])) {
        $cadastroSucesso = true;
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Cadastro de Professor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <?php if (isset($cadastroSucesso)) : ?>
        <div class="alert alert-success text-center"><strong>Professor cadastrado com sucesso!</strong></div>
        <a href="listaprofessor.php" class="btn btn-primary btn-block">Ir para Lista de Professores</a>
        <?php else : ?>
        <a href="listaprofessor.php" class="btn btn-primary mb-3">Ir para Lista de Professores</a>
        <?php endif; ?>
    </div>
</body>

</html>