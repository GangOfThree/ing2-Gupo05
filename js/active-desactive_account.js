$(document).ready(function(){
    $("#inactiveAccount").modal();
    $("#getOutButton").click(function(){
      $(location).attr('href','DBquery/cerrar_sesion.php');
    });
    $("#activeAccountButton").click(function(){
        $.ajax({type:"POST",
        url:"DBquery/user_active.php",
        success:function(msg){
          alert("User activo!");
        }   
        });
    });
});