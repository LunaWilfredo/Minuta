<?php
    $workers = Actividad::workerList();

    $registro = Titulo::registroTitulo();

    $listar = Titulo::listarTitulo();

    
?>
            <!-- Register-->
            <section class="resume-section" id="start">
                <div class="resume-section-content">
                    <h1 class="mb-0">
                        MS
                        <span class="text-primary">Minuta</span>
                    </h1>
                    <div class="subheading mb-5">
                        Design by 
                        <a href="mailto:name@email.com">MS</a>
                    </div>
                    <p class="lead mb-5">Organiza tus actividades , registra tus pendientes y concreta tus ideas</p>
                    <!-- <div class="social-icons">
                        <a class="social-icon" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        <a class="social-icon" href="#!"><i class="fab fa-github"></i></a>
                        <a class="social-icon" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="social-icon" href="#!"><i class="fab fa-facebook-f"></i></a>
                    </div> -->
                </div>
            </section>
            <hr class="m-0" />

            <!-- NOTES-->
            <section class="resume-section" id="firstStep">
                <div class="resume-section-content">
                    <h2 class="mb-5">Crear</h2>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">Primer Paso</h3>
                            <div class="subheading mb-3">Crea tu minuta </div>
                            <p>Dale en el boton crear para crear la Minuta</p>

                            <h3 class="mb-0">Segundo Paso</h3>
                            <div class="subheading mb-3">añade tus actividades </div>
                            <p>Dale en el boton añadir y añade tus actividades</p>
                        </div>
                    </div>

                    
                </div>
            </section>
            <hr class="m-0" />

            <!-- Register-->
            <section class="resume-section" id="listOfMinutes">
                <div   class="resume-section-content">
                    <h2 class="mb-5">Lsita</h2>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                    </div>

                 <!-- Button trigger modal -->
                    <div class="container-fluit mb-1">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#register">
                        Crear
                        </button>
                    </div>

                 <!-- table -->
                <?php     
                    if($registro =="ok"){
                        echo '

                        <div class="alert alert-success" role="alert">
                            Minute creada con exito
                        </div>

                        ';
                    } 
                ?>
                    <div class="container-fluit">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Titulo</th>
                                    <th scope="col">Organizador</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                    <?php 
                        $i = 0; 
                        foreach($listar as $indice => $titulos): 
                        $i++;
                        ?>
                                <tr>
                                    <th scope="row"><?php $titulos['id']; echo $i;?></th>
                                    <td><?=$titulos['nombre']?></td>
                                    <td><?=$titulos['organizador']?></td>
                                    <td><?=$titulos['fecha']?></td>
                                    <?php if($titulos['estadog'] == 2): ?>
                                    <td><a href="inicio.php?page=Aregister&id=<?=$titulos['id']?>" class="btn btn-success">Añadir Actividades</a></td>
                                    <?php else: ?>
                                    <td>
                                        <a href="inicio.php?page=Alist&id=<?=$titulos['id']?>" class="btn btn-success">Ver</a>
                                        <a href="inicio.php?page=MinutePdf&id=<?=$titulos['id']?>" class="btn btn-warning">PDF</a>
                                        <a href="print-pdf.php?id=<?=$titulos['id']?>" class="btn btn-danger" target="_blank" >Exportar</a>
                                    </td>
                                    <?php endif; ?>
                                </tr>
                        <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </section>
            <hr class="m-0" />            
            
       


<!-- Modal -->
<div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Nueva Minuta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- form register -->
        <form action="" method="post">

            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Titulo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" value="" name="title" >
                </div>
            </div>

            <div class="form-group row">
                <label for="organice" class="col-sm-2 col-form-label">Organizador</label>
                <div class="col-sm-10">
                    <select class="form-control" id="organice" name="organice">
                        <option value="" selected>Seleccionar</option>
                    <?php foreach($workers as $indice => $work):?>
                        <option value="<?=$work['id']?>"><?=$work['nombre']?></option>
                    <?php endforeach;?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="date" class="col-sm-2 col-form-label">Fecha</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="date" value="<?php echo date("Y-m-d") ?>" name="date" readonly>
                </div>
            </div>
            
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Crear</button>
      </div>
        </form>
        <!-- end form -->
    </div>
  </div>
</div>