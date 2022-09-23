<html>
    <head>
        <title>formatos de vinculaciones</title>
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
                            <h5 class="breadcrumb-item active">link documentos </h5>
                        </ol>
            <div class="panel panel-default " >
                <div class="panel-heading">
                  
                    <center><a href="https://drive.google.com/drive/folders/1Vb2WFq1mgB5fQmVDiDiFRTbYMAKxCP81" target="_bank"><button style="background:#42cde336" class="btn btn panel-info"><font size="5" face="Arial Black" color="black">Formatos de Vinculaciones </font>
                              <BR><BR><img src="img/dosier.png" width="300" class="img-fluid"></button>
                      </a></center>

<!--                    <div class="btn-group pull-left">
                        
                      <button type='button' class="btn btn-info" data-toggle="modal" onclick="NuevoUsuario();" style="background: #42a8e3e0"><i class="bi bi-plus-circle-fill"></i> Agregar Usuario</button>
                  
                    </div>-->

                     
                    <!--<h4 ><i class='bi bi-search'></i> </h4>-->
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
