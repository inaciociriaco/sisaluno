<!DOCTYPE html>
<html>

<head>
    <title>Cadastro de Aluno</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="my-4 text-center">Cadastro de Aluno</h1>
        <form method="post" action="crudaluno.php" class="my-4">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="idade">Idade:</label>
                    <input type="number" class="form-control" id="idade" name="idade" required>
                </div>
            </div>

            <div class="form-group">
                <label for="datanascimento">Data de Nascimento:</label>
                <input type="date" class="form-control" id="datanascimento" name="datanascimento" required>
            </div>

            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" class="form-control" id="endereco" name="endereco" required>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Ativo">Ativo</option>
                    <option value="Inativo">Inativo</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="listaaluno.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>