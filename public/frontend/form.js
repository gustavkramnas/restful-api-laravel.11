// Väntar på att dokumentet ska laddas innan körning
document.addEventListener("DOMContentLoaded", () => {
    // Referenser till HTML-elementen
    const certificateCheckbox = document.getElementById("absence-certificate");
    const certificatePhotosInput = document.getElementById(
        "absence-certificate-photos"
    );
    const requiredIndicator = document.getElementById("required-indicator");
    const errorMessage = document.getElementById("error-message");

    // Uppdaterar gränssnittet baserat på kryssrutan
    const updateUI = () => {
        const isChecked = certificateCheckbox.checked;
        requiredIndicator.style.display = isChecked ? "inline" : "none";
        if (isChecked) errorMessage.classList.add("d-none");
    };

    // Visar felmeddelandet om kryssrutan inte är ikryssad när användaren klickar på filinmatningsfältet
    const showErrorIfUnchecked = (event) => {
        if (!certificateCheckbox.checked) {
            errorMessage.classList.remove("d-none");
            event.preventDefault();
        }
    };

    // Lyssnar efter ändringar i kryssrutan och visar felmeddelandet vid behov
    certificateCheckbox.addEventListener("change", updateUI);
    certificatePhotosInput.addEventListener("click", showErrorIfUnchecked);

    // Direktanrop av updateUI-funktionen för att initiera gränssnittet
    updateUI();
});
