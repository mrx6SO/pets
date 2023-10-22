<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js">
    <script src="funcao.js"></script>
    <title>Pagina Inicial</title>
</head>
<body>
    <div class="container">
        <?php if (!empty($_GET['msgErro'])) {?>
            <div class="alert alert-warnig" role="alert">
                <?php echo $_GET['msgErro'];?>
            </div>
       <?php }?>

       <?php if (!empty($_GET['msgSucesso'])) {?>
            <div class="alert alert-sucess" role="alert">
                <?php echo $_GET['msgSucesso'];?>
            </div>
       <?php }?>
    </div>
    <header>
        
        <h1>Olá seja bem vindo(a)!!!</h1>
    </header>
    <section>
        <form action="processo_login.php" method="post">
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
            <label for="senha">senha</label>
            <input type="password" name="senha" id="senha">
            <button id="botao" type="submit" name="enviarDados">Entrar</button>
            <a href="cadastro.php" rel="prev" target="_blank"><input type="button" value="Cadastrar-se"></a>
        </form>
    </section>
</body>
</html>