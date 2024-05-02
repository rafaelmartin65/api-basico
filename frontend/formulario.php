<!--<div class="d-flex justify-content-center gap-3">
    <form id="formularioMantenimiento" action="" class="d-flex" enctype="multipart/form-data">
        <div class="d-flex flex-column">
            <input type="hidden" name="proceso" id="proceso">
            <div class="my-2">
                <label class="form-label" for="id">Id:</label>
                <input name="id" id="id" type="text">
            </div>
            <div class="my-2">
                <label class="form-label" for="nombre">Nombre:</label>
                <input name="nombre" id="nombre" type="text">
            </div>
            <div class="my-2">
                <label class="form-label" for="telefono">Telefono:</label>
                <input name="telefono" id="telefono" type="text">
            </div>
            <div class="my-2">
                <label class="form-label" for="email">Email:</label>
                <input name="email" id="email" type="text">
            </div>
            <div class="d-flex justify-content-around">
                <input id="botonAceptar" class="btn btn-primary" type="button" value="Aceptar">
                <input type="reset" class="btn btn-danger" value="Cancelar">
            </div>
        </div>    
    </form>
</div>-->

<div class="container">
    
  <div class="row justify-content-center">
    <div class="col-md-6">
    <div class="d-flex flex-column">
        <img id="foto" width="250px" onerror="this.src='./fotos/nofoto.webp';" src="" alt="">
        <input type="file" name="nuevaFoto" id="nuevaFoto" onchange="cargafoto()">
    </div>
    </div>
    <div class="col-md-6">
      <div class="card">  
        <div class="card-body">
        <h3>Actualización datos contacto</h3>
          <form id="formularioMantenimiento" style="flex-direction:column;" action="" enctype="multipart/form-data">
            <input type="hidden" name="proceso" id="proceso">
            <div class="d-flex flex-column">
              <div class="mb-3">
                <label class="form-label" for="id">Id:</label>
                <input class="form-control border border-1 border-primary" name="id" id="id" type="text">
              </div>
              <div class="mb-3">
                <label class="form-label" for="nombre">Nombre:</label>
                <input class="form-control border border-1 border-primary" name="nombre" id="nombre" type="text">
              </div>
              <div class="mb-3">
                <label class="form-label" for="telefono">Teléfono:</label>
                <input class="form-control border border-1 border-primary" name="telefono" id="telefono" type="text">
              </div>
              <div class="mb-3">
                <label class="form-label" for="email">Email:</label>
                <input class="form-control border border-1 border-primary" name="email" id="email" type="text">
              </div>
            </div>
            <div class="d-flex flex-row justify-content-between">
              <button id="botonAceptar" class="btn btn-primary" type="button">Aceptar</button>
              <button class="btn btn-danger" type="reset" value="Cancelar">Cancelar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
