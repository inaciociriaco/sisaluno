<?php
require_once('../conexao.php');

if (isset($_POST['cadastrar'])) {
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $datanascimento = $_POST["datanascimento"];
    $endereco = $_POST["endereco"];
    $status = $_POST["status"];

    $sql = "INSERT INTO Aluno (nome, idade, datanascimento, endereco, status) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$nome, $idade, $datanascimento, $endereco, $status])) {
        $cadastroSucesso = true;
    }
}

if (isset($_POST['update'])) {

}

if (isset($_POST['excluir'])) {

}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Cadastro de Aluno</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <?php if (isset($cadastroSucesso)) : ?>
        <div class="alert alert-success"><strong>Aluno cadastrado com sucesso!</strong></div>
        <a class="btn btn-primary" href="listaaluno.php">Voltar</a>
        <?php else : ?>
        <form method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" required>

            <label for="idade">Idade:</label>
            <input type="number" id="idade" name="idade" class="form-control" required>

            <label for="datanascimento">Data de Nascimento:</label>
            <input type="date" id="datanascimento" name="datanascimento" class="form-control" required>

            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco" class="form-control" required>

            <label for="status">Status:</label>
            <select name="status" class="form-control" required>
                <option value="1">Ativo</option>
                <option value="0">Inativo</option>
            </select>

            <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
            <a class="btn btn-secondary" href="listaaluno.php">Cancelar</a>
        </form>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>