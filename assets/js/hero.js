const phrases = ["Ciberseguridad", "Microservicios", "Soluciones en la Nube", "Análisis de Datos", "Desarrollo Full Stack", "Inteligencia Artificial"];
let currentPhraseIndex = 0;
let currentCharIndex = 0;
const typedOutput = document.getElementById("typed-output");

function typePhrase() {
    const currentPhrase = phrases[currentPhraseIndex];
    const currentChar = currentPhrase.charAt(currentCharIndex);
    typedOutput.textContent += currentChar;
    currentCharIndex++;

    if (currentCharIndex < currentPhrase.length) {
        setTimeout(typePhrase, 100); // Velocidad de escritura (ajustable)
    } else {
        setTimeout(erasePhrase, 100); // Tiempo antes de borrar (ajustable)
    }
}

function erasePhrase() {
    setTimeout(() => {
        const currentPhrase = phrases[currentPhraseIndex];
        typedOutput.textContent = currentPhrase.substring(0, currentCharIndex);
        currentCharIndex--;

        if (currentCharIndex >= 0) {
            erasePhrase();
        } else {
            currentPhraseIndex = (currentPhraseIndex + 1) % phrases.length;
            setTimeout(typePhrase, 10); // Tiempo antes de empezar la siguiente frase (ajustable)
        }
    }, 100);
}

// Comienza el proceso
typePhrase();