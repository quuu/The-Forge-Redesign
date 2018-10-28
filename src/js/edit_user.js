$('#testing').submit(function(e){
    e.preventDefault();
    $.ajax({
        data: $('#testing').serialize(),
        url: '../controllers/edit_controller_fillin.php',
        method: 'POST',
        success: function(data) {
            if(data =="RIN doesn't exist"){
                alert("RIN doesn't exist")
            }
            else{
                var parsed = data.split(" ");
                console.log(data);
                document.getElementById('rcsID').value=parsed[0];
                document.getElementById('first').value=parsed[1];
                document.getElementById('last').value=parsed[2];
                document.getElementById('email').value=parsed[3];
                document.getElementById('password').value=parsed[4];
                document.getElementById('rin').value=$('#lookup').val();
            }
            
        }
    });
});