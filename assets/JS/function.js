function validateForm(){
    var nome = document.getElementById("nome").value;
    var email = document.getElementById("email").value;
    var matricula = document.getElementById("matricula").value;
    var senha = document.getElementById("senha").value;
    var confirma_senha = document.getElementById("re_senha").value;
    
    if (nome == null || nome == "" || nome.indexOf(" ") == -1){
        alert("O nome completo deve ser preenchido");
        return false;
    }
    if (email == null || email == "" || email.indexOf("@") == -1){
        alert("O email deve ser preenchido");
        return false;
    }
    if (matricula == null || matricula == "" || matricula.indexOf(" ") == -1){
        alert("A matricula deve ser preenchida corretamente");
        return false;
    }
  
    if(senha != "" && confirma_senha != "" && senha === confirma_senha){
        return true;
    }
    else{
        alert('Senhas Diferentes, digite novamente');
        return false;
    }
        
    
}