<?php
//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../conf/confconexion.php");//Contiene funcion que conecta a la base de datos

$id=$_POST['id_p'];
if($id==0){
    $titulo="Nuevo Usuario";
    $color='#63F1B9';
}
if($id>0){
    $titulo="Editar Usuario";
     $color='#63EBF1';
    $sql="select * from tb_usuario where id_usuario=$id";
    $result= mysqli_query($objConexion, $sql);
    if($result!=null){
        if(mysqli_num_rows($result)>0){
            $usuarioA= mysqli_fetch_array($result);
            $NombresP=$usuarioA['nombre'];
            $correo=$usuarioA['correo'];
            $clave=$usuarioA['clave'];
            $cdula=$usuarioA['cedula'];
            
             $idCantonEditar=$usuarioA['id_tipo_usuario'];
            $estadoPaciente=$usuarioA['estado'];
            if($estadoPaciente=='1'){
                $seleccionaA="selected";
//                $seleccionaI="";
            }
            elseif($estadoPaciente=='0'){
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
     $('#guardar_usuario').bind("submit", function (){
        //alert(123);
       $.ajax({
           type: $(this).attr("method"),
           url:'ajax/grabar_usuario.php',
           data:$(this).serialize(),
           success: function (data){
               $("#resultados_usuario").html(data);
               listar('ajax/listar_usuario.php');
           }
       }); 
       return false;
    });
});

</script>
<html>
<div class="modal fade" id="MyModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:<?php echo$color ?>;">
               
            <h4 class="modal-title" id="myModalLabel" style="color:#fff"><i class='bi bi-pencil-square' ></i> <?php echo $titulo; ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            
           <div class="modal-body">
                <form class="form-horizontal" method="post" id="guardar_usuario" name="guardar_usuario">
                    <div class="form-group">
                        <label for="NombresApellidos" class="col-control-label">Nombre</label>
        
                        <input id="Nombres"   name="Nombres_txt" class="form-control" value="<?php echo $NombresP; ?>" placeholder="ingrese el nombre" required/>
                            
            </div>
                    <div class="form-group">
                        <label for="Cedula" class="col-control-label">Usuario</label>
                     
                            <input id="CedulaId" name="Cedula_txt" class="form-control" value="<?php echo $cdula; ?>"  placeholder="ingrese la cedula" required/>
                      
                    </div>
                    <div class="form-group">
                        <label for="Correo" class="col-control-label">Correo</label>
                     
                            <input id="CedulaId" name="Correo_txt" class="form-control" value="<?php echo $correo; ?>" placeholder="ingrese su correo" required/>
                      
                    </div>
                    
                    <?php 
                    if($id==0){
                        
                   
                    
                    ?>
                     <div class="form-group">
                        <label for="clave" class="col-control-label">clave</label>
                        
                            <input id="EdadId" type="password" name="Clave_txt" class="form-control" value="<?php echo $clave; ?>" placeholder="ingrese la clave" required/>
                      
                    </div>
                  <?php   }?>
                    <div class="row">
                     <div class="col-lg-6">
                    <div class="form-group">
                       
                        <label for="Canton" class="col-control-label">Tipo Usuario</label>
                    
                         <select class="form-control" id="canton" name="tipo_txt" required>
                            <?php
                                $sql_canton="select * from tb_tipo_usuario;";
                                $result_canton= mysqli_query($objConexion, $sql_canton);
                                while($cantonA=mysqli_fetch_array($result_canton)){
                                    $NombreCanton=$cantonA['descripcion'];
                                    $idCanton=$cantonA['id_tipo_usuario'];
                                    $seleccionaCanton='';
                                    if($idCanton==$idCantonEditar){
                                        $seleccionaCanton='selected';
                                    }
                                    ?>
                                    <option value="<?php echo $idCanton; ?>" <?php echo $seleccionaCanton; ?>><?php echo $NombreCanton; ?></option>
                                    <?php
                                }////fin del while
                            ?>
                          </select>
                        </div>
                    </div>
                   
                    <div class="col-lg-6">
                    <div class="form-group">
                         
                        <label for="estado" class="col-control-label">Estado</label>
                       
                         <select class="form-control" id="estado" name="estado_txt" required>
                             <option value="1" <?php echo $seleccionaA; ?>>Activo</option>
                             <option value="0" <?php echo $seleccionaI; ?>>Inactivo</option>
                              
                          </select>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary " id="guardar_datos"><i class="bi bi-hdd-fill"></i> Guardar Datos</button>
            </div>
                     <div id="resultados_usuario"></div>
                     <input id="IdUsuario" name="IdUsuario" type="hidden">
                </form>
            </div>
            
        </div>
    </div>
</div>
</html>
