$(document).ready(function(){
    $('#plastictype').change(
        function () {
            var plastictype = $('option:selected').val();
            if (plastictype == "resin") {
                $('#amountlabel').text("Amount of plastic (in mL):");
            }else{
                $('#amountlabel').text("Amount of plastic (in g):");
            }
        });
    $('#plasticamount').change(
        function () {
            var amount = $('#plasticamount').val();
            var plastictype = $('option:selected').val();
            if(plastictype == "resin" && amount < 7){
                $('#reprintpolicy').show().find(':input').attr('required', true);
            }else if(plastictype != "resin" && amount < 50){
                $('#reprintpolicy').show().find(':input').attr('required', true);
            }else{
                $('#reprintpolicy').hide().find(':input').attr('required', false);
            }
        });
 });  