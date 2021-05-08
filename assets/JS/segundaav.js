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