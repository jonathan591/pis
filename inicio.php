<html>
    <head>
        <?php 
include 'header.php';

        require 'cargandop.php';
        
$idrolUsuario=  $_SESSION['idRolUsuario_S'];

      
   
//validación de que la sesión esté activa
$alert = '';
   session_start();
if(!empty($_SESSION['activa'])){
        header('location: header.php');
}

            
            
       ?>
           <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
      
    </head>
    <body>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
               
               <?php 
                      include 'menu.php';
              ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <?php 
                            if($idrolUsuario==1){
                                
                           
                            
                            ?>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body"><i class="bi bi-people"></i> Usuarios</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="usuario.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                            <?php 
                                   if($idrolUsuario==3 || $idrolUsuario==1){
                            ?>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body"><i class="bi bi-person-lines-fill"></i> Docente</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="docente.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                   }
                             
                             if($idrolUsuario==1|| $idrolUsuario==2|| $idrolUsuario==3 ){
                                 
                             
                             ?>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body"> <a class="bi bi-person-rolodex"></a> Estudiantes</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="estudiantes.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body"><i class="bi bi-collection"></i> Asignacion</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="asignacion.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <?php 
                            }
                            ?>
                        </div>
                       
                      
                    </div>
                </main>
                
                            <?php 
                        
include 'fooder.php';
?> 
                
            </div>
        </div>
        
    </body>
    
    
</html>





