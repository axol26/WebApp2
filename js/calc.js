$(".compute").click(function(){
    if ($("#Contractual").length > 0){ // if contractual emp
        var salary = 500 * $("#days").val();
        var roundedSal = salary.toFixed(2);   
    } else{ //if regular emp
        var salary = 20000 - ( 20000 * $("#days").val() / 22) - ( 20000 * 0.12);
        var roundedSal = salary.toFixed(2);
    }
    $("#appi").empty();
    if (salary < 0){
        $("#appi").append("Salary is Php 0, is input data correct?");
    } else {
        $("#appi").append("Salary is Php " + roundedSal + "."); //show html 
    }    
})