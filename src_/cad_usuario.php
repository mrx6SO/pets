<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    

    <title>Formulario de Cliente</title>
</head>
<body>
    <div class="box">
        
            
                <h1>Cadastrar Novo(a) Usuário(a)</h1>
                <form action="processo_usuario.php" name="cad-usuario-form" id="cad-usuario-form" method="POST">
                
            <div class="inputBox">
            
            <input type="text" placeholder="Digite seu Nome Completo" name="nome" id="nome" class="inputUser required" oninput="validateNome()">
            <span class="span-required">Nome deve ter minimo de 3 caracteres</span>
            </div>
            <label for="datadeNascimento"><strong>Data de Nascimento:</strong></label>
            <input type="date" placeholder="Insira sua data de Nascimento" name="datadeNascimento" id="datadeNascimento" required>
            <div class="inputBox">
            <input type="tel"  placeholder="Digite seu telefone" name="telefone" id="telefone" class="inputUser required" oninput="validatTelefone()">
            <span class="span-required">Digite um telefone valido</span>
            </div>
            <div class="inputBox">
            <input type="email" placeholder="Digite seu e-mail" name="email" id="email" class="inputUser required"  oninput="validatEmail()">
            <span class="span-required">Digite um e-mail valido</span>
            <br><br>
            <div class="inputBox">
            <input type="password"  placeholder="Digite sua senha" name="senha" id="senha" class="inputUser required" oninput="senhaValida()">
            <span class="span-required">Digite sua senha</span>
            </div>
            <br>
            <button type="submit" name="enviarDados" class="enviarDados" id="enviarDados">Cadastrar</button>
            <br><br>
            <a href="#" rel="next"><input type="button" class="enviarDados" value="Cancelar"></a>
        </form>
    </div>
    
          <script src="jquery-3.5.1.min.js"></script>
    
    <script src="validacao.js"></script>
  
</body>
</html>
