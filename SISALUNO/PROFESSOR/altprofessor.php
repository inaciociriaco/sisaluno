<?php
require_once('../conexao.php');

$professor = null;
$mensagem = '';

if (isset($_GET['id'])) {
    $professorId = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $idade = $_POST["idade"];
        $datanascimento = $_POST["datanascimento"];
        $endereco = $_POST["endereco"];
        $status = $_POST["status"];

        $sql = "UPDATE Professor SET nome = ?, cpf = ?, idade = ?, datanascimento = ?, endereco = ?, status = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute([$nome, $cpf, $idade, $datanascimento, $endereco, $status, $professorId])) {
            $mensagem = 'Professor atualizado com sucesso.';
            header("Location: listaprofessor.php");
            exit;
        } else {
            $mensagem = 'Erro ao atualizar o professor.';
        }
    }

    $sql = "SELECT * FROM Professor WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$professorId]);
    $professor = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$professor) {
        $mensagem = 'Professor não encontrado.';
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Editar Professor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="my-4">Editar Professor</h1>
        <?php if ($mensagem !== '') : ?>
            <div class="alert alert-info" role="alert">
                <?php echo $mensagem; ?>
            </div>
        <?php endif; ?>
        <?php if ($professor) : ?>
            <a href="listaprofessor.php" class="btn btn-secondary">Retornar para Lista de Professores</a>
            <form method="POST" action="altprofessor.php?id=<?php echo $professor['id']; ?>">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($professor['nome']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo htmlspecialchars($professor['cpf']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="idade">Idade:</label>
                    <input type="number" class="form-control" id="idade" name="idade" value="<?php echo htmlspecialchars($professor['idade']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="datanascimento">Data de Nascimento:</label>
                    <input type="date" class="form-control" id="datanascimento" name="datanascimento" value="<?php echo htmlspecialchars($professor['datanascimento']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="endereco">Endereço:</label>
                    <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo htmlspecialchars($professor['endereco']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="AT" <?php if ($professor['status'] === 'AT') echo 'selected'; ?>>Ativo
                        </option>
                        <option value="IN" <?php if ($professor['status'] === 'IN') echo 'selected'; ?>>Inativo
                        </option>
                    </select>
                    <button type="submit"><a href="listaprofessor.php" class="btn btn-secondary">Salvar</a></button>
                </div>
            </form>
        <?php else : ?>
            <div class="alert alert-danger" role="alert">
                Professor não encontrado.
            </div>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>