<style>
body {
    background-color: #f2f2f2;
    font-family: Arial, sans-serif;
}

h1 {
    color: #333;
    text-align: center;
    margin-top: 50px;
}

form {
    margin: 0 auto;
    max-width: 500px;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

label {
    display: block;
    margin-top: 10px;
    color: #333;
}

input[type="text"],
input[type="number"],
input[type="date"],
select {
    width: 100%;
    height: 30px;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"] {
    display: block;
    width: 100%;
    height: 40px;
    line-height: 40px;
    margin-top: 20px;
    background-color: #337ab7;
    color: white;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
}

input[type="submit"]:hover {
    background-color: #23527c;
}
</style>
<!DOCTYPE html>
<html>

<head>
    <title>Cadastro de Professor</title>
</head>

<body>
    <h1>Cadastro de Professor</h1>
    <form method="POST" action="crudprofessor.php">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" required pattern="[0-9]{11}"
            title="Digite apenas números, sem pontos ou traços (11 dígitos)"><br>

        <label for="idade">Idade:</label>
        <input type="number" name="idade" required><br>

        <label for="datanascimento">Data de Nascimento:</label>
        <input type="date" name="datanascimento" required><br>

        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" required><br>

        <label for="status">Status:</label>
        <select name="status" required>
            <option value="Ativo">Ativo</option>
            <option value="Inativo">Inativo</option>
        </select><br>

        <input type="submit" name="cadastrar_professor" value="Cadastrar">
    </form>
</body>

</html>