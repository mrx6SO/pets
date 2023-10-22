<?php

$endereco = 'localhost';
$banco = 'lol';
$usuario = 'root';
$senha = 'root';

    $conn = mysqli_connect($endereco, $usuario, $senha, $banco);
    echo "conectado";


?>
