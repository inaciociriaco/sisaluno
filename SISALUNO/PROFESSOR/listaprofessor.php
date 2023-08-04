<!DOCTYPE html>
<html>

<head>
    <title>Lista de Professores</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="my-4 text-center">Lista de Professores</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
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

                $sql = "SELECT * FROM Professor";
                $stmt = $pdo->query($sql);

                while ($professor = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($professor['nome']) . "</td>";
                    echo "<td>" . htmlspecialchars($professor['cpf']) . "</td>";
                    echo "<td>" . htmlspecialchars($professor['idade']) . "</td>";
                    echo "<td>" . htmlspecialchars($professor['datanascimento']) . "</td>";
                    echo "<td>" . htmlspecialchars($professor['endereco']) . "</td>";
                    echo "<td>" . htmlspecialchars($professor['status']) . "</td>";
                    echo "<td>";
                    echo '<a href="altprofessor.php?id=' . $professor['id'] . '" class="btn btn-primary">Editar</a>';
                    echo '<a href="excluirprofessor.php?id=' . $professor['id'] . '&nome=' . urlencode($professor['nome']) . '" class="btn btn-danger ml-2">Excluir</a>';
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="cadprofessor.php" class="btn btn-primary">Cadastrar Novo Professor</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>