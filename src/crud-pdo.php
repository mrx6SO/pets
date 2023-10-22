<?php

$endereco = 'localhost';
$banco = 'testepdop';
$usuario = 'postgres';
$senha = 'sistema31';
try {
    $pdo = new PDO("pgsql:host=$endereco;port=5432;dbname=$banco", $usuario, $senha, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
   // echo "conectado";
} catch (PDOException $e) {
    echo "Erro com banco de dados". $e->getMessage();
}
catch(Exception $e){
    echo "Erro generico". $e->getMessage();
    die($e->getMessage());
}

?>