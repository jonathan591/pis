<?php

require '../conf/confconexion.php';
$id=$_POST['IdUsuario'];
$id_p=$_POST['id_p'];
$mensaje=$_POST['mensaje'];
$descropc=$_POST['descripcion_txt'];

$Estado=$_POST['Estado_txt'];



//insert
if($id==0){
    $sql="insert into tb_lugar_asignacion(descripcion,estado) values('$descropc','$Estado');";
}
if($mensaje=='eliminar'){
        $sql="delete from tb_lugar_asignacion where id_lugar_asignacion=$id_p";
    }else{
    if($id>0){
        $sql="update tb_lugar_asignacion set descripcion='$descropc',estado='$Estado' where id_lugar_asignacion=$id";
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

