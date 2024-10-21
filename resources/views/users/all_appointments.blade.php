<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body class="bg-light">
    <center>
        <div class="container">

            <h4 class="text-center my-3">All Appointment</h4>

            <!-- Display the error message if it exists in the session -->
            @if (session('status'))
                <div class="error-message">
                    {{ session('status') }}
                </div>
            @endif

            <div class="row my-5">
                @foreach ($appointments->reverse() as $a)
                    <div class="col-sm-3    ">
                        <div class="card">
                            <div class="card-body">
                                <table>
                                    <tr>
                                        <td><b>Symptoms : </td>
                                        <td>{{ $a->symptoms }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Date : </td>
                                        <td>{{ $a->date }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Doctor : </td>
                                        <td>{{ $a->doctor }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Status : </td>
                                        @if ($a->status == 'Pending')
                                            <td class="text-danger"><b>{{ $a->status }}</b></td>
                                        @else
                                            <td class="text-success"><b>{{ $a->status }}</b></td>
                                        @endif
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </center>
</body>

</html>
