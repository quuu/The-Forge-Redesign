
//populate the webpage with information upon load
$(document).ready(function(){
    // e.preventDefault();

    $.ajax({
        method: "POST",
        url: "../controllers/status_bars_controller.php",
        success: function(data){
            
            //parses machine information
            var obj = JSON.parse(data);
            for(var i=0;i<data.length;i++){
                if(typeof obj[i] !== "undefined"){
                    console.log(obj[i])
                }
            }

        }


    });



});