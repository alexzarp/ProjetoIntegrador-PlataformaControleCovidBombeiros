
function validateForm(){
    var nome = document.getElementById("nome").value;
    var email = document.getElementById("email").value;
    var matricula = document.getElementById("matricula").value;
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
    if (matricula == null || matricula == "" || matricula.indexOf("") == -1){
        alert("A matricula deve ser preenchido");
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
function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)) return true;
    else{
    	if (tecla==8 || tecla==0) return true;
	else  return false;
    }
}
function validaMatricula(){
    alert("entrou");
    var matricula = getElementById("matricula").value;
    if(matricula.length < 7 || matricula.length > 8){
        alert("Por favor digite a matrícula com 7 digitos");
        return false;
    }else{
        return true;
    }

}
function validaSenha(){
    var senha = getElementById("senha").value;
    var max = 8;
    if(senha.length > max){
        alert("Digite uma senha com no maxímo 8 digitos");
        return false;
    }else{
        return true;
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
    if(formS.bombeiro_id.selectedIndex==0 || formS.bombeiro.selectedIndex("Nome - Cadastro já deve constar no sistema")){
        alert("Por favor selecione um nome");
        formS.bombeiro_id.focus();
        return false;
    }



}


function validateForm4(){
    //var nome = document.getElementById("name").value;
    var radio = document.getElementsByName("resultado");
    escolhe = -1;
    for (var i = radio.length -1; i > -1; i--) {
        if (radio[i].checked) {
            escolhe = i;
        }
    }
    if(escolhe==-1){
        alert("selecione o resultado do teste");
        return false;
    }
    if(formR.teste.selectedIndex==0){
        alert("Selecione o tipo do teste");
        formR.teste.focus();
        return false;
    }
    if(formR.bombeiro.selectedIndex==0 || formR.bombeiro.selectedIndex("Nome - Cadastro já deve constar no sistema")){
        alert("Por favor selecione um nome");
        formR.bombeiro.focus();
        return false;
    }
    
}

function validateForm5(){
    var sintomas = document.getElementById("sintomas").value;
    var radio = document.getElementsByName("vacina");
    escolhe = -1;
    for (var i = radio.length -1; i > -1; i--) {
        if (radio[i].checked) {
            escolhe = i;
        }
    }
    if(escolhe==-1){
        alert("Escolha a opção da realização da vacina");
        return false;
    }
    
    if (sintomas == null || sintomas == "" || sintomas.indexOf(" ") == -1){
        alert("Os sintomas devem ser preenchidos");
        return false;
    }
    if(formp.idade.selectedIndex==0){
        alert("Por favor selecione a faixa-etária");
        formp.idade.focus();
        return false;
    }
    
    if(formp.bombeiro.selectedIndex==0 || formp.bombeiro.selectedIndex("Selecione seu nome")){
        alert("Por favor selecione seu nome");
        formp.bombeiro.focus();
        return false;
    }
    
}

    
    function exibir(){
        document.getElementById("ocultar").style.display = "block";
    }
    function ocultar(){
        document.getElementById("ocultar").style.display = "none";
    }

    function exibirS(){
        document.getElementById("simR").style.display = "block";
        document.getElementById("naoR").style.display = "none";
    }

    function exibirN(){
        document.getElementById("simR").style.display = "nome";
        document.getElementById("naoR").style.display = "block";
    }



    





