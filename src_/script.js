$(document).ready(function(){
$('#enviarDados').on('submit', function(e){

    //var U_nome = $('#nome').val();
    //var U_datadeNascimento = $('#datadeNascimento').val();
    //var U_telefone = $('#telefone').val();
    //var U_email = $('#email').val();
    //var U_senha = $('#senha').val();

   // console.log(U_nome, U_datadeNascimento, U_telefone, U_email, U_senha);
   var data = $('#cad-usuario-form').serialize();
   console.log(data)
   e.preventDefault();
   
   $.ajax(
   {
    url:'processo_usuario.php',
    type:'POST',
    cache: false,
    /*data:{nome: $('#nome').val(),
          datadeNascimento: $('#datadeNascimento').val(),
          telefone: $('#telefone').val(),
          email: $('#email').val(),
          senha: $('#senha').val()},*/
    data: data,
    dataType:'jsonp' 
   }).success(function(data){
    console.log(data);
   });
});
});
