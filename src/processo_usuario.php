<?php 
require_once 'crud-pdo.php';
if (!empty($_POST)) {
    //Esta chegando dados no POSt então posso inserir dados
    //obter dados do formulario ($_POST)

    try {
       //preparar as informações
       //montar o SQL(pgsql)

       $sql = "INSERT INTO pessoa (nome, data_nascimento, telefone, email, senha)
       VALUES
       (:nome,:datadeNascimento, :telefone, :email, :senha)";

       //preparar o sql (PDO)
       $stmt = $pdo->prepare($sql);

       //Definir/organizar os dados p/SQL
       $dados = array(
         ':nome'=>$_POST['nome'],
         ':datadeNascimento'=>$_POST['datadeNascimento'], 
         ':telefone'=>$_POST['telefone'], 
         ':email'=>$_POST['email'], 
         ':senha'=>$_POST['senha']
       );

       //tentar executar o SQL(INSERT)
       //realizar a inserção das informações no BD (com o php)

       if ($stmt->execute($dados)) {
        header("Location: index.php?msgSucesso=Cadastrado com sucesso!");
       }
    } catch (PDOException $e) {
        //die($e->getMessage());

        header("Location: index.php?msgErro=Falha ao Cadastrar!");
    }

}

else {
    header("Location: index.php?msgErro=Erro de acesso!");
}
die();
?>