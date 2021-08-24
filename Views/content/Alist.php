<?php 
    $actividades = Actividad::listarActividades();

    if(isset($_POST['btnr'])){
      $realizado = Actividad::realizado();
      if($realizado=="ok"){
         echo "<div class='alert alert-primary' role='alert'>
                 Actividad Realizada Exitosamente
           </div>";
       }
    }

?>
            <!-- Register-->
            <section class="resume-section" id="listOfMinutes">
                <div   class="resume-section-content">
                    <h2 class="mb-5">Lista de Actividades</h2>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                    </div>
                 <!-- Button trigger modal -->
                    <div class="container-fluit mb-1">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#register">
                            Añadir
                        </button>
                    </div>
                 <!-- table -->
                    <div class="container-fluit">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Actividad</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Fecha de Inicio</th>
                                    <th scope="col">Fecha de Termino</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $i=0;
                            foreach($actividades as $indice =>$actividad):
                              $i++;
                            ?>
                                <tr>
                                    <th scope="row"><?php $actividad['id']; echo $i; ?></th>
                                    <td><?=$actividad['nombre']?></td>
                                    <td><?=$actividad['descripcion']?></td>
                                    <td><?=$actividad['fechai']?></td>
                                    <td><?=$actividad['fechaf']?></td>
                                    <td><?=$actividad['estado']?></td>
                                    <?php if($actividad['estado']=='pendiente'):?>
                                    <td>
                                      <form action="" method="post">
                                        <input type="hidden" value="<?php echo $actividad['id']; ?>" name="realizado">
                                        <button type="submit" class="btn btn-success" name="btnr">R</button>
                                      </form>
                                    </td>
                                    <?php else : ?>
                                    <td>NA</td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </section>
            <hr class="m-0" />            
