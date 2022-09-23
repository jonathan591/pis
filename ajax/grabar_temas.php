<?php

require '../conf/confconexion.php';
$id=$_POST['IdUsuario'];
$id_p=$_POST['id_p'];
$mensaje=$_POST['mensaje'];
$descripcionn=$_POST['Descripcion_txt'];
$idcarrera=$_POST['Carreras_txt'];


$Estado=$_POST['Estado_txt'];



//insert
if($id==0){
    $sql="insert into tb_temas(descripcion,id_carreras,estado) values('$descripcionn','$idcarrera','$Estado');";
}
if($mensaje=='eliminar'){
        $sql="delete from tb_temas where id_temas=$id_p";
    }else{
    if($id>0){
        $sql="update tb_temas set descripcion='$descripcionn',estado='$Estado' where id_temas=$id";
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
