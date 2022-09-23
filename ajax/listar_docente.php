<?php
require_once '../conf/confconexion.php';//conexion a la base de datos
if($estadoconexion==0){
    echo "<div class='alert alert-danger' role='alert'>No se pudo conectar al servidor, favor comunicar a TICS</div>";
    exit();
}
$sql = "SELECT * FROM tb_docentes;";
$result = mysqli_query($objConexion, $sql);
session_start();
 $idrolUsuario=$_SESSION['idRolUsuario_S'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>hola</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
   <!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
<!--		<link rel="stylesheet" href="css/jquery.dataTables.min.css">
                <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">-->
                 <!--datables CSS básico-->
                     <!--<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">-->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
        <script type="text/javascript" src="datatables/datatables.min.js"></script>   
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">       
<!--                <script src="js/jquery-3.6.0.min.js" ></script>
		<script src="js/bootstrap.min.js" ></script>-->
	<!--<script src="js/jquery.dataTables.min.js" ></script>-->
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
   
                <div class="col-lg-12">
                    <div class="table-responsive">   
        <table id="tablaListar" class="table table-striped table-bordered dataTable" style="width:100%" cellspacing="0" role="grid" aria-describedby="tablaListar_info">       
        

        <thead>
            <tr>
                 <th>id</th>
                <th>Nombre Apellidos</th>
                <th>N.Celular</th>
               
                <th>Correo</th>
<!--                <th>carrera</th>
                 <th>curso</th>
                  <th>paralelo</th>
                   <th>jornada</th>
                    <th>direccion</th>-->
                     <th>Fecha_registro</th>
                      <th>Estado</th>
                       <th>Opc</th>
                
                <!--<th>Salary</th>-->
            </tr>
        </thead>
        
        
        <tfoot>
            <tr>
                  <th>id</th>
                  <th>Nombre Apellidos</th>
                <th>N.Celular</th>
                 <!--<th>telefono</th>-->
                <th>Correo</th>
<!--                <th>carrera</th>
                 <th>curso</th>
                  <th>paralelo</th>
                   <th>jornada</th>
                    <th>direccion</th>-->
                     <th>Fecha_registro</th>
                      <th>Estado</th>
                       <th>Opc</th>
                
                <!--<th>Salary</th>-->
            </tr>
        </tfoot>
        
         <tbody>
					<?php while($fila = $result->fetch_assoc()) { 
                                            
                                             if($fila['estado'] == '1'){
                                                 $estado = "Activo";
                                                    $class = " btn btn-success";
                                            }elseif ($fila['estado'] == '0') {
        
    
                                                    $estado = "Inactivo";
                                                      $class = " btn btn-warning";    
                                                    } else {
                                                        $estado = "Finalizar";
                                                      $class = " btn btn-info";
                                                    }
                     
                                            
                                            
                                            ?>
                                                       
						<tr>
							<td><?php echo $fila['id_docentes']; ?></td>
							<td><?php echo $fila['nombre_apellidos']; ?></td>
							
                                                        <td><?php echo $fila['celular']; ?></td>
                                                        <!--<td><?php echo $fila['telefono']; ?></td>-->
                                                        <td><?php echo $fila['correo']; ?></td>
                                                      
                                                        
                                                        <td><?php echo $fila['fecha_registro']; ?></td>
                                                        
                                                       
							<td><span class="label label-<?php echo $class; ?>"><?php echo $estado?></span></td>
                                                        <td> <button
                                                                class='btn btn-info' title='Editar Estudiante' onclick="editarDocente(<?php echo $fila['id_docentes']?>)"><i class="bi bi-pencil-square"></i></button>
                                                            <?php 
//                                                            if($idrolUsuario==1){
                                                            ?>
                                                            <button  class='btn btn-danger' title='Eliminar Estudiante' onclick="eliminarDocente(<?php echo $fila['id_docentes']?>)"><i class="bi bi-trash3"></i></button>
                                                       
                                                            <?php // }?>             
                                                        </td>
							<!--<td> </td>-->
						</tr>
					<?php } ?>
				</tbody>
        
    </table>
         </div>
                </div>
        </div>
        </
        
    </body>
</html>




