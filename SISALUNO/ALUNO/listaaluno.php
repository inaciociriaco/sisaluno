<!DOCTYPE html>
<html>

<head>
    <title>Lista de Alunos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="my-4 text-center">Lista de Alunos</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Data de Nascimento</th>
                    <th>Endereço</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('../conexao.php');

                $sql = "SELECT * FROM Aluno";
                $stmt = $pdo->query($sql);

                while ($aluno = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($aluno['nome']) . "</td>";
                    echo "<td>" . htmlspecialchars($aluno['idade']) . "</td>";
                    echo "<td>" . htmlspecialchars($aluno['datanascimento']) . "</td>";
                    echo "<td>" . htmlspecialchars($aluno['endereco']) . "</td>";
                    echo "<td>" . htmlspecialchars($aluno['status']) . "</td>";
                    echo "<td>";
                    echo '<a href="altaaluno.php?id=' . $aluno['id'] . '" class="btn btn-primary">Editar</a>';
                    echo '<a href="excluiraluno.php?id=' . $aluno['id'] . '&nome=' . urlencode($aluno['nome']) . '" class="btn btn-danger ml-2">Excluir</a>';
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="cadaluno.php" class="btn btn-primary">Cadastrar Novo Aluno</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>