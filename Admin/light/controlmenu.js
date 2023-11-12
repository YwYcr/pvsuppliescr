// Define el objeto de mapeo de scripts
const scriptMappings = {
  dashboard: [
    "../assets/vendor/jquery/jquery-3.3.1.min.js",
    "../assets/vendor/bootstrap/js/bootstrap.bundle.min.js",
    "assets/bundles/vendorscripts.bundle.js",
    "assets/bundles/c3.bundle.js",
    "assets/bundles/flotscripts.bundle.js",
    "assets/bundles/knob.bundle.js",
    "assets/js/common.js",
    "assets/js/index.js"
  ],
  usuarios: [
    "../assets/vendor/jquery/jquery-3.3.1.min.js",
    "../assets/vendor/bootstrap/js/bootstrap.bundle.min.js",
    "assets/bundles/vendorscripts.bundle.js",
    "assets/bundles/datatablescripts.bundle.js",
    "../assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js",
    "../assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js",
    "../assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js",
    "../assets/vendor/jquery-datatable/buttons/buttons.html5.min.js",
    "../assets/vendor/jquery-datatable/buttons/buttons.print.min.js",
    "../assets/vendor/sweetalert/sweetalert.min.js",
    "assets/js/pages/ui/dialogs.js",
    "assets/js/common.js",
    "assets/js/pages/tables/jquery-datatable.js"
  ],
  proveedores: [
    "../assets/vendor/jquery/jquery-3.3.1.min.js",
    "../assets/vendor/bootstrap/js/bootstrap.bundle.min.js",
    "assets/bundles/vendorscripts.bundle.js",
    "assets/bundles/datatablescripts.bundle.js",
    "../assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js",
    "../assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js",
    "../assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js",
    "../assets/vendor/jquery-datatable/buttons/buttons.html5.min.js",
    "../assets/vendor/jquery-datatable/buttons/buttons.print.min.js",
    "../assets/vendor/sweetalert/sweetalert.min.js",
    "assets/js/pages/ui/dialogs.js",
    "assets/js/common.js",
    "assets/js/pages/tables/jquery-datatable.js"
  ],
  contactos: [
    "../assets/vendor/jquery/jquery-3.3.1.min.js",
    "../assets/vendor/bootstrap/js/bootstrap.bundle.min.js",
    "assets/bundles/vendorscripts.bundle.js",
    "assets/bundles/datatablescripts.bundle.js",
    "../assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js",
    "../assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js",
    "../assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js",
    "../assets/vendor/jquery-datatable/buttons/buttons.html5.min.js",
    "../assets/vendor/jquery-datatable/buttons/buttons.print.min.js",
    "../assets/vendor/sweetalert/sweetalert.min.js",
    "assets/js/pages/ui/dialogs.js",
    "assets/js/common.js",
    "assets/js/pages/tables/jquery-datatable.js"
  ],
  calendario: [
    "../assets/vendor/jquery/jquery-3.3.1.min.js",
    "../assets/vendor/bootstrap/js/bootstrap.bundle.min.js",
    "assets/bundles/vendorscripts.bundle.js",
    "assets/bundles/fullcalendarscripts.bundle.js",
    "../assets/vendor/sweetalert/sweetalert.min.js",
    "assets/js/pages/ui/dialogs.js",
    "assets/js/common.js",
    "assets/js/pages/calendar.js"
  ],
  proyectos: [
    "../assets/vendor/jquery/jquery-3.3.1.min.js",
    "../assets/vendor/bootstrap/js/bootstrap.bundle.min.js",
    "assets/bundles/vendorscripts.bundle.js",
    "../assets/vendor/sweetalert/sweetalert.min.js",
    "assets/js/pages/ui/dialogs.js",
    "assets/js/common.js"
  ],
  recursohumano: [
    "../assets/vendor/jquery/jquery-3.3.1.min.js",
    "../assets/vendor/bootstrap/js/bootstrap.bundle.min.js",
    "assets/bundles/vendorscripts.bundle.js",
    "assets/bundles/datatablescripts.bundle.js",
    "../assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js",
    "../assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js",
    "../assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js",
    "../assets/vendor/jquery-datatable/buttons/buttons.html5.min.js",
    "../assets/vendor/jquery-datatable/buttons/buttons.print.min.js",
    "../assets/vendor/sweetalert/sweetalert.min.js",
    "assets/js/pages/ui/dialogs.js",
    "assets/js/common.js",
    "assets/js/pages/tables/jquery-datatable.js"
  ],
  inventario: [
    "../assets/vendor/jquery/jquery-3.3.1.min.js",
    "../assets/vendor/bootstrap/js/bootstrap.bundle.min.js",
    "assets/bundles/vendorscripts.bundle.js",
    "assets/bundles/datatablescripts.bundle.js",
    "../assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js",
    "../assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js",
    "../assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js",
    "../assets/vendor/jquery-datatable/buttons/buttons.html5.min.js",
    "../assets/vendor/jquery-datatable/buttons/buttons.print.min.js",
    "../assets/vendor/sweetalert/sweetalert.min.js",
    "assets/js/pages/ui/dialogs.js",
    "assets/js/common.js",
    "assets/js/pages/tables/jquery-datatable.js"
  ],
  compose: [
    "../assets/vendor/jquery/jquery-3.3.1.min.js",
    "../assets/vendor/bootstrap/js/bootstrap.bundle.min.js",
    "assets/bundles/vendorscripts.bundle.js",
    "assets/js/common.js",
    "../assets/vendor/summernote/dist/summernote.js"
  ],
  inbox: [
    "../assets/vendor/jquery/jquery-3.3.1.min.js",
    "../assets/vendor/bootstrap/js/bootstrap.bundle.min.js",
    "assets/bundles/vendorscripts.bundle.js",
    "assets/js/common.js"
  ],
  profile: [
    "../assets/vendor/jquery/jquery-3.3.1.min.js",
    "../assets/vendor/bootstrap/js/bootstrap.bundle.min.js",
    "assets/bundles/vendorscripts.bundle.js",
    "../assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js",
    "assets/js/common.js"
  ]


  // Agrega otros mapeos de opciones de menú aquí
};

