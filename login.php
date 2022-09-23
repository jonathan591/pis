<?php
if(session_id()==''){
    session_start();
}
//limpiamos el array de la variable de ssesion. 
$_SESSION = array();
// permite destruir la sesión activa
session_destroy();

?>
 
<html>
      
    <head>
        <title>Iniciar Session |</title>
      
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
         <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
         <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
         <link rel="icon" href="img/corea.png">
        <link rel="stylesheet" href="css/login.css">
          
     </head>          
   
     <body >
       
       
   
        <div class="container">
         
            <div class="login-form">
                <div class="form-header">
                    <img src="img/vinculacion.jpeg" class="img-fluid">
                </div>
                <form class="form-signin">
                    <i class='bi bi-person-circle'></i> <strong> Usuario</strong>  <input class="form-control" type="text" id="UsuarioTxt" name="Usuario" placeholder="ingrese la cedula " >
                    <i class='bi bi-unlock-fill'></i>  <strong>Contraseña</strong><input class="form-control" type="password" id="claveTxt" name="clave" placeholder="ingrese el password">
                    <a class="bi bi-person-circle" href="register.php">Registarse</a>
                </form>
                <div class="form-footer">
                    <button id="ingresarBtn" name="Ingresar" class="btn btn-block bt-login" onclick="login()"> <i class="bi bi-box-arrow-right"></i>  Iniciar Session</button>
                </div>
                <div id="mensaje"></div>
                
            </div>
        </div>
    </body>
</html>
<script src="jquery/jquery-3.6.0.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script>
    function login(){
        var usuario=$('#UsuarioTxt').val();
        var clave=$('#claveTxt').val();
        $.ajax({
            type:'POST',
            url:'ajax/verificalogin.php',
            data: ({
                usuario_p: usuario,
                clave_p: clave
            }),
            success: function(data){
                if(data==1){
                    window.location='inicio.php';
                }else{
                    $('#mensaje').html(data);
                }
                
            }
        });
    }
</script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>