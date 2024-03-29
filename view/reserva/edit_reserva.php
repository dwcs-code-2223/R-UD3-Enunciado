<?php
$id = $restaurante = $tel = $comensales = "";
if (isset($dataToView["data"])) {
    $reserva = $dataToView["data"];

    if ($reserva->getId() !== null) {
        $id = $reserva->getId();
    }
    if ($reserva->getRestaurante() !== null) {
        $restaurante = $reserva->getRestaurante();
    }
    if ($reserva->getTel() !== null) {
        $tel = $reserva->getTel();
    }

    if ($reserva->getComensales() !== "") {
        $comensales = $reserva->getComensales();
    }
}
?>
<div class="row">
    <?php
    if (isset($reserva) && ($reserva->getStatus() === Util::OPERATION_OK )):
        ?>
        <div class="alert alert-success">
            Operación realizada correctamente. <a href="FrontController.php?controller=Reserva&action=list">Volver al listado</a>
        </div>
        <?php
    elseif (isset($reserva) && ($reserva->getStatus() === Util::OPERATION_NOK )):
        ?>
        <div class="alert alert-danger">
            Ha ocurrido algún problema y no se ha podido guardar la reserva$reserva. <a href="FrontController.php?controller=Reserva&action=list">Volver al listado</a>
        </div>
        <?php
 
    elseif (isset($reserva) && ($reserva->getStatus() === Util::NO_OPERATION)):
        ?>
     
<!-- reserva -->

        <form method="post" action="FrontController.php?controller=Reserva&action=save">
      <div class="mb-3">
        <label for="restaurante" class="form-label">Restaurante</label>
        <select class="form-select" aria-label="Restaurante" required name="restaurante">

          <?php 
          foreach ($reserva->getRestaurantes() as $restaurante) : ?>
            <option value="<?=$restaurante->getId()?>"> <?= $restaurante->getNombre()?></option>
          <?php endforeach; ?>
        </select>
      </div>

    

      <div class="mb-3">
        <label for="tel" class="form-label">Teléfono</label>
        <input type="tel" class="form-control" id="tel" placeholder="600123123" pattern="[6|9]\d{8}" required name="tel">
      </div>

      <div class="mb-3">
        <label for="comensales" class="form-label">Comensales</label>
        <input type="number" min="1" max="6" class="form-control" id="tel"  required name="comensales">
      </div>


      <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">Reservar</button>
      </div>

    </form>




       
    <?php endif; ?>
</div>