<?php
//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../conf/confconexion.php");//Contiene funcion que conecta a la base de datos

$id=$_POST['id_p'];
if($id==0){
    $titulo="Nuevo lugar asignacion ";
     $color='#63F1B9';
}
if($id>0){
     $color='#63EBF1';
    $titulo="Editar lugar asignacion";
    $sql="select * from tb_lugar_asignacion  where id_lugar_asignacion=$id";
    $result= mysqli_query($objConexion, $sql);
    if($result!=null){
        if(mysqli_num_rows($result)>0){
            $usuarioA= mysqli_fetch_array($result);
            $descri=$usuarioA['descripcion'];
            
             
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
           url:'ajax/grabar_lugar_asignacion.php',
           data:$(this).serialize(),
           success: function (data){
               $("#resultados_usuario").html(data);
               listar('ajax/listar_lugar_asignacion.php');
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
                    <div class="col-lg-12">
                    <div class="form-group">
                        <label for="descripcion" class="col-form-label">Descripcion</label>
                        
                         <input id="Nombres" name="descripcion_txt"class="form-control"  value="<?php echo $descri; ?>" required/>
                     
                    </div>
                    </div>
                    
                   
                 
                   
                      
                        <div class="col-lg-12">
                    <div class="form-group">
                        <label for="estado" class="col-control-label">Estado</label>
                        
                         <select class="form-control" id="estado" name="Estado_txt" required>
                             <option value="1" <?php echo $seleccionaA; ?>>Activo</option>
                             <option value="0" <?php echo $seleccionaI; ?>>Inactivo</option>
                            
                          </select>
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


