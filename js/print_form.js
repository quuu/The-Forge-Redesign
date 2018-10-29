$(document).ready(function(){
    $('#plastictype').change(
        function () {
            var current_plastic = JSON.parse($('#plastictype option:selected').val());
            var plastictype = current_plastic.type;
            if (plastictype == "Resin") {
                $('#amountlabel').text("Amount of plastic (in mL):");
            }else{
                $('#amountlabel').text("Amount of plastic (in g):");
            }
        });
    // If the amount of plastic is outside of the required amount then we must hide the reprint
    // policy as it does not apply.
    $('#plasticamount').change(
        function () {
            var amount = $('#plasticamount').val();
            var current_plastic = JSON.parse($('#plastictype option:selected').val());
            var plastictype = current_plastic.type;
            document.getElementById("printprice").innerHTML = "<strong>$" + (current_plastic.price * amount).toFixed(2) + "</strong>";
            if(plastictype == "Resin" && amount < 7){
                $('#reprintpolicy').show(400);
            }else if(plastictype != "Resin" && amount < 50){
                $('#reprintpolicy').show(400);
            }else{
                $('#reprintpolicy').hide(400);
            }
        });
    $('#machine').change (
        function () {
            var type = $('#machine option:selected').val();
            // These are machines that don't handle plastic, so plastic info doesn't make sense
            if(type == "3D Scanner" || type == "Laser Cutter" || type == "Sewing Machine" || type == "Vinyl Cutter"){
                $('#plasticInfo').hide(400);
                $('#reprintpolicy').hide(400);
                $('#initialslabel').hide(400);
                $('#initials').hide(400);
            }else{
                $('#plasticInfo').show(400);
                $('#reprintpolicy').show(400);
                $('#initialslabel').show(400);
                $('#initials').show(400);
            }
        });
    // Since it defaults to a 3D scanner first we trigger a change event so that the form rests in a state that we expect.
    $("#machine").trigger("change");

    // This handles making something required or not based on if it is visible
    $("form").change(function(){
        $('.required').prop('required', function(){
            return  $(this).is(':visible');
         });
    });

 });  