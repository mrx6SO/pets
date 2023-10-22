<?php 
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
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <title>Cadastrar Novo Anúncio</title>
</head>
<body>
    <header>
        <h1>Cadastrar Novo Anúncio de Animal de Doação</h1>
    </header>
    <section id="modal-body">
        <form action="processa_anuncio.php" method="post" id="cad-usuario-form">
            <label for="fase">Fase</label>
            <select class="form-select" name="fase" id="fase">
            <option selected>Selecione a fase de um Animal</option>
            <option value="F">Filhote</option>
            <option value="A">Adulto</option>
            </select>

            <label for="tipo">Tipo</label>
            <select class="form-select" name="tipo" id="tipo">
            <option selected>Selecione o tipo do Animal</option>
            <option value="G">Gato</option>
            <option value="C">Cachorro</option>
            </select>

            <label for="porte">Porte</label>
            <select class="form-select" name="porte" id="porte">
            <option selected>Selecione o porte do Animal</option>
            <option value="P">Pequeno</option>
            <option value="M">Medio</option>
            <option value="G">Grande</option>
            </select>

            <label for="pelagemcor">Pelagem / Cor</label>
            <input type="text" name="pelagemcor" id="pelagemcor" class="form-control">
            
            <label for="raca">Raça</label>
            <input type="text" name="raca" id="raca" class="form-control">

            <input type="radio" class="form-check-input" name="sexo" value="M" id="sexoM">
            <label for="sexoM" class="form-check-label">Macho</label>

            <input type="radio" class="form-check-input" name="sexo" value="F" id="sexoF">
            <label for="sexoF" class="form-check-label">Fêmea</label>

            <label for="observacao">Obserações</label>
            <textarea name="observacao" class="form-control" id="observacao" cols="77" rows="10"></textarea>

            <button type="submit" name="enviarDados" value="CAD">Cadastrar</button>
            <a href="index_logado.php" rel="next"><input type="button" value="Cancelar"></a>

        </form>
    </section>
</body>
</html>