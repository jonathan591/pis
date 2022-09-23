<html>
    <head>
        <title>Asignacion</title>
         <link rel="icon" href="img/corea.png">
        <?php
//         include 'navg.php';
         include 'cargandop.php';
            include 'header.php';
            session_start();
         $idrolUsuario=  $_SESSION['idRolUsuario_S'];
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
                            <h5 class="breadcrumb-item active">Gestion asignacion</h5>
                        </ol>
            <div class="panel panel-default " >
                <div class="panel-heading">
                    <?php 
                    if($idrolUsuario==1){
                        
                   
                    ?>
                      <div class="btn-group pull-right">
                                <button type='button' class="btn btn-danger" data-toggle="modal" onclick="ImprimirAsignacion_genral();" ><i class="bi bi-file-earmark-pdf-fill"></i> repor_general</button>
                            </div>
                  
                  <div class="btn-group pull-right">
                                <button type='button' class="btn btn-danger" data-toggle="modal" onclick="ImprimirAsignacion();" ><i class="bi bi-file-earmark-pdf-fill"></i> repor_carrera</button>
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
                                <button type='button' class="btn btn-success" data-toggle="modal" onclick="ReporteExcel();" ><i class="bi bi-file-earmark-spreadsheet-fill"></i> Excel</button>
                            </div>
                  
                  
                    <div class="btn-group pull-left">
                        
                      <button type='button' class="btn btn-info" data-toggle="modal" onclick="NuevoAsignacion();" style="background: #42a8e3e0"><i class="bi bi-plus-circle-fill"></i> Agregar Asignacion</button>
                  
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
    listar('ajax/listar_asignacion.php');
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
   location.href='exportarasignacion.php';
}
function NuevoAsignacion(){
    MostrarModal(0, 'modal/nuevo_asignacion.php');
}
function eliminarAsignacion(id){
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
            url:'ajax/grabar_asignacion.php',
            data:{
                id_p:id,
                mensaje:'eliminar'
            },
            success: function(data){
                $('#resultados').html(data);
                listar('ajax/listar_asignacion.php');
            }
        });
    }
})
}
function editarAsignacion(id){
    //alert(id);
    MostrarModal(id, 'modal/nuevo_asignacion.php');
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

function ImprimirAsignacion(){
    var idcarrera=$('#carreras').val();
    var parametro="Reporte_Asignacion";
    VentanaCentrada('./pdf/documentos/reporteasignacion.php?idcarrera_p='+idcarrera+'prueba_p='+parametro,'Reporte_Estudiante','','1024','768','true');
}
function ImprimirAsignacion_genral(){
//    var idcarrera=$('#carreras').val();
    var parametro="Reporte_Asignacion_General";
    VentanaCentrada('./pdf/documentos/reporteasignaciongeneral.php?prueba_p='+parametro,'Reporte_general','','1024','768','true');
}
</script>




