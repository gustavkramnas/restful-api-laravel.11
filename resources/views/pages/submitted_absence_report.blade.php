<!DOCTYPE html>
<html lang="sv">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Submitted Absence Report</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container mt-5">
            <h1 class="text-center">Skapad Frånvaroanmälan</h1>
            <div class="row mt-3">
                <div class="col-md-6 offset-md-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="text-uppercase text-decoration-underline">Attribut</th>
                                <th scope="col" class="text-uppercase text-decoration-underline">Värde</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Anställnings-ID</th>
                                <td>{{ $absence->employee_id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Startdatum</th>
                                <td>{{ $absence->start_date }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Slutdatum</th>
                                <td>{{ $absence->end_date }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Telefonnummer</th>
                                <td>{{ $absence->phone_number }}</td>
                            </tr>
                            <tr>
                                <th scope="row">E-post</th>
                                <td>{{ $absence->email }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Orsak till frånvaro</th>
                                <td>{{ $absence->reason }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Typ av frånvaro</th>
                                <td>{{ $absence->absence_type }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Frånvaronivå</th>
                                <td>{{ $absence->absence_percentage_level }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Frånvaro intyg</th>
                                <td>{{ $absence->absence_certificate ? 'Ja' : 'Nej' }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Godkänd av</th>
                                <td>{{ $absence->approval_by }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Godkänd datum</th>
                                <td>{{ $absence->approval_date }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Kommentarer</th>
                                <td>{{ $absence->comments }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>

</html>