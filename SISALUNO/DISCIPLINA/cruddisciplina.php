<?php
define('SERVER', '10.70.230.53:3306'); //servidor
define('USUARIO', 'sisaluno'); //usuario
define('SENHA', 'sisaluno2023'); //senha da conexão
define('DATABASE', 'sisaluno'); //nome da database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifica se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Captura dos dados do formulário
        $nomedisciplina = $_POST["nomedisciplina"];
        $ch = $_POST["ch"];
        $semestre = $_POST["semestre"];
        $idprofessor = $_POST["idprofessor"];

        // Verificar se o professor está cadastrado
        $sql = "SELECT COUNT(*) FROM Professor WHERE id = :idprofessor";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":idprofessor", $idprofessor, PDO::PARAM_INT);
        $stmt->execute();
        $numProfessores = $stmt->fetchColumn();

        if ($numProfessores === 0) {
            echo "Erro: O professor com o ID $idprofessor não está cadastrado.";
            exit();
        }

        // Inserção da disciplina na tabela "Disciplina"
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

</head>

<body>
    <h1>Cadastrar Disciplina</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nomedisciplina">Nome da Disciplina:</label>
        <input type="text" id="nomedisciplina" name="nomedisciplina" required><br>

        <label for="ch">Carga Horária:</label>
        <input type="text" id="ch" name="ch" required><br>

        <label for="semestre">Semestre:</label>
        <input type="text" id="semestre" name="semestre" required><br>

        <label for="idprofessor">ID do Professor:</label>
        <input type="number" id="idprofessor" name="idprofessor" required><br>

        <input type="submit" name="cadastrar" value="Cadastrar">
    </form>
    <a href="listadisciplina.php">Voltar para a Lista de Disciplinas</a>
</body>

</html>
