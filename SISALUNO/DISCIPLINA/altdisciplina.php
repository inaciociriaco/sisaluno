<?php
$host = "localhost";
$dbname = "sisaluno";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifica se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Captura dos dados do formulário
        $id = $_POST["id"];
        $nomedisciplina = $_POST["nomedisciplina"];
        $ch = $_POST["ch"];
        $semestre = $_POST["semestre"];
        $idprofessor = $_POST["idprofessor"];

        // Atualização dos dados na tabela "Disciplina"
        $sql = "UPDATE Disciplina SET nomedisciplina = :nomedisciplina, ch = :ch, semestre = :semestre, idprofessor = :idprofessor WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":nomedisciplina", $nomedisciplina, PDO::PARAM_STR);
        $stmt->bindParam(":ch", $ch, PDO::PARAM_STR);
        $stmt->bindParam(":semestre", $semestre, PDO::PARAM_STR);
        $stmt->bindParam(":idprofessor", $idprofessor, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: listadisciplina.php");
        exit();
    } else {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            // Consulta para obter os dados da disciplina pelo ID
            $sql = "SELECT * FROM Disciplina WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $disciplina = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            header("Location: listadisciplina.php");
            exit();
        }
    }
} catch (PDOException $e) {
    echo "Erro na consulta: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Editar Disciplina</title>
    <!-- Inclusão dos arquivos CSS do Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Seu CSS personalizado pode ser incluído aqui -->

</head>

<body>
    <div class="container">
        <h1 class="mt-5">Editar Disciplina</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($disciplina['id']); ?>">
            <div class="form-group">
                <label for="nomedisciplina">Nome da Disciplina:</label>
                <input type="text" class="form-control" id="nomedisciplina" name="nomedisciplina" value="<?php echo htmlspecialchars($disciplina['nomedisciplina']); ?>" required>
            </div>

            <div class="form-group">
                <label for="ch">Carga Horária:</label>
                <input type="text" class="form-control" id="ch" name="ch" value="<?php echo htmlspecialchars($disciplina['ch']); ?>" required>
            </div>

            <div class="form-group">
                <label for="semestre">Semestre:</label>
                <input type="text" class="form-control" id="semestre" name="semestre" value="<?php echo htmlspecialchars($disciplina['semestre']); ?>" required>
            </div>

            <div class="form-group">
                <label for="idprofessor">ID do Professor:</label>
                <input type="number" class="form-control" id="idprofessor" name="idprofessor" value="<?php echo htmlspecialchars($disciplina['idprofessor']); ?>" required>
            </div>

            <input type="submit" name="salvar" value="Salvar" class="btn btn-primary">
        </form>
        <a href="listadisciplina.php" class="btn btn-secondary mt-3">Voltar para a Lista de Disciplinas</a>
    </div>

    <!-- Inclusão dos arquivos JS do Bootstrap (opcional, mas necessário para alguns componentes interativos) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>