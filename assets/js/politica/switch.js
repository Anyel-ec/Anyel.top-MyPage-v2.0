var elements = ["main", "header"];
var darkModeBtn = document.getElementById("dark-mode-btn");

function toggleDarkMode() {
    // Cambiar directamente entre los modos claro y oscuro en el body al hacer clic en el botón
    document.body.classList.toggle("light-mode");
    document.body.classList.toggle("dark-mode");

    // Toggle entre los estilos en los elementos especificados
    elements.forEach(function (elementId) {
        var element = document.getElementById(elementId);
        element.classList.toggle("bg-dark");
        element.classList.toggle("text-light");
    });

}

// Aplicar el tema oscuro directamente al elemento "hero" al cargar la página
if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
    document.body.classList.add('dark-mode');
    toggleDarkMode(); // Actualizar automáticamente el icono del botón
} else {
    document.body.classList.add('light-mode');
    
}