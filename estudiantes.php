<html>
    <head>
        <title>Estudiantes</title>
         <link rel="icon" href="img/corea.png">
        <?php
//         include 'navg.php';
         include 'cargandop.php';
            include 'header.php';
            session_start();
            $idrolUsuario=$_SESSION['idRolUsuario_S'];
            require_once ("./conf/confconexion.php");
        ?>
      
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
          
    </head>
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
                            <h5 class="breadcrumb-item active">Gestion estudiantes</h5>
                        </ol>
            <div class="panel panel-default " >
                <div class="panel-heading">
                  <?php 
                  if($idrolUsuario==1 || $idrolUsuario==3){
                      
                
                  ?>
                                      
                  <div class="btn-group pull-right">
                                <button type='button' class="btn btn-danger" data-toggle="modal" onclick="ImprimirEstudiante();" ><i class="bi bi-file-earmark-pdf-fill"></i> Reporte_carrera</button>
                            </div>
                    <div class="btn-group pull-right">
                        <label for="Correo" class="col-control-label"> </label>
                        <div class="col-lg-12">
                         <select class="form-control" id="carreras" name="Carreras_camd" required>
                            <?php
                                $sql_carreras="select * from tb_carreras;";
                                $result_carreras= mysqli_query($objConexion, $sql_carreras);
                                while($carrerasA=mysqli_fetch_array($result_carreras)){
                                    $DescripcionCarreras=$carrerasA['descripcion'];
                                    $idCarreras=$carrerasA['id_carreras'];
                                    $seleccionaCarreras='';
                                    if($idCarreras==$Carrera){
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
                    <div class="btn-group pull-right">
                        <label for="Correo" class="col-control-label"> </label>
                        <div class="col-lg-12">
                         <select class="form-control" id="estado" name="estado" required>
                             <option value="1">Activo</option>
                             <option value="0">Inactivo</option>
                          </select>
                        </div>
                    </div>
                    <?php 
                  }
                  if($idrolUsuario==1){
                      
                 
                    ?>
                    <div class="btn-group pull-right">
                                <button type='button' class="btn btn-danger" data-toggle="modal" onclick="ImprimirEstudiante_General();" ><i class="bi bi-file-earmark-pdf-fill"></i>Reporte_general</button>
                            </div>
                    <div class="btn-group pull-right">
                                <button type='button' class="btn btn-success" data-toggle="modal" onclick="ReporteExcel();" ><i class="bi bi-file-earmark-spreadsheet-fill"></i> Excel</button>
                            </div>
                  <?php 
                    }
                  
                   if($idrolUsuario==2 || $idrolUsuario==1){
                       
                 
                  ?>
                    
                    <div class="btn-group pull-left">
                        
                      <button type='button' class="btn btn-info" data-toggle="modal" onclick="NuevoEstudiante();" style="background: #42a8e3e0"><i class="bi bi-plus-circle-fill"></i> Registrar Estudiante</button>
                  
                    </div>
<?php 
}
?>
                     
                    <!--<h4 ><i class='bi bi-search'></i> </h4>-->
                </div>
                 <hr>
                  
                 
                <div class="panel-body  ">
                    <div id="resultados"></div><!-- Carga los datos ajax -->
                    <div id='presentarTabla'></div><!-- Carga los datos ajax -->
                </div>
            </div>
        </div>
                <br>
                 <?php
           include 'fooder.php';
        ?>
            </div>
         </div>
        
        <div id="show"></div>
    </body>
   
</html> 
<script type="text/javascript" src="js/VentanaCentrada.js"></script>
<script type="text/javascript" src="jquery/ajaxconfig.js"></script> 
<script>
$(document).ready(function(){
    listar('ajax/listar_estudiante.php');
    //prueba();
});
function listar(url){
    $.ajax({
      type: 'POST',
      url:url,
      success:function(data){
          $('#presentarTabla').html(data);
      },
   });
}
function ReporteExcel(){
   location.href='exportarExcel.php';
}
function NuevoEstudiante(){
    MostrarModal(0, 'modal/nuevo_estudiante.php');
}
function eliminarEstudiante(id){
  Swal.fire({
  title: '¿Está seguro de eliminar el registro?',
  text: "   ",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Eliminar!'
}).then((result) => {
  if (result.isConfirmed) {
        $.ajax({
            type:'POST',
            url:'ajax/grabar_estudiante.php',
            data:{
                id_p:id,
                mensaje:'eliminar'
            },
            success: function(data){
                $('#resultados').html(data);
                listar('ajax/listar_estudiante.php');
            }
        });
    }
})
}
function editarEstudiante(id){
    //alert(id);
    MostrarModal(id, 'modal/nuevo_estudiante.php');
}
function MostrarModal(id, url){
    $.ajax({
        type: 'POST',
        url: url,
        data:{
            id_p:id
        },
        success: function (data) {          
           $('#show').html(data);  
           $('#MyModal').modal();
        }
    });
}

function MostrarModal(id, url){
    $.ajax({
        type: 'POST',
        url: url,
        data:{
            id_p:id
        },
        success: function (data) {          
           $('#show').html(data);  
           $('#MyModal').modal();
        }
    });
}

function ImprimirEstudiante(){
    var idcarrera=$('#carreras').val();
    var parametro=$('#estado').val();
    VentanaCentrada('./pdf/documentos/reporteestudiante.php?id_carrera='+idcarrera+'&idestado_p='+parametro,'','','1024','768','true');
}
function ImprimirEstudiante_General(){
//    var idcarrera=$('#carreras').val();
    var parametro=$('#estado').val();
    VentanaCentrada('./pdf/documentos/reporteestudiantegeneral.php?idestado_p='+parametro,'Reporte_Estudiante','','1024','768','true');
}
</script>




