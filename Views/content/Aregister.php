<?php
  $worker = Actividad::workerList();

  $registro = Actividad::registroActividad();

  $actividades = Actividad::listarActividades();

  // GUARDADO DE TODA LA MINUTA 
  if(isset($_POST['btng'])){
    $guardar = Titulo::guardar();
    if($guardar == "ok"){
       echo '<script>
            if(windows.history.replaceState){
                windows-history.replaceState(null,null,windows.location.href);
            }
            </script>';
      echo "<div class='alert alert-info' role='alert'>Guardado Exitoso </div>
        <script>
            setTimeout(function(){
                window.location = 'inicio.php?page=body';
            },200);
        </script>";
    }
  }
  
?>
            <!-- Register-->
            <section class="resume-section" id="listOfMinutes">
                <div   class="resume-section-content">
                    <h2 class="mb-5">List of Activities</h2>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                    </div>

                 <!-- Button trigger modal -->
                    <div class="container-fluit mb-1">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#register">
                        New
                        </button>
                    </div>

                    <?php 
                        if($registro == "ok"){
                          echo '
                          <div class="alert alert-success" role="alert">
                            Actividad registrada Correctamente
                          </div>
                          ';
                        }
                    ?>
                    
                 <!-- table -->
                    <div class="container-fluit">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Activity</th>
                                    <th scope="col">Descriptio</th>
                                    <th scope="col">I.Date</th>
                                    <th scope="col">F.Date</th>
                                    <th scope="col">Responsable</th>
                                    <th scope="col">titulo</th>
                                    <th scope="col">State</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              $i=0; 
                              foreach($actividades as $index => $lista): 
                              $i++;
                              ?>
                                <tr>
                                    <th scope="row"><?php $lista['id']; echo $i;?></th>
                                    <td><?=$lista['nombre']?></td>
                                    <td><?=$lista['descripcion']?></td>
                                    <td><?=$lista['fechai']?></td>
                                    <td><?=$lista['fechaf']?></td>
                                    <td><?=$lista['responsable']?></td>
                                    <td><?=$lista['titulo']?></td>
                                    <td><?=$lista['estado']?></td>
                                    <td>
                                        <a href="inicio.php?page=Aupdate&id=<?=$lista['id']?>" class="btn btn-warning">E</a>
                                    </td>
                                </tr>
                              <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- BUTTON SAVE MINUTE -->

                <div class="container-fluit mb-1">
                <form action="" method="post">
                  <button type="submit" class="btn btn-danger" name="btng" value="btng">
                        Guardar
                  </button>
                </form>
                </div>
          
                    </div>
                </div>
            </section>
            <hr class="m-0" />            


<!-- Modal -->
<div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actividades</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <!-- form -->
        <?php $Tid = $_GET['id']; ?>
        <form action="" method="post">
          <div class="form-group">
            <label for="id">T-id</label>
            <input type="text" class="form-control" id="tid"  name="tid" value="<?=$Tid?>">
          </div>
          <div class="form-group">
            <label for="activitytitle">Nombre de Actividad</label>
            <input type="text" class="form-control" id="activitytitle" placeholder="Title of Activity" name="activity">
          </div>
          <div class="form-group">
            <label for="personalworking">Encargado</label>
            <select class="form-control" id="personalworking" name="staff">
              <option value="" selected >Seleccionar</option>
              <?php foreach($worker as $index => $list):?>
              <option value="<?=$list['id']?>"><?=$list['nombre']?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="description">Descripcion de Actividad</label>
            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
          </div>
          <div class="form-group">
              <label for="date-finish">Fecha de Termino</label>
              <input type="date" class="form-control date" id="date-finish" name="datef">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </form>
        <!-- end form -->     
      </div>
    </div>
  </div>
</div>