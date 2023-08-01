<?php
require_once('../conexao.php');

$sql = "SELECT * FROM Professor"; // Altere o nome da tabela para "Professor"
$stmt = $pdo->prepare($sql);
$stmt->execute();
$professores = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Lista de Professores</title>
    <style>
    table {
        margin-top: 30px;
        width: 100%;
    }

    table th,
    table td {
        padding: 10px;
        border: 1px solid #ccc;
        text-align: left;
    }

    a.editar,
    a.excluir {
        display: inline-block;
        padding: 5px 10px;
        margin-right: 5px;
        background-color: #337ab7;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }

    a.editar:hover,
    a.excluir:hover {
        background-color: #23527c;
    }

    a.excluir {
        background-color: #b22222;
    }

    a.excluir:hover {
        background-color: #800000;
    }

    a.voltar {
        display: inline-block;
        margin-top: 20px;
        background-color: #333;
        color: white;
        padding: 8px 12px;
        text-decoration: none;
        border-radius: 5px;
    }

    a.voltar:hover {
        background-color: #222;
    }
    </style>
</head>

<body>
    <h1>Lista de Professores</h1>
    <table>
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Idade</th>
            <th>Data de Nascimento</th>
            <th>Endereço</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($professores as $professor) : ?>
        <tr>
            <td><?php echo htmlspecialchars($professor['nome']); ?></td>
            <td><?php echo htmlspecialchars($professor['cpf']); ?></td>
            <td><?php echo htmlspecialchars($professor['idade']); ?></td>
            <td><?php echo htmlspecialchars($professor['datanascimento']); ?></td>
            <td><?php echo htmlspecialchars($professor['endereco']); ?></td>
            <td><?php echo htmlspecialchars($professor['status'] ? 'Ativo' : 'Inativo'); ?></td>
            <td>
                <a href="altprofessor.php?id=<?php echo $professor['id']; ?>">Editar</a>

                <form method="post" action="crudprofessor.php">

                    <input type="hidden" name="id" value="<?php echo $professor['id']; ?>">
                    <input type="submit" name="excluir" value="Excluir">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <a href="../index.php">Voltar</a>
</body>

</html>