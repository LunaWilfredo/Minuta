<?php 
    $worker = Actividad::workerList();

    $ver = Actividad::listarUno();

    $update = Actividad::update();
    if($update == "ok"){
        echo '<script>
            if(windows.history.replaceState){
                windows-history.replaceState(null,null,windows.location.href);
            }
            </script>';
        echo "<div class='alert alert-success'>Cambios Guardados Correctamente</div>
        <script>
            setTimeout(function(){
                window.location = 'inicio.php?page=';
            },200);
        </script>";
    }

?>
               <!-- update form  -->
            <div class="container">
            <?php 
            $idA=$_GET['id'];
            foreach($ver as $index =>$veru ): 
            
            ?>
               <form action="" method="post">
                    <div class="form-group">
                        <label for="id"></label>
                        <input type="hidden" class="form-control" id="id" name="idU" value="<?php echo $idA?>">
                    </div>
                    <div class="form-group">
                        <label for="activitytule">Nombre de Actividad</label>
                        <input type="text" class="form-control" id="activitytitle" name="activityU" value="<?=$veru['nombre']?>">
                    </div>
                    <div class="form-group">
                        <label for="personalworking">Organizadoe</label>
                        <select class="form-control" id="personalworking" name="staffU">
                        <option value="<?=$veru['id']?>" selected><?=$veru['organizador']?></option>
                        <?php foreach($worker as $index => $list): ?>
                        <option value="<?=$list['id']?>"><?=$list['nombre']?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Descripcion de actividad</label>
                        <textarea class="form-control" id="description" rows="3" name="descriptionU" value="<?=$veru['descripcion']?>"><?=$veru['descripcion']?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="date-finish">Fecha de termino</label>
                        <input type="date" class="form-control date" id="date-finish" name="datefU" value = "<?=$veru['fechaf']?>">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Save Changes" class="btn btn-success" name="save">
                        <button class="btn btn-danger" name="cancel" onclick="javascript:window.history.back();">Cancel</button>
                    </div>
                </form>
                <?php endforeach;?>
               <!-- end form -->      
            </div>
            
       