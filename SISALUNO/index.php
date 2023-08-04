<!DOCTYPE html>
<html>

<head>
    <title>Tela Inicial</title>
    <!-- Adicione os links do Bootstrap abaixo -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center mt-5">Bem-vindo!</h1>
                <h2 class="text-center mb-3">O que você deseja fazer?</h2>

                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <a class="btn btn-primary btn-block mb-3" href="ALUNO/cadaluno.php">Cadastrar Aluno</a>
                        <a class="btn btn-primary btn-block mb-3" href="PROFESSOR/cadprofessor.php">Cadastrar
                            Professor</a>
                        <a class="btn btn-primary btn-block" href="DISCIPLINA/caddisciplina.php">Cadastrar
                            Disciplina</a>
                    </div>
                    <div class="col-md-4">
                        <a class="btn btn-primary btn-block mb-3" href="ALUNO/listaaluno.php">Lista Aluno</a>
                        <a class="btn btn-primary btn-block mb-3" href="PROFESSOR/listaprofessor.php">Lista
                            Professor</a>
                        <a class="btn btn-primary btn-block" href="DISCIPLINA/listadisciplina.php">Lista Disciplina</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>