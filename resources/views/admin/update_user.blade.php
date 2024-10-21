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
                <h4 class="text-center">Admin Update</h4>

                <!-- Display the error message if it exists in the session -->
                @if (session('status'))
                    <div class="error-message">
                        {{ session('status') }}
                    </div>
                @endif

                <form action="{{ route('save_admin_update') }}" method="POST">
                    @csrf <!-- CSRF Token for security -->
                    <div class="form-group mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" value="{{$user1->username}}" name="username" class="form-control" id="username" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" id="submit_btn" class="btn btn-dark">Update Details</button>
                    </div>
                </form>
            </div>
        </div>

    </center>
</body>

</html>
