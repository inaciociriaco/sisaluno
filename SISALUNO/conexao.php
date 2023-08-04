<?php
$dsn = 'mysql:host=localhost;dbname=sisaluno';
$user = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erro na conexão com o banco de dados: ' . $e->getMessage();
    exit();
}

$nome = $idade = $datanascimento = $endereco = $status = '';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $datanascimento = $_POST['datanascimento'];
    $endereco = $_POST['endereco'];
    $status = $_POST['status'] ?? '';

    if (empty($nome)) {
        $errors[] = 'O campo nome não foi preenchido.';
    }

    if (!is_numeric($idade) || $idade < 0) {
        $errors[] = 'Idade inválida.';
    }
    if (empty($datanascimento)) {
        $errors[] = 'O campo data de nascimento não foi preenchido.';
    }
    if (empty($endereco)) {
        $errors[] = 'O campo endereço não foi preenchido.';
    }
    if (empty($status)) {
        $errors[] = 'O campo status não foi preenchido.';
    } elseif ($status !== 'AT' && $status !== 'IN') {
        $errors[] = 'Status inválido.';
    }
    if (empty($errors)) {
        $sql = "INSERT INTO Aluno (nome, idade, datanascimento, endereco, status) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);

        try {
            $stmt->execute([$nome, $idade, $datanascimento, $endereco, $status]);

            header('Location: ALUNO/listaaluno.php');
            exit();
        } catch (PDOException $e) {
            echo 'Erro ao cadastrar os dados: ' . $e->getMessage();
            exit();
        }
    }
}
