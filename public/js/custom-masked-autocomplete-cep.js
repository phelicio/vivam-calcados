$(document).ready(function(){
	$("#cep").mask("99.999-999");
});

$("#cep").blur(function(){
    var cep = this.value.replace(/[^0-9]/, "");
    if(cep.length != 8){
        return false;
    }
    var url = "https://viacep.com.br/ws/"+cep+"/json/";
    $.getJSON(url, function(endereco){
        try{
            $("#rua").val(endereco.logradouro);
            $("#bairro").val(endereco.bairro);
            $("#cidade").val(endereco.localidade);
            $("#estado").val(endereco.uf);
        }catch(e){
            console.log(e);
        }
    });
});