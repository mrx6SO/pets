<?php 
require_once 'crud-pdo.php';

if (!empty($_POST)) {
     
    session_start();
       
    try {
       //preparar as informações
       //montar o SQL(pgsql)

       $sql = "SELECT nome, telefone, email, data_nascimento  FROM  pessoa WHERE email = :email AND senha = :senha";

       //preparar o sql (PDO)
       $stmt = $pdo->prepare($sql);

       //Definir/organizar os dados p/SQL
       $dados = array( 
         ':email'=>$_POST['email'], 
         ':senha'=>$_POST['senha']
       );
        
       $stmt->execute($dados);
       
       $result = $stmt->fetchAll();

       if ($stmt->rowCount() == 1) {
        $result = $result[0];

        $_SESSION['nome'] = $result['nome'];
        $_SESSION['email'] = $result['email'];
        $_SESSION['data_nascimento'] = $result['data_nascimento'];
        $_SESSION['telefone'] = $result['telefone'];

        header("Location: index_logado.php");
       }else{
        session_destroy();

        header("Location: index.php?msgErro=E-mail e/ou senha Inválidos(s)");
       }
       
       
    } catch (PDOException $e) {
        die($e->getMessage());
    }

}else{
    header("Location: index.php?msgErro=Você não tem permissão para acessar esta Pagina");

}
die();


?>