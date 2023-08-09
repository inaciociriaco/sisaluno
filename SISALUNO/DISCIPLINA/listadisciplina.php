<?php

define('SERVER', '10.70.230.53:3306'); //servidor
define('USUARIO', 'sisaluno'); //usuario
define('SENHA', 'sisaluno2023'); //senha da conexão
define('DATABASE', 'sisaluno'); //nome da database

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql = "SELECT * FROM Disciplina";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $disciplinas = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro na consulta: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Lista de Disciplinas</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">



</head>

<body>
    <div class="container">
        <h1 class="mt-5">Lista de Disciplinas</h1>
        <a href="caddisciplina.php" class="btn btn-primary mb-3">Cadastrar Disciplina</a>
        <a href="../index.php" class="btn btn-primary mb-3">Voltar</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome da Disciplina</th>
                    <th>Carga Horária</th>
                    <th>Semestre</th>
                    <th>ID do Professor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($disciplinas as $disciplina) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($disciplina['id']); ?></td>
                        <td><?php echo htmlspecialchars($disciplina['nomedisciplina']); ?></td>
                        <td><?php echo htmlspecialchars($disciplina['ch']); ?></td>
                        <td><?php echo htmlspecialchars($disciplina['semestre']); ?></td>
                        <td><?php echo htmlspecialchars($disciplina['idprofessor']); ?></td>
                        <td>
                            <a href="altdisciplina.php?id=<?php echo $disciplina['id']; ?>" class="btn btn-primary">Alterar</a>
                            <a href="excluirdisciplina.php?id=<?php echo $disciplina['id']; ?>" class="btn btn-danger">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>

    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
