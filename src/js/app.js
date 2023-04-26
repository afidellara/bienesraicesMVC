document.addEventListener("DOMContentLoaded", function () {
  eventListener();
  darkMode();
});

function darkMode() {
  const preferenciaMode = window.matchMedia("(prefers-color-scheme: dark)");
  // console.log(preferenciSaMode.matches);

  modoPreferenciaOscuro(preferenciaMode.matches);

  preferenciaMode.addEventListener(
    "change",
    modoPreferenciaOscuro(preferenciaMode.matches)
  );

  const darkModeBoton = document.querySelector(".dark-mode-boton");

  darkModeBoton.addEventListener("click", modeDarkPage);
}

function modoPreferenciaOscuro(modo) {
  if (modo == true) {
    document.body.classList.add("dark-mode");
  } else {
    document.body.classList.remove("dark-mode");
  }
}

function modeDarkPage() {
  document.body.classList.toggle("dark-mode");
}

function eventListener() {
  const mobileMenu = document.querySelector(".mobile-menu");

  mobileMenu.addEventListener("click", navegacionResponsive);

  const metodoContacto = document.querySelectorAll(
    'input[name = "contacto[contacto]"]'
  );
  metodoContacto.forEach((input) =>
    input.addEventListener("click", mostrarMetodosContacto)
  );
}

function navegacionResponsive() {
  const navegacion = document.querySelector(".navegacion");

  // if(navegacion.classList.contains('mostrar')){
  //     navegacion.classList.remove('mostrar');
  //     console.log("mostrar removido");
  // }else{
  //     navegacion.classList.add('mostrar');
  //     console.log("mostrar agregado");
  // }
  navegacion.classList.toggle("mostrar");
}

function mostrarMetodosContacto(e) {
  const contactoDiv = document.querySelector("#contacto");

  if (e.target.value === "telefono") {
    contactoDiv.innerHTML = `
        <input type="tel" id="telefono" placeholder="Escribe tu telefono" name="contacto[telefono]">
        
        <p>Si eligia la hora y la fecha</p>
        <label for="fecha">fecha:</label>
        <input type="date" id="fecha" name="contacto[fecha]" >

        <label for="hora">Hora:</label>
        <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">
        
        `;
  } else if(e.target.value==="email") {
    contactoDiv.innerHTML = `
    
    <input type="email" id="email" placeholder="Escribe tu email" name="contacto[email]" required>
    `
  }
}
