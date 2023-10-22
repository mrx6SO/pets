<?php 
require_once 'crud-pdo.php';

session_start();

  if (empty($_SESSION)) {
    header("Location: index_logado.php?msgErro=Você precisa autenticar o Anúncio no sistema.");
    die(); 
  }
 
  /*
  echo"Estou logado";
  echo"<pre>";
  print_r($_SESSION);
  echo"</pre>";
  die();
  */

if (!empty($_POST)) {
    //Esta chegando dados no POSt então posso inserir dados
    //obter dados do formulario ($_POST)
    //Verificar se esta tentando inserir (CAD) / alterar (ALT) / deletar ou excliur (DEL)

    if ($_POST['enviarDados'] == 'CAD') {
     
      try {
        //preparar as informações
        //montar o SQL(pgsql)
 
        $sql = "INSERT INTO anuncio (fase, tipo, porte, sexo, pelagem_cor, raca, observacao, email_pessoa)
        VALUES
        (:fase, :tipo, :porte, :sexo, :pelagem_cor, :raca, :observacao, :email_pessoa)";
 
        //preparar o sql (PDO)
        $stmt = $pdo->prepare($sql);
 
        //Definir/organizar os dados p/SQL
        $dados = array(
          ':fase'=>$_POST['fase'],
          ':tipo'=>$_POST['tipo'], 
          ':porte'=>$_POST['porte'], 
          ':sexo'=>$_POST['sexo'], 
          ':pelagem_cor'=>$_POST['pelagemcor'],
          ':raca'=>$_POST['raca'],
          ':observacao'=>$_POST['observacao'],
          ':email_pessoa'=>$_SESSION['email']
        );
 
        //tentar executar o SQL(INSERT)
        //realizar a inserção das informações no BD (com o php)
 
        if ($stmt->execute($dados)) {
         header("Location: index_logado.php?msgSucesso=Anúncio Cadastrado com sucesso!");
        }
     } catch (PDOException $e) {
         //die($e->getMessage());
 
         header("Location: index_logado.php?msgErro=Falha ao Cadastrar o Anúncio!");
     }
 
 }elseif($_POST['enviarDados'] == 'ALT'){
  //implementar atualização 

  try {
    $sql = "UPDATE anuncio SET 
  fase = :fase, 
  tipo = :tipo,
  porte = :porte, 
  pelagem_cor = :pelagem_cor,
  raca = :raca,
  sexo = :sexo, 
  observacao = :observacao 
  WHERE 
  id = :id_anuncio AND 
  email_pessoa = :email";

  //Definir SQL
  $dados = array(
    ':id_anuncio' =>$_POST['id_anuncio'], 
    ':fase'=>$_POST['fase'],
    ':tipo'=>$_POST['tipo'], 
    ':porte'=>$_POST['porte'], 
    ':pelagem_cor'=>$_POST['pelagemcor'],
    ':raca'=>$_POST['raca'], 
    ':sexo'=>$_POST['sexo'], 
    ':observacao'=>$_POST['observacao'], 
    ':email'=>$_SESSION['email']
  );

  $stmt = $pdo->prepare($sql);

  if ($stmt->execute($dados)) {
    header("Location: index_logado.php?msgSucesso=Alteração realizada com Sucesso!");
  }
  else{
    header("Location: index_logado.php?msgErro=Falha ao ALTERAR o Anúncio!!");
  }

  } catch (PDOException $e) {
    //die($e->getMessage());
 
    header("Location: index_logado.php?msgErro=Falha ao ALTERAR o Anúncio!");
  }
 }

 elseif($_POST['enviarDados'] == 'DEL'){
  //implementar exclusão
  try {
    $sql = "DELETE FROM anuncio WHERE id = :id_anuncio AND email_pessoa = :email";

    $stmt = $pdo->prepare($sql);

    $dados = array(':id_anuncio'=>$_POST['id_anuncio'], 
  ':email'=>$_POST['email']);

  if ($stmt->execute($dados)) {
    header("Location: index_logado.php?msgSucesso=Anúncio excluido com Sucesso!");
  }else{
    header("Location: index_logado.php?msgErro=Falha ao EXCLUIR o Anúncio!");
  }
  } catch (PDOException $e) {
    //die($e->getMessage());
    header("Location: index_logado.php?msgErro=Falha ao EXCLUIR o Anúncio!!");
  }
 }

 else{
  header("Location: index_logado.php?msgErro=Erro de acesso (operação não definida).");
 }
    }

    

else {
    header("Location: index_logado.php?msgErro=Erro de acesso!");
}
die();
?>