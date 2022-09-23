<?php
//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../conf/confconexion.php");//Contiene funcion que conecta a la base de datos

$id=$_POST['id_p'];
if($id==0){
    $titulo="Nuevo Docente";
     $color='#63F1B9';
}
if($id>0){
     $color='#63EBF1';
    $titulo="Editar Docente";
    $sql="select * from tb_docentes where id_docentes=$id";
    $result= mysqli_query($objConexion, $sql);
    if($result!=null){
        if(mysqli_num_rows($result)>0){
            $usuarioA= mysqli_fetch_array($result);
            $NombresApellidos=$usuarioA['nombre_apellidos'];
             $Cedula=$usuarioA['celular'];
            
             $Correo=$usuarioA['correo'];
          
             
             $fecha_re=$usuarioA['fecha_registro'];
             
            $Estado=$usuarioA['estado'];
            if($Estado=='1'){
                $seleccionaA="selected";
//                $seleccionaI="";
            }
              elseif($Estado=='0'){
                $seleccionaI="selected";
//                $seleccionaA="";
            }
        }else{
            echo "No se encontró registro con el código: ".$id;
            exit();
        }
    }else{
        echo "Ocurrió un problema al momento de ejecutar la consulta".mysqli_error_list();
        exit();
    }
}
?>
<script>
$(document).ready(function(){
    // capturar el valor del id que se recibe
    $('#IdUsuario').val(<?php echo $id; ?>);
     $('#guardar_estudiante').bind("submit", function (){
        //alert(123);
       $.ajax({
           type: $(this).attr("method"),
           url:'ajax/grabar_docente.php',
           data:$(this).serialize(),
           success: function (data){
               $("#resultados_usuario").html(data);
               listar('ajax/listar_docente.php');
           }
       }); 
       return false;
    });
});

</script>
<html>
    <head>
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    </head>
<div class="modal fade" id="MyModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header"  style="background:<?php echo$color ?>;">
                <h5 class="modal-title" id="myModalLabel" style="color:#fff"><i class="bi bi-pencil-square"></i> <?php echo $titulo; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                
            </div>
           <div class="modal-body">
                <form class="form-" method="post" id="guardar_estudiante" name="guardar_estudiante">
                    <div class="form-group">
                        <label for="Nombres_Apellidos" class="col-form-label">Nombres y Apellidos</label>
                        
                         <input id="Nombres" name="Nombres_Apellidos_txt"class="form-control"  value="<?php echo $NombresApellidos; ?>" required/>
                     
                    </div>
                     <div class="form-group">
                        <label for="Cedula" class="col-control-label"> N.Celular</label>
                      
                        <input type="number"  name="Celular_txt" class="form-control" value="<?php echo $Cedula; ?>" required/>
                        
                    </div>
                    
                     <div class="form-group">
                        <label for="Correo" class="col-control-label"> Correo</label>
                       
                            <input id="Nombres" name="Correo_txt" class="form-control" value="<?php echo $Correo; ?>" required/>
                      
                    </div>
                 
                    <div class="row">
                        <div class="col-lg-6">
                     <div class="form-group">
                        <label for="fecha" class="col-control-label"> fecha_registro</label>
                      
                            <input type="date" id="Nombres" name="fecha_txt" class="form-control" value="<?php echo $fecha_re; ?>" required/>
                        
                    </div>
                      </div>
                        <div class="col-lg-6">
                    <div class="form-group">
                        <label for="estado" class="col-control-label">Estado</label>
                        
                         <select class="form-control" id="estado" name="Estado_txt" required>
                             <option value="1" <?php echo $seleccionaA; ?>>Activo</option>
                             <option value="0" <?php echo $seleccionaI; ?>>Inactivo</option>
                           
                          </select>
                    </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="guardar_estudiante"><i class="bi bi-hdd-fill"></i> Guardar Datos</button>
            </div>
                     <div id="resultados_usuario"></div>
                     <input id="IdUsuario" name="IdUsuario" type="hidden">
                </form>
            </div>
            
        </div>
    </div>
</div>
</html>

