<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulär</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container bg-grey py-3 border border-dark rounded bg-info">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-9 col-sm-9">
                <h1 class="text-center user-select-none">Ny Frånvaroanmälan</h1>
                <div class="card mb-1 border border-dark bg-light">
                    <div class="card-body">
                        <h5 class="card-title mb-4 user-select-none">Personlig information</h5>
                        <form id="personal-info-form">
                            <div class="mb-3">
                                <label for="employee-id" class="form-label">Anställnings-ID *</label>
                                <input type="text" class="form-control" id="employee-id" placeholder="Ange anställnings-ID" required>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Datum för frånvaro *</label>
                                <input type="date" class="form-control" id="date" value="2024-04-19" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone-number" class="form-label">Telefonnummer *</label>
                                <input type="tel" class="form-control" id="phone-number" placeholder="+46763283392" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-post *</label>
                                <input type="email" class="form-control" id="email" placeholder="Ange e-postadress" required>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mb-1 border border-dark bg-light">
                    <div class="card-body">
                        <h5 class="card-title mb-4 user-select-none">Frånvaro detaljer</h5>
                        <form id="absence-details-form">
                            <div class="mb-3">
                                <label for="reason" class="form-label">Orsak till frånvaro *</label>
                                <input type="text" class="form-control" id="reason" placeholder="Ange orsak till frånvaro" required>
                            </div>
                            <div class="mb-3">
                                <label for="absence-type" class="form-label">Typ av frånvaro *</label>
                                <select class="form-select" id="absence-type" required>
                                    <option value="" selected disabled>Välj typ av frånvaro</option>
                                    <option value="sickness">Sjukanmälan</option>
                                    <option value="VAB">VAB</option>
                                    <option value="vacation">Semester</option>
                                    <option value="other">Annat</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="absence-percentage-level" class="form-label">Frånvaronivå *</label>
                                <input type="text" class="form-control" id="absence-percentage-level" placeholder="Ange frånvaronivå" required>
                                <p class="text-muted user-select-none small">Max 100 %</p>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="absence-certificate">
                                <label class="form-check-label" for="absence-certificate">Frånvaro intyg</label>
                                <p class="text-muted small user-select-none">Saknar du intyg, kryssa ej i rutan</p>
                            </div>
                            <div class="mb-3">
                                <label for="absence-certificate-photos" class="form-label">Foton på frånvaro intyg <span id="required-indicator" style="display:none">*</span></label>
                                <input type="file" class="form-control" id="absence-certificate-photos">
                                <p id="error-message" class="text-danger d-none user-select-none">Du måste markera rutan 'Frånvaro intyg' innan du kan ladda upp en fil.</p>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mb-1 border border-dark bg-light">
                    <div class="card-body">
                        <h5 class="card-title mb-4 user-select-none">Godkännande och kommentarer</h5>
                        <form id="approval-comments-form">
                            <div class="mb-3">
                                <label for="approval-by" class="form-label">Godkänd av *</label>
                                <input type="text" class="form-control" id="approval-by" placeholder="Ange godkännare av frånvaro" required>
                            </div>
                            <div class="mb-3">
                                <label for="approval-date" class="form-label">Godkänd datum *</label>
                                <input type="date" class="form-control" id="approval-date" value="2024-04-20" required>
                            </div>
                            <div class="mb-3">
                                <label for="comments" class="form-label">Kommentarer</label>
                                <textarea class="form-control" id="comments" rows="3"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary bg-dark mt-2 border border-dark">Skicka</button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('frontend/js/form.js') }}"></script>
</body>
</html>