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
   
  if (!empty($_GET['id_anuncio'])) {

     $sql = "SELECT * FROM anuncio WHERE email_pessoa = :email AND id = :id ";

    try {
        $stmt = $pdo->prepare($sql);

        $stmt->execute(array(':email' => $_SESSION['email'], 
        'id' => $_GET['id_anuncio']));

        if ($stmt->rowCount() == 1) {
            $result = $stmt->fetchAll();
            $result = $result[0];

            /*
            echo"Estou logado";
            echo"<pre>";
            print_r($_SESSION);
            echo"</pre>";
            die();
            */
  
        }else{
            header("Location: index_logado.php?msgErro=Você não tem permissão para acessar esta página");
            die();
        }


    } catch (PDOException $e) {
        header("Location: index_logado.php?msgErro=Falha ao obter o registro no banco de dados");
        //die($e->getMessage());
    }

  }else{
    header("Location: index_logado.php?msgErro=Você não tem permissão para acessar esta página");
    die();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <title>Alterar Anúncio</title>
</head>
<body>
    <header>
        <h1>Alterar Anúncio de Animal de Doação</h1>
    </header>
    <section id="modal-body">
        <form action="processa_anuncio.php" method="post" id="cad-usuario-form">

            <label for="id_anuncio">ID</label>
            <input type="text" name="id_anuncio" id="id_anuncio" value="<?php echo $result['id']; ?>" readonly>

            <label for="fase">Fase</label>
            <select class="form-select" name="fase" id="fase">
            <option>Selecione a fase de um Animal</option>
            <option value="F" <?php echo $result['fase'] == 'F' ?"selected":""?>>Filhote</option>
            <option value="A" <?php echo $result['fase'] == 'A' ?"selected":""?>>Adulto</option>
            </select>

            <label for="tipo">Tipo</label>
            <select class="form-select" name="tipo" id="tipo">
            <option>Selecione o tipo do Animal</option>
            <option value="G" <?php echo $result['tipo'] == 'G' ?"selected":""?>>Gato</option>
            <option value="C" <?php echo $result['tipo'] == 'C' ?"selected":""?>>Cachorro</option>
            </select>

            <label for="porte">Porte</label>
            <select class="form-select" name="porte" id="porte">
            <option>Selecione o porte do Animal</option>
            <option value="P" <?php echo $result['porte'] == 'P' ?"selected":""?>>Pequeno</option>
            <option value="M" <?php echo $result['porte'] == 'M' ?"selected":""?>>Medio</option>
            <option value="G" <?php echo $result['porte'] == 'G' ?"selected":""?>>Grande</option>
            </select>

            <label for="pelagemcor">Pelagem / Cor</label>
            <input type="text" name="pelagemcor" id="pelagemcor" class="form-control" value="<?php echo $result['pelagem_cor'];?>">
            
            <label for="raca">Raça</label>
            <input type="text" name="raca" id="raca" class="form-control" value="<?php echo $result['raca'];?>">

            <input type="radio" class="form-check-input" name="sexo" value="M" id="sexoM" <?php echo $result['sexo'] == 'M'? "checked" : "";?>>
            <label for="sexoM" class="form-check-label">Macho</label>

            <input type="radio" class="form-check-input" name="sexo" value="F" id="sexoF" <?php echo $result['sexo'] == 'F'? "checked" : "";?>>
            <label for="sexoF" class="form-check-label">Fêmea</label>

            <label for="observacao">Obserações</label>
            <textarea name="observacao" class="form-control" id="observacao" cols="77" rows="10"><?php echo $result['observacao']; ?></textarea>

            <button type="submit" name="enviarDados" value="ALT">Alterar</button>
            <a href="index_logado.php" rel="next"><input type="button" value="Cancelar"></a>

        </form>
    </section>
</body>
</html>