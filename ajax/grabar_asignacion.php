<?php

require '../conf/confconexion.php';
//require '../functions/funciones.php';

$id=$_POST['IdUsuario'];
$id_p=$_POST['id_p'];
$mensaje=$_POST['mensaje'];
$NombresApellidos=$_POST['Nombres_Estudiantes_txt'];
$docenteq=$_POST['Docente_txt'];
$idjornada=$_POST['Jornadas_txt'];

$Carreras=$_POST['Carreras_txt'];

$Direccion=$_POST['Direccion_txt'];
$temmas=$_POST['Temas_txt'];
$Fecha_registro=$_POST['fecha_txt'];
$fecha_final2=$_POST['fecha_final_txt'];

$Estado=$_POST['Estado_txt'];




//insert
if($id==0){
    $sql="insert into tb_asignacion(id_docentes,id_estudiantes,id_jornada2,id_carreras,id_lugar_asignacion,id_temas,inicio_normal,final_normal,estado) values('$docenteq','$NombresApellidos','$idjornada','$Carreras','$Direccion','$temmas','$Fecha_registro','$fecha_final2','$Estado');";
}
if($mensaje=='eliminar'){
        $sql="delete from tb_asignacion where id_asignacion=$id_p";
    }else{
    if($id>0){
        $sql="update tb_asignacion set id_docentes='$docenteq', id_estudiantes='$NombresApellidos',id_jornada2='$idjornada', id_carreras='$Carreras',id_lugar_asignacion='$Direccion',id_temas='$temmas',inicio_normal='$Fecha_registro',final_normal='$fecha_final2',estado='$Estado' where id_asignacion=$id";
    }
}
//ejecuto
$result=mysqli_query($objConexion,$sql);

if($result){
    if($mensaje=='eliminar'){
       ?> 
<script>
Swal.fire(
      'Eliminado!',
      'eliminado existosamente .',
      'success'
    )
</script>
<?php
//        echo "<div class='alert alert-success' rol='alert'>Registro Eliminado Correctamente</div>";
    }else{
        
       ?>
<script>
Swal.fire(
      'Registrado!',
      'Registro Guardado Correctamente.',
      'success'
    )
</script>
<?php
//        echo "<div class='alert alert-success' rol='alert'>Registro Guardado Correctamente</div>";
    }
}
else{
    echo "<div class='alert alert-danger' rol='alert'>Ocurrió un problema al momento de guardar. Favor intentar de nuevo</div>". mysqli_error();
}
