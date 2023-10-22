<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <title>Cadastrar Novo(a) Usuário(a)</title>
</head>
<body>
    <header>
        <h1>Cadastrar Novo(a) Usuário(a)</h1>
    </header>
    <section id="modal-body">
        <form action="processo_usuario.php" method="post" id="cad-usuario-form">
            <span id="msgAlerta"></span>
            <label for="nome">Nome Completo</label>
            <input type="text" name="nome" id="nome">
            <label for="datadeNascimento">Data de Nascimento</label>
            <input type="date" name="datadeNascimento" id="datadeNascimento" value="1980-01-01">
            <label for="telefone">Telefone para Contato</label>
            <input type="tel" name="telefone" id="telefone">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha">
            <button type="submit" name="enviarDados">Cadastrar</button>
            <a href="index.php" rel="next"><input type="button" value="Cancelar"></a>

            <script src="code.jquery.com_jquery-3.7.0.js"></script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <script src="funcao.js"></script>
        </form>
    </section>
</body>
</html>