<?php
require_once('../conexao.php');

if (isset($_GET['id'])) {
    $alunoId = $_GET['id'];

    $sql = "SELECT * FROM Aluno WHERE id = :id";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $alunoId, PDO::PARAM_INT);
        $stmt->execute();
        $aluno = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erro na consulta: " . $e->getMessage();
        exit();
    }

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="my-4 text-center">Editar Aluno ID: <?php echo isset($alunoId) ? htmlspecialchars($alunoId) : ''; ?>
        </h1>
        <form method="post" action="crudaluno.php" class="my-4">
            <input type="hidden" name="id" value="<?php echo isset($aluno['id']) ? htmlspecialchars($aluno['id']) : ''; ?>">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo isset($aluno['nome']) ? htmlspecialchars($aluno['nome']) : ''; ?>">
            </div>

            <div class="form-group">
                <label for="idade">Idade:</label>
                <input type="number" class="form-control" id="idade" name="idade" value="<?php echo isset($aluno['idade']) ? htmlspecialchars($aluno['idade']) : ''; ?>">
            </div>

            <div class="form-group">
                <label for="datanascimento">Data de Nascimento:</label>
                <input type="date" class="form-control" id="datanascimento" name="datanascimento" value="<?php echo isset($aluno['datanascimento']) ? htmlspecialchars($aluno['datanascimento']) : ''; ?>">
            </div>

            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo isset($aluno['endereco']) ? htmlspecialchars($aluno['endereco']) : ''; ?>">
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" name="status" required>
                    <option value="1" <?php echo (isset($aluno['status']) && $aluno['status'] === 1) ? 'selected' : ''; ?>>
                        Ativo
                    </option>
                    <option value="0" <?php echo (isset($aluno['status']) && $aluno['status'] === 0) ? 'selected' : ''; ?>>
                        Inativo
                    </option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="listaaluno.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>