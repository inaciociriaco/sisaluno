<?php
                                            
$host = "localhost";
$dbname = "sisaluno";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Captura dos dados do formulário
        $id = $_POST["id"];

        // Exclusão da disciplina pelo ID
        $sql = "DELETE FROM Disciplina WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
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
    <title>Confirmação de Exclusão</title>
    <!-- Inclusão dos arquivos CSS do Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Seu CSS personalizado pode ser incluído aqui -->

</head>

<body>
    <div class="container">
        <h1 class="mt-5">Confirmação de Exclusão</h1>
        <p>Deseja realmente excluir a disciplina "<?php echo htmlspecialchars($disciplina['nomedisciplina']); ?>"?</p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($disciplina['id']); ?>">
            <div class="form-group">
                <label for="confirma">Digite o nome da disciplina para confirmar:</label>
                <input type="text" class="form-control" id="confirma" name="confirma" required>
            </div>

            <input type="submit" name="excluir" value="Excluir" class="btn btn-danger">
        </form>
        <a href="listadisciplina.php" class="btn btn-secondary mt-3">Cancelar</a>
    </div>

    <!-- Inclusão dos arquivos JS do Bootstrap (opcional, mas necessário para alguns componentes interativos) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>