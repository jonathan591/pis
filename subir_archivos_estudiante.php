<?php
require './conf/confconexion.php';
//$conn=new PDO('mysql:host=localhost:3307; dbname=practicas', 'root', '') or die(mysql_error());
if(isset($_POST['submit'])!=""){
  $name=$_FILES['file']['name'];
  $size=$_FILES['file']['size'];
  $type=$_FILES['file']['type'];
  $temp=$_FILES['file']['tmp_name'];
  // $caption1=$_POST['caption'];
  // $link=$_POST['link'];
  $fname = date("YmdHis").'_'.$name;
  $sql="SELECT * FROM  tb_upload where nombre = '$name' ";
  $resulya= mysqli_query($objConexion,$sql);
  $chk= mysqli_num_rows($resulya);
//  $chk = $objConexion->query("SELECT * FROM  upload where name = '$name' ")->rowCount();
  if($chk){
    $i = 1;
    $c = 0;
	while($c == 0){
    	$i++;
    	$reversedParts = explode('.', strrev($name), 2);
    	$tname = (strrev($reversedParts[1]))."_".($i).'.'.(strrev($reversedParts[0]));
    // var_dump($tname);exit;
        $sql="SELECT * FROM  tb_upload where nombre = '$tname' ";
          $resula= mysqli_query($objConexion,$sql);
    $chk2= mysqli_num_rows($resula);
//    	$chk2 = $conn->query("SELECT * FROM  upload where name = '$tname' ")->rowCount();
    	if($chk2 == 0){
    		$c = 1;
    		$name = $tname;
    	}
    }
}
 $move =  move_uploaded_file($temp,"upload/".$fname);
 if($move){
      $sql="insert into tb_upload(nombre,fnombre)values('$name','$fname')";
          $query= mysqli_query($objConexion,$sql);
// 	$query=$conn->query("insert into upload(name,fname)values('$name','$fname')");
	if($query){
	header("location:subir_archivos_estudiante.php");
	}
	else{
	die(mysql_error());
	}
 }
}
?>
<html>
    <head>
        <title>Subir Archivos</title>
          <link rel="icon" href="img/corea.png">
        <?php
//         include 'navg.php';
         include 'cargandop.php';
          include 'header.php';
//            session_start();
            $idrolUsuario=$_SESSION['idRolUsuario_S'];
        ?>
       
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
         <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
        <script type="text/javascript" src="datatables/datatables.min.js"></script>  
<!--        <script src="jquery/jquery-3.6.0.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>-->
        
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">       

         <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    </head>
   <script>
   $(document).ready(function() {    
    $('#tablaListar').DataTable({
    //para cambiar el lenguaje a español
        "language": {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
			     },
			     "sProcessing":"Procesando...",
            }
    });     
});
    </script>
    <body  >
         <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
              <?php 
                      include 'menu.php';
              ?>
            </div>
            <div id="layoutSidenav_content">
        <div class="container-fluid" >
      <!--<h5 class="mt-4">Docentes</h5>-->
       <br>
                        <ol class="breadcrumb mb-4">
                            <h5 class="breadcrumb-item active">subir archivo de estudiantes </h5>
                        </ol>
            <div class="panel panel-default " >
                <div class="panel-heading">
                 
                  
                    <div class="btn-group pull-left">
                        
                     <form enctype="multipart/form-data" action="" name="form" method="post">
				Seleccione Archivo
					<input class="btn btn-light" type="file" name="file" id="file" /></td>
					<input  class="btn btn-info" type="submit"  name="submit" id="submit" value="Subir" />
			</form>
                  
                    </div>

                     
                    <!--<h4 ><i class='bi bi-search'></i> </h4>-->
                </div>
                 <hr>
                  
                 
                <div class="panel-body">
                     <div class="table-responsive">
                   <table id="tablaListar" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th width="90%" align="center">Archivos</th>
					<th align="center">Accion</th>	
				</tr>
			</thead>
			<?php
                          $sql="select * from tb_upload order by id desc";
          $query= mysqli_query($objConexion,$sql);
//			$query=$conn->query("select * from upload order by id desc");
			while($row=$query->fetch_assoc()){
				$name=$row['nombre'];
			?>
			<tr>
			
				<td>
					&nbsp;<?php echo $name ;?>
				</td>
				<td>
                                    <button class="btn btn-outline-info" title="Descargar"><a href="download.php?filename=<?php echo $name;?>&f=<?php echo $row['fnombre'] ?>"><i class="bi bi-arrow-down-circle"></i></a></button>
				</td>
			</tr>
			<?php }?>
		</table>
                     </div>
                </div>
            </div>
        </div>
                <br>
                 <?php
           include 'fooder.php';
        ?>
            </div>
         </div>
        
       
    </body>
  
</html> 
