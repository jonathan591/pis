<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
.midnight-blue{
	background:#85C4DF;
	padding: 4px 4px 4px;
	color:white;
	font-weight:bold;
	font-size:12px;
}
.silver{
	background:#8FDAEA;
	padding: 8px 4px 12px;
	color:white;
	font-weight:bold;
	font-size:13px;
}
.clouds{
	background:#ecf0f1;
	padding: 3px 4px 3px;
}
.border-top{
	/*border-top: solid 1px #bdc3c7;*/
        padding: 8px 4px 12px;
        border: solid 1px #080808;
	
}
.border-left{
	border-left: solid 1px #bdc3c7;
}
.border-right{
	border-right: solid 1px #bdc3c7;
}
.border-bottom{
	border-bottom: solid 1px #bdc3c7;
}
table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}


#avatar2{
width: 10px;
height: 105px;
float: left;
margin-right: 0px;
padding: 1px;
border: 5px solid #CCCCCC;
 } 


-->
</style>
<!--
<link rel="stylesheet" href="../../../css/jquery.dataTables.min.css">
<link rel="stylesheet" href="../../../css/bootstrap-theme.min.css">-->
<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
       
    <table cellspacing="0" style="width: 100%;">
        <tr>
            <td style="width: 30%; color: #444444;">
                <img style="width: 100%;" src="../../img/vinculacion.jpeg">   
            </td>
            <td style="width: 48%; color: #34495e;font-size:12px; text-align: center">
                <!--<span style="color: #34495e;font-size:14px;font-weight:bold"><?php echo "NUESTRA EMPRESA";?></span>-->
<br> Ubicacion :<?php echo "Ecuador, E48, Daule";?><br> 
                                Correo: <?php echo "itsjba.secretaria@gmail.com";?> <br>
				Teléfono: <?php echo "(04) 390-1270";?><br>
				
                
            </td>
            
             <td style="width: 22.44%; color: #444444; ">
                <img style="width: 100%;" src="../../img/logo.jpg">   
            </td>
            
        </tr>
    </table>
    <br>
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
           <tr>
           		<td style="width:100%;" class='midnight-blue'>REPORTE DE ASIGNACION SEGUN LA CARRERA </td>
           </tr>
</table>

    <br>
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 23px;">
        
    <tr>
               <td style="width: 15%;" class='silver'>Nombre Docente</td>
               <td style="width: 15%;" class='silver'>Nombre Estudiante</td>
               <td style="width: 10%;" class='silver'>Jornada</td>
               <td style="width: 10%;" class='silver'>Carrera</td>
               <td style="width: 15%;" class='silver'>temas vinculacion</td>
                <td style="width: 15%;" class='silver'>lugar Asignacion</td>
                 <td style="width: 10%;" class='silver'>Fecha Asignacion</td>
                  <td style="width: 10%;" class='silver'>Fecha Terminacion</td>
           </tr>    
</table>
    
    
     <?php 
     $nums=1;
    $sql="SELECT tb_docentes.nombre_apellidos ,tb_estudiantes.nombres_apellidos as  estudiante,tb_jornada2.descripcion as jornada,tb_carreras.descripcion as carrera,
tb_lugar_asignacion.descripcion as lugar_asignacion,tb_asignacion.inicio_normal,tb_temas.descripcion as temas,tb_asignacion.final_normal
FROM tb_lugar_asignacion,tb_temas,tb_docentes,tb_asignacion,tb_estudiantes,tb_jornada2,tb_carreras where tb_asignacion.id_docentes = tb_docentes.id_docentes
and tb_asignacion.id_temas=tb_temas.id_temas
and tb_asignacion.id_estudiantes= tb_estudiantes.id_estudiantes and tb_asignacion.id_jornada2= tb_jornada2.id_jornada2 and tb_asignacion.id_lugar_asignacion = tb_lugar_asignacion.id_lugar_asignacion
and tb_asignacion.id_carreras = tb_carreras.id_carreras and tb_asignacion.estado=1 and tb_carreras.id_carreras='$idCarrera';";
        $result= mysqli_query($objConexion, $sql);
        while($sqlArray= mysqli_fetch_array($result)){
            
            $NombrePersona=$sqlArray['nombre_apellidos'];
            $docente3=$sqlArray['estudiante'];
            $jornadae=$sqlArray['jornada'];
            $care=$sqlArray['carrera'];
            $temas=$sqlArray['temas'];
            $asis=$sqlArray['lugar_asignacion'];
              $fecho_final=$sqlArray['final_normal'];
            $fecha=$sqlArray['inicio_normal'];
            
            if ($$nums%2==0){
		$clase="border-top";
	} else {
		$clase="silver";
	}
        ?>
    <!--<br>-->
<table cellspacing="0"style="width: 100%; text-align: left; font-size: 13px;">
     
    <tr>
        <td style="width: 15%; " class='<?php echo $clase;?>'><?php echo $NombrePersona; ?></td>
               <td style="width: 15%;" class='<?php echo $clase;?>'><?php echo $docente3; ?></td>
               <td style="width: 10%;" class='<?php echo $clase;?>'><?php echo $jornadae; ?></td>
               <td style="width: 10%;" class='<?php echo $clase;?>'><?php echo $care; ?></td>
               <td style="width: 15%;" class='<?php echo $clase;?>'><?php echo $temas; ?></td>
               <td style="width: 15%;" class='<?php echo $clase;?>'><?php echo $asis; ?></td>
               <td style="width: 10%;" class='<?php echo $clase;?>'><?php echo $fecha; ?></td>
                 <td style="width: 10%;" class='<?php echo $clase;?>'><?php echo $fecho_final; ?></td>
           </tr>
        <?php  $nums++; ?>  
</table>
    <?php
    }
    ?>
    <br>
    <table style="width:100%; margin-top: 100px">
        <tr>
<td style="width: 48%; color: #34495e;font-size:12px; text-align: center">
                <span style="color: #34495e;font-size:14px;font-weight:bold"><?php echo "F...................................................";?></span>
                
                 <br>
<!--<br><?php echo "POR ALGÚN LADO";?><br>--> 
				 <?php echo "GESTOR DE VINCULACIONES";?><br>
				
                
            </td>
            <td style="width: 48%; color: #34495e;font-size:12px; text-align: center; ">
                <span style="color: #34495e;font-size:14px;font-weight:bold"><?php echo "F...................................................";?></span>
<!--				<br><?php echo "POR ALGÚN LADO";?><br> -->
                 
                  <br>
				 <?php echo "COORDINADORA DE  VINCULACIONES";?><br>
				
                
            </td>
        </tr>
         
    </table>
    <!--<br>-->
 </page>
<page_footer>
        <table cellspacing="0" class="page_footer" style="width: 100%;">          
           <tr>
                <td style="width: 10%; text-align: left">
                     <?php 
                    echo $fechas= date('y-m-d H:i:s') ;
                    ?>
                </td>
           
                <td style="width: 90%; text-align: right">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                    <?php echo "<br> ";?>&copy;<?php echo " SYS_VCS "; echo  $anio=date('Y'); ?>
                </td>
                
            </tr>
            
        </table>
 </page_footer>

