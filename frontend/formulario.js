// Escuchar el evento de clic en el botón "Aceptar"
document.getElementById("botonAceptar").addEventListener("click", () => {
  // Imprimir mensaje en la consola
  console.log("Carga de formulario");
  
  // Obtener el formulario por su ID
  const form = document.getElementById("formularioMantenimiento");
  
  // Crear un objeto FormData para recopilar los datos del formulario
  const formData = new FormData(form);
  
  // Convertir los datos del formulario a un objeto JSON
  const formDataJson = Object.fromEntries(formData.entries());
  
  // Imprimir el objeto JSON en la consola
  console.log(formDataJson);
  
  // Imprimir el valor del campo "proceso" en la consola
  console.log(document.getElementById("proceso").value);
  
  // Configurar las opciones de la solicitud fetch por defecto
  let fetchOptions = {
    method: "POST", // Método de la solicitud: POST
    body: JSON.stringify(formDataJson), // Cuerpo de la solicitud: datos del formulario en formato JSON
  };
  
  // Separar las altas de las modificaciones
  if (document.getElementById("proceso").value == "modificacion") {
    // Configurar las opciones de la solicitud fetch para modificaciones
    fetchOptions = {
      method: "PUT", // Método de la solicitud: PUT
      body: JSON.stringify(formDataJson), // Cuerpo de la solicitud: datos del formulario en formato JSON
    };
  }; 
  
  // Enviar la solicitud fetch a la API
  fetch("http://localhost/api%20basico/backend/", fetchOptions)
    .then((response) => response.text()) // Obtener la respuesta de la solicitud como texto
    .then((data) => {
      // Imprimir la respuesta del servidor en la consola
      console.log("Respuesta del servidor:", data);
      
      // Redirigir a otra página
      location.href ="./index.php";
    })
    .catch((error) => {
      // Manejar errores de la solicitud fetch
      console.error("Error:", error);
    });
});

function cargafoto() {
  document.getElementById("foto").src = window.URL.createObjectURL(
    document.getElementById("nuevaFoto").files[0]
  );
}