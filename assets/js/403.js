// Array de mensajes de broma para el error 403
var jokeMessages403 = [
    "Acceso Prohibido. Pero si traes donas, podríamos reconsiderarlo. 🍩",
    "Error 403: Parece que intentaste entrar a la Fortaleza de la Soledad de Superman. Sin capa, no puedes pasar. 🦸‍♂️",
    "¡Detente! Esta área es solo para programadores Jedi. 🪄",
    "Acceso Prohibido. Solo los unicornios pueden entrar aquí. 🦄",
    "Error 403: ¿Eres un mago? Porque este acceso está bajo un hechizo. 🔮",
    "Esta página está protegida por un dragón. Necesitas una espada mágica para entrar. 🐉",
    "Error 403: No tienes el mapa del tesoro. No puedes acceder a este contenido pirata. ☠️",
    "Acceso Prohibido. ¿Traes chocolate? El chocolate siempre es una contraseña válida. 🍫",
    "Error 403: ¡Espera! ¿Tienes una llave inglesa? Puede que funcione como contraseña. 🔧",
    "Acceso denegado. Por favor, toca la puerta tres veces y di 'Ábrete Sésamo'. 🚪"
];

// Función para obtener un mensaje aleatorio
function getRandomJokeMessage403() {
    var randomIndex = Math.floor(Math.random() * jokeMessages403.length);
    return jokeMessages403[randomIndex];
}

// Función para cambiar el mensaje cada 15 segundos
function changeRandomJokeMessage403() {
    var msgElement = document.querySelector(".msg");

    setInterval(function () {
        var randomMessage = getRandomJokeMessage403();
        msgElement.textContent = randomMessage;
    }, 15000);

    // Cambia el mensaje inicial de forma aleatoria
    msgElement.textContent = getRandomJokeMessage403();
}

// Llama a la función para iniciar el cambio de mensajes
changeRandomJokeMessage403();



///////////////////////////////////////
// Obtén el modal y el enlace de abrir
var modal = document.getElementById('myModal');
var openModalLink = document.getElementById('openModal');

// Obtén el elemento para cerrar el modal
var closeBtn = document.getElementsByClassName('close')[0];

// Abre el modal cuando se hace clic en el enlace
openModalLink.onclick = function () {
    modal.style.display = 'block';
}

// Cierra el modal cuando se hace clic en la "X"
closeBtn.onclick = function () {
    modal.style.display = 'none';
}

// Cierra el modal si se hace clic fuera de él
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}