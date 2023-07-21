<?php
require_once('../conexao.php');

$sql = "SELECT * FROM Aluno";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Lista de Alunos</title>
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
    <h1>Lista de Alunos</h1>
    <table>
        <tr>
            <th>Nome</th>
            <th>Idade</th>
            <th>Data de Nascimento</th>
            <th>Endereço</th>
            <th>Status</th>
            <th>Ações</th>
        </tr><?php foreach ($alunos as $aluno) : ?><tr>
            <td><?php echo htmlspecialchars($aluno['nome']);
                    ?></td>
            <td><?php echo htmlspecialchars($aluno['idade']);
                    ?></td>
            <td><?php echo htmlspecialchars($aluno['datanascimento']);
                    ?></td>
            <td><?php echo htmlspecialchars($aluno['endereco']);
                    ?></td>
            <td><?php echo htmlspecialchars($aluno['status']);
                    ?></td>
            <td><a href="altaluno.php?id=<?php echo $aluno['id']; ?>">Editar</a>
                <form method="post" action="crudaluno.php"><input type="hidden" name="id"
                        value="<?php echo $aluno['id']; ?>"><input type="submit" name="excluir" value="Excluir"></form>
            </td>
        </tr><?php endforeach;
                    ?>
    </table><a href="../index.php">Voltar</a>
</body>

</html>