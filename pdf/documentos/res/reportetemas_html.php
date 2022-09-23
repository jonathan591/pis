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
                <span style="color: #34495e;font-size:14px;font-weight:bold"><?php echo $prueba;?></span>
				<br> Ubicacion :<?php echo "Ecuador, E48, Daule";?><br> 
                                Correo: <?php echo "itsjba.secretaria@gmail.com";?> <br>
				Teléfono: <?php echo "(04) 390-1270";?><br>
				
                
            </td>
            
             <td style="width: 23%; color: #444444; ">
                <img style="width: 100%;" src="../../img/logo.jpg">   
            </td>
            
        </tr>
    </table>
    <br>
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
           <tr>
           		<td style="width:100%;" class='midnight-blue'>REPORTE DE TEMAS POR CARRERA</td>
           </tr>
</table>

    <br>
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 23px;">
        
    <tr>
               <td style="width: 70%;" class='silver'>Temas de Vinculacion</td>
               <td style="width: 30%;" class='silver'>Carrera</td>
              
           </tr>    
</table>
    
    
     <?php 
    
      $prueba=$_GET['idestado_p'];
     $nums=1;
    $sql="SELECT tb_temas.descripcion AS temas, tb_carreras.descripcion AS carreras 
FROM tb_carreras,tb_temas WHERE tb_temas.id_carreras = tb_carreras.id_carreras  AND tb_carreras.id_carreras='$idCarreraa' AND tb_temas.estado='$prueba' ;";
        $result= mysqli_query($objConexion, $sql);
        while($sqlArray= mysqli_fetch_array($result)){
            
            $temass=$sqlArray['temas'];
            $carreas=$sqlArray['carreras'];
            
            
            if ($$nums%2==0){
		$clase="border-top";
	} else {
		$clase="silver";
	}
        ?>
    <!--<br>-->
<table cellspacing="0"style="width: 100%; text-align: left; font-size: 11px;">
     
    <tr>
       
               <td style="width: 70%;" class='<?php echo $clase;?>'><?php echo $temass; ?></td>
               <td style="width: 30%;" class='<?php echo $clase;?>'><?php echo $carreas; ?></td>
                
           </tr>
        <?php  $nums++; ?>  
</table>
    <?php
    }
    ?>
    <br>
    <table style="width:100%; margin-top: 200px">
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

