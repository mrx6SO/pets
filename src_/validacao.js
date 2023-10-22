const form = document.getElementById('cad-usuario-form');
const formm = document.getElementById('formlogin');
const formn = document.getElementById('cad-anuncio-form');
const campos = document.querySelectorAll('.required');
const spans = document.querySelectorAll('.span-required');
const emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
//const cad_usuario = formm.querySelectorAll('.required')
/*form.addEventListener('submit', function() {
    
    validateNome();
    validatTelefone(); 
    validatEmail();
    //validatEmaill();
    
    //senhaValidal(); 
    senhaValida(); 
     
    
    //event.preventDefault();
 
*/
function setError(){
  campos[0].style.border = '2px solid #e63636';
  spans[0].style.display = 'block';
}

function RemoveError(){
    campos[0].style.border = '';
    spans[0].style.display = 'none';
}
function validateNome(){
    if (campos[0].value.length < 3) {
        setError(0);
    }else{
      RemoveError(0);
    }
}

function validatEmail(){
    if (!emailRegex.test(campos[2].value)) {
        setError(2);
    }else{
        RemoveError(2);
    }

}

function senhaValida(){
    if (campos[3].value.length < 8) {
        setError(3);
    }else{
        RemoveError(3);
    }
}

function validatTelefone(){
        if (campos[2].value.length < 9) {
            setError(1);
        }else{
            RemoveError(1);
        }
}

function setErrorr(index){
    campos[index].style.border = '2px solid #e63636';
    spans[index].style.display = 'block';
  }
  
  function RemoveErrorr(index){
      campos[index].style.border = '';
      spans[index].style.display = 'none';
  }

  function validatEmaill(){
    if (!emailRegex.test(campos[0].value)) {
        setErrorr(0);
    }else{
        RemoveErrorr(0);
    }

}

function senhaValidal(){
    if (campos[1].value.length < 8) {
        setErrorr(1);
    }else{
        RemoveErrorr(1);
    }
}


function setErro(cad_anuncio){
    campos[cad_anuncio].style.border = '2px solid #e63636';
    spans[cad_anuncio].style.display = 'block';
  }
  
  function RemoveErro(cad_anuncio){
      campos[cad_anuncio].style.border = '';
      spans[cad_anuncio].style.display = 'none';
  }
 
  function peloValidat(){
    if (campos[0].value.length == 0) {
        setErrorr(0);
    }else{
        RemoveErrorr(0);
    }
}

function racaValidat(){
    if (campos[1].value.length == 0) {
        setErrorr(1);
    }else{
        RemoveErrorr(1);
    }
}

form.addEventListener('submit', function() {
    
    validateNome();
    validatTelefone(); 
    validatEmail();
    //validatEmaill();
    
    //senhaValidal(); 
    senhaValida(); 
     
    
    //event.preventDefault();

});
