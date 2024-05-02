let ultimo = 0;
fetch("http://localhost/api%20basico/backend/")
  .then((response) => response.json())
  .then((datos) => {
    console.log("estos son los datos", datos);
    datos.forEach((elemento) => {
      if (parseInt(elemento.id) > ultimo) ultimo = parseInt(elemento.id);
      cargaContacto(elemento);
    });
  });

function cargaContacto(perfil) {
  // Creamos la fila (una por contacto)
  let fila = document.createElement("div");
  fila.classList.add("row", "align-items-center");

  // Creamos la columna de la foto
  let colFoto = document.createElement("div");
  colFoto.classList.add("col");

  let foto = document.createElement("img");
  foto.src = "./fotos/" + perfil.nombre + ".jpg";
  foto.onerror = () => {
    foto.src = "./fotos/nofoto.webp";
  };
  foto.style.width = "80px";
  foto.classList.add("rounded-circle", "m-2");

  console.log(foto.src);
  colFoto.appendChild(foto);
  fila.appendChild(colFoto);

 
  // Creamos columna del nombre
  let colNombre = document.createElement("div");
  colNombre.classList.add("col");
  let nombre = document.createElement("p");
  nombre.innerHTML = perfil.nombre;
  colNombre.appendChild(nombre);
  fila.appendChild(colNombre);

  let colTelefono = document.createElement("div");
  colTelefono.classList.add("col");
  let telefono = document.createElement("p");
  telefono.innerHTML = perfil.telefono;
  colTelefono.appendChild(telefono);
  fila.appendChild(colTelefono);

  let colEmail = document.createElement("div");
  colEmail.classList.add("col");
  let email = document.createElement("p");
  email.innerHTML = perfil.email;
  colEmail.appendChild(email);
  fila.appendChild(colEmail);

  // Agregamos los iconos
  let colIconos = document.createElement("div");
  colIconos.classList.add("col");
  let lista = document.createElement("ul");
  lista.classList.add("d-flex");
  let elementomodificar = document.createElement("li");
  let modificar = document.createElement("i");
  modificar.classList.add("fa-solid", "fa-pencil", "fa-lg", "btn");
  modificar.id = perfil.id;
  modificar.onclick = fmodificar;
  let elementoeliminar = document.createElement("li");
  let eliminar = document.createElement("i");
  eliminar.classList.add("fa-solid", "fa-trash-can", "fa-lg", "btn");
  eliminar.id = perfil.id;
  eliminar.onclick = feliminar;
  elementomodificar.appendChild(modificar);
  elementoeliminar.appendChild(eliminar);
  lista.appendChild(elementomodificar);
  lista.appendChild(elementoeliminar);
  colIconos.appendChild(lista);
  fila.appendChild(colIconos);

  document.getElementById("contenedor").appendChild(fila);
}

function fmodificar(event) {
  fetch("formulario.php")
    .then((respuesta) => respuesta.text())
    .then((lineasFormulario) => {
      document.getElementById("cuerpo").innerHTML = lineasFormulario;
      document.getElementById("id").value = event.target.id;
      document.getElementById("id").disabled;
      fetch(
        "http://localhost/api%20basico/backend/?id=" +
        event.target.id
      )
        .then((response) => response.json())
        .then((fichaContacto) => {
          document.getElementById("proceso").value = "modificacion";
          document.getElementById("nombre").value = fichaContacto.nombre;
          document.getElementById("telefono").value = fichaContacto.telefono;
          document.getElementById("email").value = fichaContacto.email;
          document.getElementById("foto").src =
            "./fotos/" + fichaContacto.nombre + ".jpg";
        });
      let script = document.createElement("script");
      script.src = "formulario.js";
      document.head.appendChild(script);
    });
}

document.getElementById("nuevo").addEventListener("click", () => {
  fetch("formulario.php")
    .then((respuesta) => respuesta.text())
    .then((lineasFormulario) => {
      document.getElementById("cuerpo").innerHTML = lineasFormulario;
      document.getElementById("proceso").value = "alta";
      document.getElementById("id").value = ultimo + 1;
      document.getElementById("id").disabled;
      let script = document.createElement("script");
      script.src = "formulario.js";
      document.head.appendChild(script);
    });
});

function feliminar(event) {
  fetch(
    "http://localhost/api%20basico/backend/?id=" + event.target.id,
    {
      method: "DELETE",
    }
  )
    .then((response) => response.text())
    .then((mensaje) => {
      console.log(mensaje);
      location.href = "./index.php";
    });
}
