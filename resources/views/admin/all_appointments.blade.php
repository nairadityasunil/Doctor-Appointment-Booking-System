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
            <h4 class="text-center my-3">Appointment Master</h4>
            <a href="{{route('update_admin')}}" class="my-3 btn btn-primary">Update Details</a>

            <div class="card">
                <div class="card-card">
                    <div class="container p-2">
                        <table class="table text-center table-bordered table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Srno.</th>
                                    <th>Name</th>
                                    <th>Symptoms</th>
                                    <th>Date</th>
                                    <th>Doctor</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appointments as $a)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $a->name }}</td>
                                        <td>{{ $a->symptoms }}</td>
                                        <td>{{ $a->date }}</td>
                                        <td>{{ $a->doctor }}</td>
                                        @if ($a->status == 'Pending')
                                            <td class="text-danger"><b>{{ $a->status }}</b></td>
                                        @else
                                            <td class="text-success"><b>{{ $a->status }}</b></td>
                                        @endif
                                        <td>
                                            @if ($a->status == 'Pending')
                                                <a href="{{ url('approve_appointment') }}/{{ $a->id }}"
                                                    class="btn btn-success">Confirm</a>
                                                <a href="{{ url('reject_appointment') }}/{{ $a->id }}" class="btn btn-danger">Reject</a>
                                            @else
                                                <span class="text-success"><b>Confirmed!!</b></span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>

        </div>

    </center>
</body>

</html>
