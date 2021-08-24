<?php 
    $titulo = Actividad::listarPdf();
    $cabecera = Actividad::listarUno();
    
?>
<!-- Vista general de contenido -->
    <div class="container">
    <?php foreach($cabecera as $index =>$titulos): ?>
        <div class="container">
            <h2 class="text-right"><?=$titulos['titulo']?></h2>
            <h6>Organizador:<?=$titulos['organizador']?></h6>
            <h6>Fecha:<?=$titulos['fecha']?></h6>
        </div>
    <?php endforeach; ?>
        <div class="container">
        <h5 class="text-dark  text-center">Agenda de Reunion</h5>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">N°</th>
                <th scope="col">Actividad</th>
                <th scope="col">Responsable</th>
                <th scope="col">Estado</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Fecha</th>
                </tr>
            </thead>
            <tbody>
            <?php 
$i = 0;
foreach($titulo as $index =>$cuerpo):
$i++;
?>
                <tr>
                <th scope="row"><?php echo $i; ?></th>
                <td><?=$cuerpo['nombre']?></td>
                <td><?=$cuerpo['organizador']?></td>
                <td><?=$cuerpo['estado']?></td>
                <td><?=$cuerpo['descripcion']?></td>
                <td><?=$cuerpo['fechaf']?></td>
                </tr>
<?php endforeach;?>
            </tbody>
        </table>
        </div>
        <div class="container">
            <h6>Design by Ms and RGuffichin</h6>
        </div>
    </div>
<!-- </section> -->
<!-- <hr class="m-0" />             -->
