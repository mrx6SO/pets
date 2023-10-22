<?php 

session_start();

include_once('conexaobancopdo.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="box">
    <form method="post" id="formlogin" name="formlogin">
        
        <h1>tela de Login</h1>
        <div class="inputBox">
        <input type="email" placeholder="Digite seu e-mail" name="email" id="email" class="inputUser required" oninput="validatEmaill()">
        <span class="span-required">Digite um e-mail valido</span>
        </div> 
        <div class="inputBox">
        <input type="password" placeholder="Digite sua senha" name="senha" id="senha" class="inputUser required" oninput=" senhaValidal();">
        <span class="span-required">Senha deve ter no minimo 8 caracteres</span>
        </div> 
        <input id="enviarDados" type="submit" name="enviarDados" class="enviarDados" value="Entrar">
        
        <a href="cad_usuario.php" rel="prev" target="_blank">
        <input type="button" class="enviarDados" value="">Cadastro</a>
        
    </form>
    </div>
    <script type="text/javascript" src="script.js"></script>
    <script type="text/javascript" src="validacao.js"></script>
    <script type="text/javascript" src="jquery-3.5.1.min.js"></script>
    
</body>
</html>
