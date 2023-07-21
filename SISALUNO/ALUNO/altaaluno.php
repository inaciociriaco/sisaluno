<?php
require_once('conexao.php');

if (isset($_GET['id'])) {
    $alunoId = $_GET['id'];

    $sql = "SELECT * FROM Aluno WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $alunoId, PDO::PARAM_INT);
    $stmt->execute();
    $aluno = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$aluno) {
        echo "Aluno não encontrado!";
        exit();
    }
} else {
    echo "ID do aluno não especificado!";
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edição de Aluno</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="altaluno.css">
</head>

<body>
    <h1>Editar Aluno ID: <?php echo $alunoId; ?></h1>
    <form method="post" action="crudaluno.php">
        <input type="hidden" name="id" value="<?php echo $aluno['id']; ?>">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($aluno['nome']); ?>"><br>

        <label for="idade">Idade:</label>
        <input type="number" id="idade" name="idade" value="<?php echo htmlspecialchars($aluno['idade']); ?>"><br>

        <label for="datanascimento">Data de Nascimento:</label>
        <input type="date" id="datanascimento" name="datanascimento"
            value="<?php echo htmlspecialchars($aluno['datanascimento']); ?>"><br>

        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco"
            value="<?php echo htmlspecialchars($aluno['endereco']); ?>"><br>

        <label for="status">Status:</label>
        <select name="status" required>
            <option value="Ativo" <?php echo ($aluno['status'] === 'Ativo') ? 'selected' : ''; ?>>Ativo</option>
            <option value="Inativo" <?php echo ($aluno['status'] === 'Inativo') ? 'selected' : ''; ?>>Inativo</option>
        </select><br>

        <input type="submit" name="update" value="Salvar">
    </form>
    <a href="listaaluno.php">Cancelar</a>
</body>

</html>


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

input[type="submit"] {
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

input[type="submit"]:hover {
    background-color: #23527c;
}

a {
    display: inline-block;
    margin-right: 10px;
    background-color: #337ab7;
    color: white;
    text-decoration: none;
    padding: 5px 10px;
    border-radius: 5px;
}

a:hover {
    background-color: #23527c;
}
</style>