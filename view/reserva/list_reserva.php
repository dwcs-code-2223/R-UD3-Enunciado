<div class="row">
    <div class="col-md-12 text-right">
     <!-- Aquí el enlace a crear reserva -->
        <hr/>
    </div>
    <?php
    if (count($dataToView["data"]) > 0) {
        foreach ($dataToView["data"] as $reserva) {
            ?>
            <div class="col-md-3 card border border-secondary rounded m-2">
                <?php
              
                    
                
               
                ?>
              
                <img src="../files/no-picture.jpg" class="card-img-top" >
                <div class="card-body ">

                    <h5 class="card-title"><!-- aquí el nombre del restaurante --></h5>

                    <div class="card-text"><!-- aquí el teléfono --></div>
                    <hr class="mt-1"/>
                    <div class="card-text"><!-- aquí los comensales--></div>
                </div>
            </div>
            <?php
        }
    } else {
        ?>
        <div class="alert alert-info">
            Actualmente no existen reservas.
        </div>
        <?php
    }
    ?>
</div>