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
        echo "<strong>OK!</strong> O aluno $nome foi incluído com sucesso!!!";
        echo "<button class='button'><a href='listaaluno.php'>Voltar</a></button>";
    }
}

if (isset($_POST['update'])) {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $datanascimento = $_POST["datanascimento"];
    $endereco = $_POST["endereco"];
    $status = $_POST["status"];

    $sql = "UPDATE Aluno SET nome = ?, idade = ?, datanascimento = ?, endereco = ?, status = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$nome, $idade, $datanascimento, $endereco, $status, $id])) {
        echo "<strong>OK!</strong> O aluno $nome foi alterado com sucesso!!!";
        echo "<button class='button'><a href='index.php'>Voltar</a></button>";
    }
}

if (isset($_POST['excluir'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM Aluno WHERE id = ?";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$id])) {
        echo "<strong>OK!</strong> O aluno $id foi excluído!!!";
        echo "<button class='button'><a href='listaaluno.php'>Voltar</a></button>";
    }
} ?>

<style>
form {
    margin: 0 auto;
    max-width: 500px;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

label {
    display: block;
    margin-top: 10px;
    color: #333;
}

input[type="text"],
input[type="number"],
input[type="date"],
select {
    width: 100%;
    height: 30px;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"],
button {
    display: block;
    width: 100%;
    height: 40px;
    line-height: 40px;
    margin-top: 20px;
    background-color: #337ab7;
    color: white;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
}

input[type="submit"]:hover,
button:hover {
    background-color: #23527c;
}

button {
    cursor: pointer;
    width: auto;
    display: inline-block;
    margin-right: 5px;
    background-color: #6b8e23;
}

button.excluir {
    background-color: #b22222;
}

button.cancelar {
    background-color: #333;
}
</style>