// Variable para almacenar la página actual
let currentPage = "";

// Variable para almacenar los scripts cargados actualmente
let loadedScripts = [];

// Función para cargar scripts en el orden correcto
function loadScripts(scripts) {
  function loadScript(index) {
    if (index < scripts.length) {
      const script = scripts[index];
      if (!loadedScripts.includes(script)) {
        const scriptElement = document.createElement("script");
        scriptElement.src = script;
        scriptElement.onload = function () {
          loadedScripts.push(script);
          loadScript(index + 1); // Cargar el siguiente script
        };
        document.body.appendChild(scriptElement);
      } else {
        loadScript(index + 1); // Cargar el siguiente script
      }
    }
  }
  loadScript(0); // Comenzar la carga desde el primer script
}

// ...


// Función para descargar scripts
function unloadScripts(scripts) {
  const currentScripts = document.querySelectorAll("script[src]");
  for (const script of currentScripts) {
    if (scripts.includes(script.getAttribute("src"))) {
      script.remove();
      const index = loadedScripts.indexOf(script.getAttribute("src"));
      if (index !== -1) {
        loadedScripts.splice(index, 1);
      }
    }
  }
}

// Función para cargar contenido y gestionar clase "active"
function loadContent(targetPage) {

  if (currentPage === targetPage) {
    return; // Evitar cargar nuevamente
  }
  currentPage = targetPage;

  // Elimina la clase "active" de todos los enlaces
  const menuLinks = document.querySelectorAll("#menu li[data-page]");
  menuLinks.forEach((link) => link.classList.remove("active"));

  // Agrega la clase "active" al enlace actual
  const currentLink = document.querySelector(
    `#menu li[data-page="${targetPage}"]`
  );
  if (currentLink) {
    currentLink.classList.add("active");
  }

  // Descargar scripts no necesarios
  const scriptsToUnload = loadedScripts.filter(script => !scriptMappings[targetPage].includes(script));
  unloadScripts(scriptsToUnload);

  // Cargar scripts necesarios
  loadScripts(scriptMappings[targetPage]);

  // Carga el contenido
  const mainContent = document.getElementById("main-content");
  fetch("admin" + targetPage + "/" + targetPage+ ".php")
    .then((response) => response.text())
    .then((data) => {
      mainContent.innerHTML = data;
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

// Document Ready
document.addEventListener("DOMContentLoaded", function () {
  // Cargar contenido del dashboard por defecto al cargar la página
  loadContent("dashboard");

  // Manejar clic en el menú
// Agregar el evento de clic al elemento con id="menu"
document.getElementById("menu").addEventListener("click", handleMenuClick);

// Agregar el evento de clic al elemento con id="menu1"
document.getElementById("menu1").addEventListener("click", handleMenuClick);

// Función para manejar el clic en los elementos de menú
function handleMenuClick(event) {
  event.preventDefault();
  const targetPage = event.target.getAttribute("data-page");

  loadContent(targetPage);
}

});
