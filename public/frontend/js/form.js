// Väntar tills hela DOM-trädet har laddats innan koden körs
document.addEventListener("DOMContentLoaded", () => {
    const certificateCheckbox = document.getElementById(
        "absence-certificate-checkbox"
    );
    const absenceForm = document.getElementById("absence-form");

    // Lägg till en händelselyssnare för formuläret för att ändra värdet för absence_certificate innan det skickas
    absenceForm.addEventListener("submit", () => {
        const absenceCertificateInput = document.querySelector(
            "input[name='absence_certificate']"
        );
        if (absenceCertificateInput) {
            absenceCertificateInput.value = certificateCheckbox.checked;
        }
    });
});
