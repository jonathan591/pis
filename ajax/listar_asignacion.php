<?php
require_once '../conf/confconexion.php';//conexion a la base de datos
if($estadoconexion==0){
    echo "<div class='alert alert-danger' role='alert'>No se pudo conectar al servidor, favor comunicar a TICS</div>";
    exit();
}


session_start();
$idrolUsuario=  $_SESSION['idRolUsuario_S'];
$usuariocedula= $_SESSION['idcedulaUser'];

    $sql = "SELECT * FROM tb_estudiantes where cedula=$usuariocedula;"; 
    $result = mysqli_query($objConexion, $sql);
    while ($rowx = $result->fetch_assoc()) {
        $id_asitencia=$rowx['id_estudiantes'];
    }


if($idrolUsuario==1 || $idrolUsuario==3){
   $sql = "SELECT * FROM tb_asignacion;";
$result = mysqli_query($objConexion, $sql);
}
if($idrolUsuario==2){
  
   $sql = "SELECT * FROM tb_asignacion where id_estudiantes=$id_asitencia;";
$result = mysqli_query($objConexion, $sql); 
}

?>
<html>
    <head>

       <meta charset="UTF-8">
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
        <div class="table-responsive">
           
        
        <table id="tablaListar" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nombres Docente</th>
               <th>Nombres estudiante</th>
                <!--<th>cedula</th>-->
                 <th>Jornada</th>
                <th>Carrera</th>
             
                    <th>Lugar Asignacion</th>
                      <th>Temas</th>
                 <th>Fecha inicio</th>
                      <th>Fecha final</th>
                      <th>Estado</th>
                       <th>Opciones</th>
                
                <!--<th>Salary</th>-->
            </tr>
        </thead>
        
        
        <tfoot>
            <tr>
              <th>Nombres Docente</th>
               <th>Nombres estudiante</th>
                <!--<th>cedula</th>-->
                 <th>Jornada</th>
                <th>Carrera</th>
             
                    <th>Lugar Asignacion</th>
                      <th>Temas</th>
                     <th>Fecha inicio</th>
                      <th>Fecha final</th>
                      <th>Estado</th>
                       <th>Opciones</th>
                <!--<th>Salary</th>-->
            </tr>
        </tfoot>
        
         <tbody>
					<?php  while ($fila = $result->fetch_assoc()) { 
                                            
                                             if($fila['estado'] == '1'){
                                                 $estado = "ACTIVO";
                                                    $class = " btn btn-success";
                                            }elseif ($fila['estado'] == '0') {
        
    
                                                    $estado = "INACTIVO";
                                                      $class = " btn btn-warning";    
                                                    } else {
                                                        $estado = "FINALIZO";
                                                      $class = "  btn btn-info";
                                                    }
                     
                                            
                                            
                                            ?>
                                         
						<tr>
                                                    <?php
                                                     $iddocente=$fila['id_docentes'];
                                                             $sqlJ="select * from tb_docentes where id_docentes=$iddocente;";
                                                                $resultJ= mysqli_query($objConexion, $sqlJ);
                                                                    $JsArray= mysqli_fetch_array($resultJ);
                                                                    $Descripcion=$JsArray['nombre_apellidos'];
                                                             
//                                                                         ?>
                                                           <td><?php echo $Descripcion?></td>
                                                    <?php
                                                              $idcarreras=$fila['id_estudiantes'];
                                                             $sqlCarreras="select * from tb_estudiantes where id_estudiantes=$idcarreras;";
                                                                $resultCarreras= mysqli_query($objConexion, $sqlCarreras);
                                                                    $CarrerasArray= mysqli_fetch_array($resultCarreras);
                                                                    $DescripcionCarreras=$CarrerasArray['nombres_apellidos'];
                                                                         ?>
                                                           <td><?php echo $DescripcionCarreras?></td>
                                                        
                                                
                                                        <!--<td><?php echo $fila['cedula']; ?></td>-->
                                                        <?php
                                                              $idjornadas=$fila['id_jornada2'];
                                                             $sqlJornadas="select * from tb_jornada2 where id_jornada2=$idjornadas;";
                                                                $resultJornadas= mysqli_query($objConexion, $sqlJornadas);
                                                                    $JornadasArray= mysqli_fetch_array($resultJornadas);
                                                                    $DescripcionJornadas=$JornadasArray['descripcion'];
                                                                         ?>
                                                                    <td><?php echo $DescripcionJornadas?></td>          
                                                            <?php
                                                              $idcarreras=$fila['id_carreras'];
                                                             $sqlCarreras="select * from tb_carreras where id_carreras=$idcarreras;";
                                                                $resultCarreras= mysqli_query($objConexion, $sqlCarreras);
                                                                    $CarrerasArray= mysqli_fetch_array($resultCarreras);
                                                                    $DescripcionCarreras=$CarrerasArray['descripcion'];
                                                                         ?>
                                                                    <td><?php echo $DescripcionCarreras?></td>
                                                                    
                                                              
                                                             
                                                         <?php
                                                              $idasigancion=$fila['id_lugar_asignacion'];
                                                             $sqlasignacion="select * from tb_lugar_asignacion where id_lugar_asignacion=$idasigancion;";
                                                                $resultasignacion= mysqli_query($objConexion, $sqlasignacion);
                                                                    $asinacionArray= mysqli_fetch_array($resultasignacion);
                                                                    $Descripcio=$asinacionArray['descripcion'];
                                                                         ?>
                                                                    <td><?php echo $Descripcio?></td>
                                                                     <?php
                                                              $idtemass=$fila['id_temas'];
                                                             $sqltemas="select * from tb_temas where id_temas=$idtemass;";
                                                                $resultemas= mysqli_query($objConexion, $sqltemas);
                                                                    $temasArray= mysqli_fetch_array($resultemas);
                                                                    $Descripciotenas=$temasArray['descripcion'];
                                                                         ?>
                                                                    <td><?php echo $Descripciotenas?></td>
                                                        
                                                        
                                                                 
                                                                    
                                                      
                                                        <td><?php echo $fila['inicio_normal']; ?></td>
                                                        <td><?php echo $fila['final_normal']; ?></td>
                                                        
                                                       
							<td><span class="label label-<?php echo $class; ?>"><?php echo $estado?></span></td>
                                                        
                                                        <td> 
                                                            <?php 
                                                            if($idrolUsuario==1){
                                                                
                                                            
                                                            ?>
                                                            <button class='btn btn-info' title='Editar Asignacion' onclick="editarAsignacion(<?php echo $fila['id_asignacion']?>)"><i class="bi bi-pencil-square"></i></button>
                                                            
                                                           
                                                            <button  class='btn btn-danger' title='Eliminar Asignacion' onclick="eliminarAsignacion(<?php echo $fila['id_asignacion']?>)"><i class="bi bi-trash3"></i></button>
                                                       
                                                            <?php }?>
                                                        </td>
							<!--<td> </td>-->
						</tr>
					 <?php } ?> 
				</tbody>
        
    </table>
                
         </div>
        
            
    </body>
</html>



