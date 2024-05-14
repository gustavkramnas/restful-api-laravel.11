document.addEventListener("DOMContentLoaded", () => {
    const certificateCheckbox = document.getElementById(
        "absence-certificate-checkbox"
    );
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

    certificateCheckbox.addEventListener("change", updateUI);

    certificatePhotosInput.addEventListener("click", showErrorIfUnchecked);

    updateUI();

    // Lägg till en händelselyssnare för formuläret för att ändra värdet för absence_certificate innan det skickas
    document.getElementById("absence-form").addEventListener("submit", () => {
        document.querySelector("input[name='absence_certificate']").value =
            certificateCheckbox.checked;
    });
});
