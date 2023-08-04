<?php
require_once('../conexao.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM Professor WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    header("Location: listaprofessor.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Confirmar Exclusão de Professor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="my-4 text-center">Confirmar Exclusão de Professor</h1>
        <p class="lead">Tem certeza que deseja excluir o professor: <?php echo htmlspecialchars($_GET['nome']); ?>?</p>
        <form method="post" action="excluirprofessor.php">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <button type="submit" class="btn btn-danger">Excluir</button>
            <a href="listaprofessor.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>