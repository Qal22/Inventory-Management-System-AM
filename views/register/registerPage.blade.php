<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="/css/style.css">
        <title>Home</title>

        <style>
            body {
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0;
            }
        </style>
    </head>
    <body class="bg-dark-subtle">
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <main class="form-registration w-100 m-auto">
                        <img class="mb-4 mx-auto d-block" src="{{ asset('img/logo.png') }}" alt="" width="150">
                        <h1 class="h3 mb-3 fw-normal text-center">Registration</h1>
                        <form action="/register" method="post">
                            @csrf
                            <div class="form-floating">
                                <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror" name="name" id="name" placeholder="Full Name" value="{{ old('name') }}" required>
                                <label for="name">Full Name</label>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                                <label for="email">Email address</label>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required>
                                <label for="password">Password</label>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" required>
                                <label for="confirmpassword">Confirm Password</label>
                                @error('confirmpassword')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                            
                            <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Register</button>
                        </form>
                        <small class="d-block mt-3">Already registered? <a href="/login">Log in here</a></small>
                    </main>
                </div>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>