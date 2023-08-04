<?php
require_once('../conexao.php');

$host = "localhost";
$dbname = "sisaluno";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $nomedisciplina = $_POST["nomedisciplina"];
        $ch = $_POST["ch"];
        $semestre = $_POST["semestre"];
        $idprofessor = $_POST["idprofessor"];

        $sql = "INSERT INTO Disciplina (nomedisciplina, ch, semestre, idprofessor) VALUES (:nomedisciplina, :ch, :semestre, :idprofessor)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":nomedisciplina", $nomedisciplina, PDO::PARAM_STR);
        $stmt->bindParam(":ch", $ch, PDO::PARAM_STR);
        $stmt->bindParam(":semestre", $semestre, PDO::PARAM_STR);
        $stmt->bindParam(":idprofessor", $idprofessor, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: listadisciplina.php");
        exit();
    }
} catch (PDOException $e) {
    echo "Erro ao cadastrar disciplina: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Cadastrar Disciplina</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">



</head>

<body>
    <div class="container">
        <h1 class="mt-5">Cadastrar Disciplina</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="nomedisciplina">Nome da Disciplina:</label>
                <input type="text" class="form-control" id="nomedisciplina" name="nomedisciplina" required>
            </div>

            <div class="form-group">
                <label for="ch">Carga Horária:</label>
                <input type="text" class="form-control" id="ch" name="ch" required>
            </div>

            <div class="form-group">
                <label for="semestre">Semestre:</label>
                <input type="text" class="form-control" id="semestre" name="semestre" required>
            </div>

            <div class="form-group">
                <label for="idprofessor">ID do Professor:</label>
                <input type="number" class="form-control" id="idprofessor" name="idprofessor" required>
            </div>

            <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-primary">
        </form>
        <a href="listadisciplina.php" class="btn btn-secondary mt-3">Voltar para a Lista de Disciplinas</a>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>