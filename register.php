<?php 
  require_once ("./conf/confconexion.php");
?>

<html>
    
    <head>
        <title>Registrase</title>
     
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
         <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
         <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
         <link rel="icon" href="img/corea.png">
        <link rel="stylesheet" href="css/login.css">
          
     </head>          
    
        
     <body  >
 

   
        <!--<div class="col-lg-5 col-lg-offset-6"></div>--> 
        <div class="container">
            <div class="login-form ">
<!--                <div class="form-header ">
                    <img src="img/logotipo.jpeg" class="img-circle" width="170px" >
                </div>-->
<form class="form-signin"  >
    <strong> Nombre</strong>  <input class="form-control" type="text" id="UsuarioTxt" name="Nombres_txt" placeholder="ingrese el usuario" required>
    <strong> Usuario</strong>  <input class="form-control" type="text" id="CeddulaTxt" name="cedula_txt" placeholder="ingrese la cedula" required>
    <strong> Correo</strong>  <input class="form-control" type="text" id="CorreoTxt" name="Correo_txt" placeholder="ingrese el correo" required>
    <strong>Contraseña</strong><input class="form-control" type="password" id="claveTxt" name=" Clave_txt" placeholder="ingrese la contraseña" required>
     <strong> tipo_usuario</strong>
                       
     <select class="form-control" id="tipo" name="tipo_txt">
          <option value="" >Selecione............................</option>
                            <?php
                                $sql_canton="select * from tb_tipo_usuario where id_tipo_usuario=2;";
                                $result_canton= mysqli_query($objConexion, $sql_canton);
                                while($cantonA=mysqli_fetch_array($result_canton)){
                                    $Nombretipo=$cantonA['descripcion'];
                                   
                                  
                                    
                                    ?>
                                    <option value="2" ><?php echo $Nombretipo; ?></option>
                                    <?php
                                }////fin del while
                            ?>
                          </select>
     
  
              
</form>
          
 <div class="form-footer">
                    <button id="ingresarBtn" name="Ingresar" class="btn btn-group-vertical btn-success" onclick="registrar()"> <i class="glyphicon glyphicon-log-in"></i>  Registrar</button>
                    <a href="login.php"> <button id="ingresarBtn" name="Ingresar" class="btn btn-group-vertical btn-info" > iniciar session</button></a>
                </div>
                <div id="mensaje"></div>
              
                
            </div>
        </div>
    </body>
</html>
<script src="jquery/jquery-3.6.0.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script>
    function registrar(){
        var usuario=$('#UsuarioTxt').val();
        var cedula=$('#CeddulaTxt').val();
         var correo=$('#CorreoTxt').val();
          var tipo=$('#tipo').val();
        var clave=$('#claveTxt').val();
        var estado=1;
        $.ajax({
            type:'POST',
            url:'ajax/grabar_usuario.php',
            data: ({
                Nombres_txt: usuario,
                Cedula_txt:cedula,
                Correo_txt:correo,
                tipo_txt:tipo,
                Clave_txt: clave,
                estado_txt:estado
            }),
            success: function(data){
                   var usuario=$('#UsuarioTxt').val('');
                    var cedula=$('#CeddulaTxt').val('');
                    var correo=$('#CorreoTxt').val('');
                    var tipo=$('#tipo').val('');
                      var clave=$('#claveTxt').val('');
                       $('#mensaje').html(data);
                
                
            }
        });
    }
</script>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

