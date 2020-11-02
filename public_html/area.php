<div class="container">
  <p>
    <button class="btn btn-secondary btn-lg btn-block" type="button" data-toggle="collapse" data-target="#multiCollapse2" aria-expanded="false" aria-controls="multiCollapse2">
       <?php /*echo date("Y-m-d");*/ ?>
       Crear Area
    </button>
  </p>
  <div class="row">
    <div class="col">
      <div class="collapse multi-collapse" id="multiCollapse2">
        <div class="card card-body">
          <div class="container">
            <form action="verificar_area.php" method="post">
              <div class="form-group">
                <label for="input">Area a agregar</label>
                <input type="text" class="form-control" name="area" id="input" placeholder="Nombre Area">
                <p></p>
                <button type="submit" class="btn btn-warning btn-lg btn-block">Agregar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>