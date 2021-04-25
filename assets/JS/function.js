
function validateForm(){
    var nome = document.getElementById("nome").value;
    var email = document.getElementById("email").value;
    var sintomas = document.getElementById("sintomas").value;
    var matricula = document.getElementById("matricula").value;
    var data = document.getElementById("data").value;
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
    if (sintomas == null || sintomas == "" || sintomas.indexOf(" ") == -1){
        alert("Os sintomas devem ser preenchidos");
        return false;
    }
    if (data == null || data == "" || data.indexOf(" ") == -1){
        alert("A data deve ser prenchida");
        return false;
    }
    
    if (matricula == null || matricula == "" || matricula.indexOf(" ") == -1){
        alert("A matricula deve ser preenchida");
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

function validateForm2(){
    var sintomas = document.getElementById("sintomas").value;
    var data = document.getElementById("data").value;
    if (sintomas == null || sintomas == "" || sintomas.indexOf(" ") == -1){
        alert("Os sintomas devem ser preenchidos");
        return false;
    }
}

function validateForm3(){
    var sintomas = document.getElementById("sintomas").value;
    var data = document.getElementById("data").value;
    if (sintomas == null || sintomas == "" || sintomas.indexOf(" ") == -1){
        alert("Os sintomas devem ser preenchidos");
        return false;
    }
}