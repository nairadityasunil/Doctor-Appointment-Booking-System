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
        <div class="card my-3 login-card w-50 shadow-sm">
            <div class="card-body overflow-auto">
                <h4 class="text-center">Add New Appointment</h4>

                <!-- Display the error message if it exists in the session -->
                @if (session('status'))
                    <div class="error-message">
                        {{ session('status') }}
                    </div>
                @endif

                <form action="{{route('save_appointment')}}" class="my-4" method="POST">

                    @csrf <!-- CSRF Token for security -->
                    <div class="form-group mb-3">
                        {{-- <label for="username" class="form-label"> </label> --}}
                        <textarea name="symptoms" id="" cols="95" rows="3" placeholder="Symptoms and when it started"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="username" class="form-label"> Appointment Date : </label>
                        <input type="date" name="appointment_date" class="form-control" id="username" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="username" class="form-label">Doctor Name :</label>
                        <select class="form-control form-control-lg" name="doctor">
                            <option>Select Doctor</option>
                            @foreach ($doctors as $d)
                                <option value="{{$d->name}}">{{$d->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" id="submit_btn" class="btn btn-success">Book Appointment</button>
                    </div>
                </form>
                <a href="{{route('all_appointments')}}">
                    <button type="submit" id="submit_btn" class="btn btn-danger">All Appointments</button>
                </a>
                <a href="{{route('update_patient')}}" class="btn btn-dark">Update Details</a>
            </div>
        </div>

    </center>
</body>

</html>

