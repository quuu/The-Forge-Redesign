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
    $('#machine').change (
        function () {
            var type = $('option:selected').val();
            if(type == "3D Scanner" || type == "Laser Cutter" || type == "Sewing Machine" || type == "Vinyl Cutter"){
                $('#plasticInfo').hide();
                $('#reprintpolicy').hide();
                $('#initialslabel').hide();
                $('#initials').hide();
            }
        });
 });  