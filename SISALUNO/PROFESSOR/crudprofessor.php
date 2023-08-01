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
        echo "<strong>OK!</strong> O professor $nome foi incluído com sucesso!!!";
        echo "<button class='button'><a href='listaprofessor.php'>Voltar</a></button>";
    }
}
?>
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