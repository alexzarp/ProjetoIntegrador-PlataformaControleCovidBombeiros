
function validateForm(){
    var nome = document.getElementById("nome").value;
    var email = document.getElementById("email").value;
    //var sintomas = document.getElementById("sintomas").value;
    //var matricula = document.getElementById("erro").value;
    //var data = document.getElementById("data").value;
    var senha = document.getElementById("senha").value;
    var confirma_senha = document.getElementById("re_senha").value;
    
    if (nome == null || nome == "" || nome.indexOf(" ") == -1){
        alert("Por favor preencha o seu nome completo");
        return false;
    }
    if (email == null || email == "" || email.indexOf("@") == -1){
        alert("O email deve ser preenchido");
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
/*var specialKeys = new Array();
specialKeys.push(8);*/
/*function numero(e){
    var keyCode = e.which ? e.which : e.keyCode
    /*if ((keyCode >= 47 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1){
        document.getElementById("error");
        return true;
    }*/
    /*var ret = ((keyCode >= 47 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
    var matricula = document.getElementById("error");
    return ret;
    /*ret = specialKeys.indexOf(keyCode) == -1*/
    /*if (matricula == null || matricula == "" || matricula.indexOf(" ") == -1){
        alert("Preencha a matricula");
        return false;
    }*/
    
//}

function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)) return true;
    else{
    	if (tecla==8 || tecla==0) return true;
	else  return false;
    }
}
function validaMatricula(){
    var matricula = getElementById("erro").value;
    if(matricula.length < 7 || matricula.length > 8){
        return false;
    }else{
        return true;
    }
    if(matricula == null || matricula == "" || matricula.indexOf(" ") == -1){
        alert("Por favor preencha sua matrícula");
        return false;

    }

}


function validateForm2(){
    var nome = document.getElementById("nome").value;
    var sintomas = document.getElementById("sintomas").value;
    if (sintomas == null || sintomas == "" || sintomas.indexOf(" ") == -1){
        alert("Os sintomas devem ser preenchidos");
        return false;
    }
    if (nome == null || nome == "" || nome.indexOf(" ") == -1){
        alert("O nome completo deve ser preenchido");
        return false;
    }
}

function validateForm3(){
    var nome = document.getElementById("nome").value;
    var sintomas = document.getElementById("sintomas").value;
    var radio = document.getElementsByName("retorno");
    escolhe = -1;
    for (var i = radio.length -1; i > -1; i--) {
        if (radio[i].checked) {
            escolhe = i;
        }
    }
    if(escolhe==-1){
        alert("Por favor escolha uma opção");
        return false;
    }
    if (sintomas == null || sintomas == "" || sintomas.indexOf(" ") == -1){
        alert("Os sintomas devem ser preenchidos");
        return false;
        
    }
    if (nome == null || nome == "" || nome.indexOf(" ") == -1){
        alert("O nome completo deve ser preenchido");
        return false;
    }



}


function validateForm4(){
    //var nome = document.getElementById("name").value;
    var radio = document.getElementsByName("resultado");
    var tipo = document.getElementsByName("teste");
    escolhe = -1;
    for (var i = radio.length -1; i > -1; i--) {
        if (radio[i].checked) {
            escolhe = i;
        }
    }
    if(escolhe==-1){
        alert("Por favor escolha uma opção");
        return false;
    }
    if (tipo.value == " " || tipo.value == "Selecione"){
        alert("Escolha uma opção.");
        return false;
    }
}

function validateForm5(){
    var nome = document.getElementById("nome").value;
    var sintomas = document.getElementById("sintomas").value;
    var radio = document.getElementsByName("vacina");
    var tipo = document.getElementsByName("tipo");
    var tipo2 = document.getElementsByName("idade");
    escolhe = -1;
    for (var i = radio.length -1; i > -1; i--) {
        if (radio[i].checked) {
            escolhe = i;
        }
    }
    // if(escolhe==-1){
    //     alert("Por favor escolha uma opção");
    //     return false;
    // }
    if(form.bombeiro.selectedIndex == 0 || escolhe == -1){
        alert("Selecione um bombeiro!");
        form.st_contrato.focus();
        return false;
    }

    if (sintomas == null || sintomas == "" || sintomas.indexOf(" ") == -1){
        alert("Os sintomas devem ser preenchidos");
        return false;
    }
    if (nome == null || nome == ""){
        alert("O nome completo deve ser preenchido");
        return false;
    }
    if (tipo.value == " " || tipo.value == "Selecione"){
        alert("Escolha uma opção.");
        return false;
    }
    if (tipo2.value == " " || tipo2.value == "Selecione"){
        alert("Escolha uma opção.");
        return false;
    }
}