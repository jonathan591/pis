  
<?php 
session_start();
$idrolUsuario=  $_SESSION['idRolUsuario_S'];

?>

<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="inicio.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard</a
                            >
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <?php 
                            if($idrolUsuario==1){
                                
                           
                            ?>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="bi bi-file-person"></i></div>
                                Usuarios
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="usuario.php"><i class="bi bi-person-plus"></i>Gestion Usuario</a></nav>
                            </div>
                             <?php 
                              }
                              if($idrolUsuario==1 || $idrolUsuario==2 || $idrolUsuario==3){
                                  
                             
                             ?>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"
                                ><div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Estudiantes
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                             <div class="collapse" id="collapsePages" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                 <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="estudiantes.php"><i class="fas fa-book-open"></i> Gestion Estudiante</a></nav>
                            </div>
                            <?php 
                             }
                                if($idrolUsuario==1 ){
                            ?>
                             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="bi bi-person-rolodex"></i></div>
                                docentes
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="docente.php"><i class="bi bi-person-plus-fill"></i> Gestion docentes</a></nav>
                            </div>
                             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#lugarasigancion" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="bi bi-collection"></i></div>
                                lugar asignacion
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="lugarasigancion" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="lugar_asisgnacion.php"><i class="bi bi-collection"></i> Gestion Lugar Asignacion</a></nav>
                            </div>
                            <?php 
                                }
                            ?>
                             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#asigancion" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="bi bi-collection"></i></div>
                                Asignacion
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="asigancion" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="asignacion.php"><i class="bi bi-collection"></i> Gestion Asignacion</a></nav>
                            </div>
                             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#subir" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="bi bi-collection"></i></div>
                               subir Archivo
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="subir" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <?php
                                if($idrolUsuario==1 || $idrolUsuario==2 ){
                                    
                                
                                ?>
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="subir_archivos_estudiante.php"><i class="bi bi-collection"></i> Archivo estudiante</a></nav>
                                <?php
                                }
                                 if($idrolUsuario==1 || $idrolUsuario==3 ){
                                ?>
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="archivos_docente.php"><i class="bi bi-collection"></i> Archivo docente</a></nav>
                                <?php
                                 }
                                ?>
                            </div>
                            <div class="sb-sidenav-menu-heading">Temas & Documentos</div>
                            <a class="nav-link" href="formatos_vinculacion.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                link documentos</a
                            ><a class="nav-link" href="temas.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Temas Vinculaciones </a
                            >
                        </div>
                    </div>
<!--                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>-->
                </nav>
