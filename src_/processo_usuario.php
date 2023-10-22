<?php

session_start();

require_once 'conexaobancopdo.php';

    
    
        
        $nome = $_POST['nome'];
        $datadeNascimento = $_POST['datadeNascimento'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        
        // Consulta SQL para inserir os dados na tabela 'usuario'
$sql = "INSERT INTO usuarios (nome, datadeNascimento, telefone, email, senha) 
        VALUES ('$nome', '$datadeNascimento', '$telefone', '$email', '$senha')";

if ($conn->query($sql) === TRUE) {
    echo "Registro inserido com sucesso!";
    header("Location: /");
} else {
    echo "Erro ao inserir registro: " . $conn->error;
}

// Fechar a conexão com o banco de dados
$conn->close();


?>
