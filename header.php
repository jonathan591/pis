<?php 
session_start();
          $idUsuario=$_SESSION['idusuario_S'];
           $idrolUsuario=$_SESSION['idRolUsuario_S'];
           if($idUsuario==''){
               //echo "Usted no ha iniciado sesión correctamente";
              header('Location: login.php');
              exit();  
            
          }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
         <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Inicio</title>
          <link rel="icon" href="img/corea.png">
        <link href="css/styles.css" rel="stylesheet" />
        <!--<link href="bootstrap/css/bootstrap.css" rel="stylesheet">-->
        <!--<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="inicio.php"> <i class="bi bi-calendar2-event"></i> Vinculaciones</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <!--<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>-->
            <!-- Navbar-->
     
<?php 
require_once './conf/confconexion.php';
//session_start();

$NombresUsuario=$_SESSION['nombreUsuario_S'];
$idsesion=session_id();
$idrol=$_SESSION['idRolUsuario_S'];
$sql="select * from tb_tipo_usuario where id_tipo_usuario=$idrol";
$result= mysqli_query($objConexion, $sql);
$arrayRol= mysqli_fetch_array($result);
$NombreRol=$arrayRol['descripcion'];
    $frcha= date('Y');
?>       
            <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i> <?php echo $NombresUsuario."-".$NombreRol ?></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
<!--                        <a class="dropdown-item" href="#">Configuración</a>
                        <div class="dropdown-divider"></div>-->
                        <a class="dropdown-item" href="login.php"><i class="bi bi-toggle2-off"></i> Salir</a>
                    </div>
                </li>
            </ul>
        </nav>
        
        <script src="jquery/jquery-3.6.0.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
            <script src="js/scripts.js"></script>
        
    </body>
</html>


