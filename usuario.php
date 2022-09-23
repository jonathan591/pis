<html>
    <head>
        <title>Usuarios</title>
         <link rel="icon" href="img/corea.png">
            <?php
//         include 'navg.php';
         include 'cargandop.php';
            include 'header.php';
           // session_start();
            //$idrolUsuario=$_SESSION['idRolUsuario_S'];
        ?>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
   
    </head>
    
    <body   >
        
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
                            <h5 class="breadcrumb-item active">Gestion Usuarios</h5>
                        </ol>
            <div class="panel panel-default " >
                <div class="panel-heading">
                  
                 
                  
                    <div class="btn-group pull-left">
                        
                      <button type='button' class="btn btn-info" data-toggle="modal" onclick="NuevoUsuario();" style="background: #42a8e3e0"><i class="bi bi-plus-circle-fill"></i> Agregar Usuario</button>
                  
                    </div>

                     
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
<!--<script type="text/javascript" src="js/VentanaCentrada.js"></script>
<script type="text/javascript" src="js/ajaxconfig.js"></script> -->
<script>
$(document).ready(function(){
    listar('ajax/listar_usuario.php');
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
function NuevoUsuario(){
    MostrarModal(0, 'modal/nuevo_usuario.php');
}
function eliminarUsuario(id){
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
            url:'ajax/grabar_usuario.php',
            data:{
                id_p:id,
                mensaje:'eliminar'
            },
            success: function(data){
                $('#resultados').html(data);
                listar('ajax/listar_usuario.php');
            }
        });
    }
})
}
function editarUsuario(id){
    //alert(id);
    MostrarModal(id, 'modal/nuevo_usuario.php');
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
function cambiarclave(id){
    //alert(id);
    MostrarModal(id, 'modal/cambiar_clave.php');
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

function ImprimirUsuario(){
//    var idCanton=$('#canton').val();
    var parametro="Hola";
    VentanaCentrada('./pdf/documentos/reporteusuario.php?prueba_p='+parametro,'Reporte_Usuario','','1024','768','true');
}
</script>


