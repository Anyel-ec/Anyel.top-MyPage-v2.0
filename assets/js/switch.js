var elements = ["hero-fullscreen", "header", "featured-services", "fs-1",
    "fs-2", "fs-3", "fs-4", "logos", "certificaciones", "c-1", "c-2", "c-3", "c-4", "c-5", "c-6",
    "cta", "services", "s1", "s2", "s3", "s4", "s5", "s6", "s7", "main", "s8", "faqlist", "f1", "f2", 
    "f3", "f4", "f5", "h1", "footer", "about_me", "txt_s1", "footer_1"];
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