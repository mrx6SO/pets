<?php 
require_once 'crud-pdo.php';

session_start();


  if (empty($_SESSION)) {
    header("Location: index.php?msgErro=Você precisa se autenticar no sistema.");
    die(); 
  }
 
  /*
  echo"Estou logado";
  echo"<pre>";
  print_r($_SESSION);
  echo"</pre>";
  die();
  */
  
  $anuncios = array();

  if (!empty($_GET['meus_anuncios']) && $_GET['meus_anuncios'] == 1) {
    $sql = "SELECT * FROM anuncio WHERE email_pessoa = :email ORDER BY id ASC";
    $dados = array(':email' => $_SESSION['email']);
    
    try {
      $stmt = $pdo->prepare($sql);

      if ($stmt->execute($dados)) {

        $anuncios = $stmt->fetchAll();
      }
      else{
        die("Falha ao executar o SQL..#1");
      }
    } catch (\PDOException $e) {
      die($e->getMessage());
    }
  }
  else {

  $sql = "SELECT * FROM anuncio ORDER BY id ASC";

  try {
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute()) {
       $anuncios = $stmt->fetchAll();
       /*
       echo'<pre>';
       print_r($anuncios);
       echo'</pre>';
       die();
       */
    }else{
      die("Falha ao executar o SQL..#2");
    }
  } catch (\PDOException $e) {
    die($e->getMessage());
  }

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="style.css">
    <title>Ambiente logado</title>
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

  <div class="container">
    <div class="col-md-11">
      <h2 class="title">Olá <em><?php echo $_SESSION['nome']?></em>, seja bem-vindo(a)!</h2>
    </div>
  </div>

  <div class="container">
    <a href="cad_anuncio.php"><input type="button" value="Novo Anúncio"></a>
    <a href="index_logado.php?meus_anuncios=1"><input type="button" value="Meus Anúncios"></a>
    <a href="index_logado.php?meus_anuncios=0"><input type="button" value="Todos Anúncios"></a>
    <a href="logout.php" ><input type="button" value="Sair"></a>
  </div>

  <?php if (!empty($anuncios)) {?>
    <!--Aqui que sera montada a tabela com relação dos Anúncios-->

    <section>
      <table>
        <thead>
          <tr>
          <th scope="col">#</th>
          <th scope="col">Fase</th>
          <th scope="col">Tipo</th>
          <th scope="col">Porte</th>
          <th scope="col">Pelagem / Cor</th>
          <th scope="col">Raça</th>
          <th scope="col">Sexo</th>
          </tr>
        </thead>

        <tbody>
          <?php foreach($anuncios as $a){ ?>
            <tr>
              <th scope="row"><?php echo $a['id']; ?></th>
              <td><?php echo $a['fase'] == 'A'? "Adulto":"Filhote"; ?></td>
              <td><?php echo $a['tipo'] == 'G'? "Gato":"Cachorro"; ?></td>
              <td><?php echo $a['porte']; ?></td>
              <td><?php echo $a['pelagem_cor']; ?></td>
              <td><?php echo $a['raca']; ?></td>
              <td><?php echo $a['sexo'] == 'M'? "Macho":"Fêmea"; ?></td>
              <td><?php if ($a['email_pessoa'] == $_SESSION['email']) {?>
                <a href="alterar_anuncio.php?id_anuncio=<?php echo $a['id'];?>" ><input type="button" value="Alterar"></a>
                <a href="deletar_anuncio.php?id_anuncio=<?php echo $a['id'];?>" ><input type="button" value="Excluir"></a>
              <?php } ?></td>
            </tr>
            <?php } ?>
        </tbody>
      </table>
    </section>
  <?php }?> 
  
</body>
</html>