<?php
//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../conf/confconexion.php");//Contiene funcion que conecta a la base de datos
session_start();
$idrolUsuario=$_SESSION['idRolUsuario_S'];
$id=$_POST['id_p'];
if($id==0){
    $titulo="Nuevo Estudiante";
    $color='#63F1B9';
}
if($id>0){
     $color='#63EBF1';
    $titulo="Editar Estudiante";
    $sql="select * from tb_estudiantes where id_estudiantes=$id";
    $result= mysqli_query($objConexion, $sql);
    if($result!=null){
        if(mysqli_num_rows($result)>0){
            $usuarioA= mysqli_fetch_array($result);
            $NombresApellidos=$usuarioA['nombres_apellidos'];
             $Cedula=$usuarioA['cedula'];
             $Telefono=$usuarioA['telefono'];
             $Correo=$usuarioA['correo'];
             $direccion=$usuarioA['direccion'];
             
             $idCarrerasEditar=$usuarioA['id_carreras'];
              $idCursosEditar=$usuarioA['id_cursos'];
              $idParalelosEditar=$usuarioA['id_paralelos'];
              $idJornadasEditar=$usuarioA['id_jornadas'];
            $Estado=$usuarioA['estado'];
            $lider=$usuarioA['lider_grupo'];
            if($lider=='si'){
                $seleccionaliderA="selected";
            }elseif ($lider=='no') {
                 $seleccionaliderN="selected";
            }
            
            if($Estado=='1'){
                $seleccionaA="selected";
//                $seleccionaI="";
            }
              elseif($Estado=='0'){
                $seleccionaI="selected";
//                $seleccionaA="";
            }else{
                  $seleccionaF="selected";
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
           url:'ajax/grabar_estudiante.php',
           data:$(this).serialize(),
           success: function (data){
               $("#resultados_usuario").html(data);
               listar('ajax/listar_estudiante.php');
           }
       }); 
       return false;
    });
});

</script>
<html>
<div class="modal fade  bd-example-modal-lg" id="MyModal" tabindex="" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:<?php echo$color ?>;">
                <h5 class="modal-title" id="myModalLabel" style="color:#fff"><i class="bi bi-pencil-square"></i> <?php echo $titulo; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                
            </div>
           <div class="modal-body">
                <form class="" method="post" id="guardar_estudiante" name="guardar_estudiante">
                    <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                        <strong></strong> <label for="Nombres_Apellidos" class="col-control-label">Nombres y Apellidos</label>
                       
                            <input id="Nombres" name="Nombres_Apellidos_txt" class="form-control" value="<?php echo $NombresApellidos; ?>" placeholder="ingrese los nombre y apellidos"required/>
                        </div>
                    </div>
                        <div class="col-lg-6">

                     <div class="form-group">
                        <label for="Cedula" class="col-control-label">Cedula</label>
                        
                            <input id="Nombres" name="Cedula_txt" class="form-control" value="<?php echo $Cedula; ?>" placeholder="ingrese la cedula " required/>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                     <div class="form-group">
                        <label for="Telefono" class="col-control-label">N.Celular</label>
                        
                            <input id="Nombres" name="Telefono_txt" class="form-control" value="<?php echo $Telefono; ?>" placeholder="ingrese el numero celular" required/>
                        </div>
                    </div>
                        <div class="col-lg-6">
                     <div class="form-group">
                        <label for="Correo" class="col-control-label"> Correo</label>
                        
                            <input id="" name="Correo_txt" class="form-control" value="<?php echo $Correo; ?>" placeholder="ingrese el correo"required/>
                        </div>
                    </div>
                           </div>
                    <div class="row">
                        <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Carreras" class="col-control-label">Carrera</label>
                       
                         <select class="form-control" id="carreras" name="Carreras_txt" required>
                             <option value="0">Seleccione.................................</option>
                            <?php
                                $sql_carreras="select * from tb_carreras;";
                                $result_carreras= mysqli_query($objConexion, $sql_carreras);
                                while($carrerasA=mysqli_fetch_array($result_carreras)){
                                    $DescripcionCarreras=$carrerasA['descripcion'];
                                    $idCarreras=$carrerasA['id_carreras'];
                                    $seleccionaCarreras='';
                                    if($idCarreras==$idCarrerasEditar){
                                        $seleccionaCarreras='selected';
                                    }
                                    ?>
                                    <option value="<?php echo $idCarreras; ?>" <?php echo $seleccionaCarreras; ?>><?php echo $DescripcionCarreras; ?></option>
                                    <?php
                                }////fin del while
                            ?>
                          </select>
                        </div>
                    </div>
