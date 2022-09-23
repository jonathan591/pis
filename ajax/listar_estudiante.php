<?php
require_once '../conf/confconexion.php';//conexion a la base de datos
if($estadoconexion==0){
    echo "<div class='alert alert-danger' role='alert'>No se pudo conectar al servidor, favor comunicar a TICS</div>";
    exit();
}
session_start();
 $idrolUsuario=$_SESSION['idRolUsuario_S'];
$usuariocedula= $_SESSION['idcedulaUser'];
 
 if($idrolUsuario==1 || $idrolUsuario==3){
   $sql = "SELECT * FROM tb_estudiantes;";
$result = mysqli_query($objConexion, $sql);  
 }elseif ($idrolUsuario==2) {
  $sql = "SELECT * FROM tb_estudiantes where cedula=$usuariocedula;";
$result = mysqli_query($objConexion, $sql);  
}




?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>hola</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
 
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
        <script type="text/javascript" src="datatables/datatables.min.js"></script>   
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">       

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
    <body>
<div class="row">
            <!--<div class="dataTables_scroll">-->
            
        <div class="col-lg-12">
                    <div class="table-responsive">   
        <table id="tablaListar" class="table table-striped table-bordered dataTable" style="width:100%" cellspacing="0" role="grid" aria-describedby="tablaListar_info">
        <thead>
            <tr >
               
                <th >Nombres Apellidos</th>
                <th>Cedula</th>
                 <th>N.Celular</th>
                <th>Correo</th>
                <th>Carrera</th>
                 <th> Periodo </th>
                  <th>Paralelo</th>
                   <th>Jornada</th>
                    <th>Direccion</th>
 <th>fecha</th>
                     <th>Lider</th>
                    
                      <th>Estado</th>
                       <th>Opciones</th>
                
                <!--<th>Salary</th>-->
            </tr>
        </thead>
        
        
        
        
         <tbody>
					<?php while($fila = $result->fetch_assoc()) { 
                                            
                                                if($fila['lider_grupo']=='si'){
                                                $liders="SI";
                                                    $clas = " btn btn-info";
                                            }elseif ($fila['lider_grupo']=='no') {
                                                     $liders="NO";
                                                   $clas = " btn btn-danger";  
                                                    } 
                                        
                                             if($fila['estado'] == '1'){
                                                 $estado = "Activo";
                                                    $class = " btn btn-success";
                                            }elseif ($fila['estado'] == '0') {
        
    
                                                    $estado = "Inactivo";
                                                      $class = " btn btn-warning";    
                                                    } else {
                                                        $estado = "Finalizo";
                                                      $class = "btn btn-info";
                                                    }
                     
                                        
                                            
                                            ?>
                                                       
             <tr >
							
							<td><?php echo $fila['nombres_apellidos']; ?></td>
							
                                                        <td><?php echo $fila['cedula']; ?></td>
                                                        <td><?php echo $fila['telefono']; ?></td>
                                                        <td><?php echo $fila['correo']; ?></td>
                                                        <?php
                                                              $idcarreras=$fila['id_carreras'];
                                                             $sqlCarreras="select * from tb_carreras where id_carreras=$idcarreras;";
                                                                $resultCarreras= mysqli_query($objConexion, $sqlCarreras);
                                                                    $CarrerasArray= mysqli_fetch_array($resultCarreras);
                                                                    $DescripcionCarreras=$CarrerasArray['descripcion'];
                                                                         ?>
                                                                    <td><?php echo $DescripcionCarreras?></td>
                                                        
                                                         <?php
                                                              $idcursos=$fila['id_cursos'];
                                                             $sqlCursos="select * from tb_cursos where id_cursos=$idcursos;";
                                                                $resultCursos= mysqli_query($objConexion, $sqlCursos);
                                                                    $CursosArray= mysqli_fetch_array($resultCursos);
                                                                    $DescripcionCursos=$CursosArray['descripcion'];
                                                                         ?>
                                                                    <td><?php echo $DescripcionCursos?></td>
                                                                    
                                                         <?php
                                                              $idparalelos=$fila['id_paralelos'];
                                                             $sqlParalelos="select * from tb_paralelos where id_paralelos=$idparalelos;";
                                                                $resultParalelos= mysqli_query($objConexion, $sqlParalelos);
                                                                    $ParalelosArray= mysqli_fetch_array($resultParalelos);
                                                                    $DescripcionParalelos=$ParalelosArray['descripcion'];
                                                                         ?>
                                                                    <td><?php echo $DescripcionParalelos?></td> 
                                                                    
                                                           <?php
                                                              $idjornadas=$fila['id_jornadas'];
                                                             $sqlJornadas="select * from tb_jornadas where id_jornadas=$idjornadas;";
                                                                $resultJornadas= mysqli_query($objConexion, $sqlJornadas);
                                                                    $JornadasArray= mysqli_fetch_array($resultJornadas);
                                                                    $DescripcionJornadas=$JornadasArray['descripcion'];
                                                                         ?>
                                                                    <td><?php echo $DescripcionJornadas?></td>          
                                                                    
                                                         <td><?php echo $fila['direccion']; ?></td>
                                                       <td><?php echo $fila['fecha_registro']; ?></td>
                                                        
                                                       <td><span class="label label-<?php echo $clas; ?>"><?php echo $liders?></span></td>
                                                                        
							<td><span class="label label-<?php echo $class; ?>"><?php echo $estado?></span></td>
							<td>
                                                        <?php 
                                                        if($idrolUsuario==1||$idrolUsuario==2){
                                                            
                                                       
                                                        ?>
                                                         <button  class='btn btn-info' title='Editar Estudiante' onclick="editarEstudiante(<?php echo $fila['id_estudiantes']?>)"><i class="bi bi-pencil-square"></i></button>
                                                            <?php 
                                                           }
                                                           if($idrolUsuario==1){
                                                               
                                                          
                                                            ?>
                                                            <button  class='btn btn-danger' title='Eliminar Estudiante' onclick="eliminarEstudiante(<?php echo $fila['id_estudiantes']?>)"><i class="bi bi-trash3"></i></button>
                                                       <?php  }?>
                                                             
                                                        </td>
							<!--<td> </td>-->
						</tr>
					<?php } ?>
				</tbody>
                                <tfoot>
            <tr>
              
                <th>Nombres Apellidos</th>
                <th>Cedula</th>
                 <th>N.Celular</th>
                <th>Correo</th>
                <th>Carrera</th>
                 <th> Periodo </th>
                  <th>Paralelo</th>
                   <th>Jornada</th>
                    <th>Direccion</th>
                <th>fecha</th>
                    <th>Lider</th>
                    
                      <th>Estado</th>
                       <th>Opciones</th>
<!--                <th>Salary</th>-->
            </tr>
        </tfoot>
        
    </table>
                     </div>
        
        </div>
            <!--</div>-->
            </div>
<!--             </div>
             </div>-->
    </body>
</html>


