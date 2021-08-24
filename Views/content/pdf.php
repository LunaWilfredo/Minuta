<?php 
        $conexion = new mysqli("localhost","root","","minute");
    if(isset($_GET['id'])){

        $bid = $_GET['id'];
        $sql = "SELECT a.*, p.nombre as 'organizador' ,t.nombre as 'titulo' FROM actividades a INNER JOIN personales p ON a.fk_organizador = p.id INNER JOIN titulos t ON a.fk_titulo = t.id WHERE a.fk_titulo = $bid";
        
        $resultado = $conexion->query($sql);
    }

    if(isset($_GET['id'])){

        $bid = $_GET['id'];
        $sql2 = "SELECT t.id, t.nombre,t.fecha, p.nombre AS 'organiza' FROM titulos t INNER JOIN personales p ON  p.id = t.organizador WHERE t.id = $bid";
        
        $resultado2 = $conexion->query($sql2);
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Minuta</title>
    <link rel="stylesheet" href="css/estilos.css" type="text/css" >
</head>
<body>
   <div class="contenedor">
       <div class="titulo">
           <div class="logo">M</div>
       </div>
       
       <div class="detalles">
       </div>
       <?php while($row2 = $resultado2->fetch_assoc()): ?>
       <div class="detalles">
          <div class="caja">
            Organizador: <?=$row2['organiza']?>
          </div>
           <div class="caja">
               Fecha :  <?=$row2['fecha']?>
           </div>
       </div>       
       <?php endwhile; ?>
   </div>
   
    <div class="titulo-table">
        AGENDA
    </div>
   
   <div class="contenedor-all">
       <table>
           <tr>
               <th>#</th>
               <th>Actividad</th>
               <th>Responsable</th>
               <th>Estado</th>
               <th>Descripcion</th>
               <th>Fecha </th>
           </tr>
           <?php while($row = $resultado->fetch_assoc()): ?>
           <tr>
                <td><?=$row['id']?></td>
                <td><?=$row['nombre']?></td>
                <td><?=$row['organizador']?></td>
                <td><?=$row['estado']?></td>
                <td><?=$row['descripcion']?></td>
                <td><?=$row['fechaf']?></td>
           </tr>
           <?php endwhile;?>           
       </table>
       
   </div>
   <div class="footer">Disgn by WL</div>
    
</body>
</html>