<div class="col-lg-6">
                            <div class="form-group">
                        <label for="Cursos" class="col-control-label">Periodo</label>
                       
                         <select class="form-control" id="cursos" name="Cursos_txt" required>
                             <option value="0">Seleccione.................................</option>
                            <?php
                                $sql_cursos="select * from tb_cursos;";
                                $result_cursos= mysqli_query($objConexion, $sql_cursos);
                                while($cursosA=mysqli_fetch_array($result_cursos)){
                                    $DescripcionCursos=$cursosA['descripcion'];
                                    $idCursos=$cursosA['id_cursos'];
                                    $seleccionaCursos='';
                                    if($idCursos==$idCursosEditar){
                                        $seleccionaCursos='selected';
                                    }
                                    ?>
                                    <option value="<?php echo $idCursos; ?>" <?php echo $seleccionaCursos; ?>><?php echo $DescripcionCursos; ?></option>
                                    <?php
                                }////fin del while
                            ?>
                          </select>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                        <label for="Paralelos" class="col-control-label">Paralelo</label>
                       
                         <select class="form-control" id="paralelos" name="Paralelos_txt" required>
                             <option value="0">Seleccione.................................</option>
                            <?php
                                $sql_paralelos="select * from tb_paralelos;";
                                $result_paralelos= mysqli_query($objConexion, $sql_paralelos);
                                while($paralelosA=mysqli_fetch_array($result_paralelos)){
                                    $DescripcionParalelos=$paralelosA['descripcion'];
                                    $idParalelos=$paralelosA['id_paralelos'];
                                    $seleccionaParalelos='';
                                    if($idParalelos==$idParalelosEditar){
                                        $seleccionaParalelos='selected';
                                    }
                                    ?>
                                    <option value="<?php echo $idParalelos; ?>" <?php echo $seleccionaParalelos; ?>><?php echo $DescripcionParalelos; ?></option>
                                    <?php
                                }////fin del while
                           ?>
                          </select>
                        </div>
                    </div>
<div class="col-lg-6">
                            <div class="form-group">
                        <label for="Jornadas" class="col-control-label">Jornada</label>
                       
                         <select class="form-control" id="jornadas" name="Jornadas_txt" required>
                             <option value="0">Seleccione.................................</option>
                            <?php
                                $sql_jornadas="select * from tb_jornadas;";
                                $result_jornadas= mysqli_query($objConexion, $sql_jornadas);
                                while($jornadasA=mysqli_fetch_array($result_jornadas)){
                                    $DescripcionJornadas=$jornadasA['descripcion'];
                                    $idJornadas=$jornadasA['id_jornadas'];
                                    $seleccionaJornadas='';
                                    if($idJornadas==$idJornadasEditar){
                                        $seleccionaJornadas='selected';
                                    }
                                    ?>
                                    <option value="<?php echo $idJornadas; ?>" <?php echo $seleccionaJornadas; ?>><?php echo $DescripcionJornadas; ?></option>
                                    <?php
                                }////fin del while
                            ?>
                          </select>
                        </div>
                            </div>
                 
                    </div>
                    <div class="row">
                         <div class="col-lg-6">
                     <div class="form-group">
                        <label for="Correo" class="col-control-label"> Direccion</label>
                       
                        <input id="Nombres" name="Direccion_txt" class="form-control" value="<?php echo $direccion; ?>"placeholder="ingrese la direccion " required>
                        </div>
                    </div>
                       
                         <div class="col-lg-6">
                     <div class="form-group">
                        <label for="lider" class="col-control-label"> Lider_Grupo</label>
                       
                       
                        <select class="form-control" id="lider" name="lider_txt" required>
                            <option value="">Seleccione.........................</option>
                            <option value="si" <?php echo  $seleccionaliderA; ?>>SI</option>
                             <option value="no" <?php echo  $seleccionaliderN; ?>>NO</option>
                            
                              
                        </select>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label for="estado" class="col-control-label">Estado</label>
                        
                         <select class="form-control" id="estado" name="Estado_txt" required>
                             <?php if ($idrolUsuario==1) {?>
                             <option value="1" <?php echo $seleccionaA; ?>>Activo</option>
                             <option value="0" <?php echo $seleccionaI; ?>>Inactivo</option>
                             <option value="2" <?php echo $seleccionaF; ?>>Finalizo</option>
                              
                             <?php }?>
                                <?php if ($idrolUsuario==2 || $idrolUsuario==3) {?>
                             
                              <option value="0" <?php echo $seleccionaI; ?>>Inactivo</option>
                             <?php }?>
                            
                             
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