$(document).ready(function(){
    $('#cep').mask('00.000-000');
    $('#phone').mask('(00) 00000-0000');
    $('#cpf').mask('000.000.000-00');
    $('#cns').mask('000 0000 0000 0000');
    $('#cnpj').mask('00.000.000/0000-00');
});
  
$("#name").on("input", function() {
    var regexp = /[^a-zA-Zà-úÀ-Ú '-.]/g;
    if(this.value.match(regexp)){
        $(this).val(this.value.replace(regexp,''));
    }
});
  
$("#page").on("input", function() {
    var regexp = /[^a-z-]/g;
    if(this.value.match(regexp)){
        $(this).val(this.value.replace(regexp,''));
    }
});

$("#cep").blur(function(){
    var cep = this.value.replace(/[^0-9]/, "");
    cep = cep.replace(/[^0-9]/, "");
    
    if(cep.length != 8){
        return false;
    }
    
    var url = "https://viacep.com.br/ws/"+cep+"/json/";
    
    $.getJSON(url, function(dateReturn){
        try{
            $("#street").val(dateReturn.logradouro.toUpperCase());
            $("#district").val(dateReturn.bairro.toUpperCase());
            $("#city").val(dateReturn.localidade.toUpperCase());
            $("#number").focus();
        }catch(ex){}
    });
});