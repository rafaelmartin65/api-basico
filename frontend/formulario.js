document.getElementById("botonAceptar").addEventListener("click", () => {
  console.log("Carga de formulario");
  const form = document.getElementById("formularioMantenimiento");
  const formData = new FormData(form);
  const formDataJson = Object.fromEntries(formData.entries());
  console.log(formDataJson);
  console.log(document.getElementById("proceso").value);
  let fetchOptions = {
    method: "POST",
    body: JSON.stringify(formDataJson),
  };
  // Separamos las altas de las modificaciones
  if (document.getElementById("proceso").value == "modificacion") {
    // Configurar las opciones de la solicitud fetch
    fetchOptions = {
      method: "PUT",
      body: JSON.stringify(formDataJson),
    };
  }; 
  // Enviar la solicitud fetch al servidor JSON
  fetch("http://localhost/api%20basico/backend/", fetchOptions)
    .then((response) => response.text())
    .then((data) => {
      console.log("Respuesta del servidor:", data);
      location.href ="./index.php";
    })
    .catch((error) => {
      console.error("Error:", error);
    });
});
