<?php

?>
<div class="container">
    <div class="row">
        <div class="col l4">
            <div class="card small light-blue darken-4">
                <div class="card-content white-text">
                    <form  id="añadir" action="./controller/add.php" method="post">
                        <input class="card-title white-text" type="text" id="title" name="title" value="Título"></input>
                        <textarea name="area" id="area" class="materialize-textarea white-text" style="height: 100px;"></textarea>
                        <label for="area">Que estas pensando?</label>
                    </form>
                </div>
                <div class="card-action">
                    <button class="btn-flat" type="submit" form="añadir"><i class="material-icons md-36">add_box</i></button>
                </div>
            </div>
        </div>
        <?php include './controller/read.php'; ?>
        
    </div> 
</div>