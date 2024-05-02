<div class="d-flex justify-content-center gap-3">
    <form id="formularioMantenimiento" action="" class="d-flex" enctype="multipart/form-data">
        <div class="d-flex flex-column">
            <input type="hidden" name="proceso" id="proceso">
            <div class="my-2">
                <label for="id">Id:</label>
                <input name="id" id="id" type="text">
            </div>
            <div class="my-2">
                <label for="nombre">Nombre:</label>
                <input name="nombre" id="nombre" type="text">
            </div>
            <div class="my-2">
                <label for="telefono">Telefono:</label>
                <input name="telefono" id="telefono" type="text">
            </div>
            <div class="my-2">
                <label for="email">Email:</label>
                <input name="email" id="email" type="text">
            </div>
            <div class="d-flex justify-content-around">
                <input id="botonAceptar" type="button" value="Aceptar">
                <input type="reset" value="Cancelar">
            </div>
        </div>    
    </form>
</div>