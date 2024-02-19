<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Login</title>
    <style>
        body {
            margin-top: 50px;
        }
        h3 {
            margin-bottom: 40px;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
        }
        input {
            margin-bottom: 30px;
        }
        button.btn {
            width: 400px;
        }
    </style>
</head>
<body">
    <h3 class="text-center">Login</h3>
    <div class="container">
    <form  method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
          {{-- <label for="email" class="form-label">Email</label> --}}
          <input type="email" class="form-control form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="email" placeholder="email">
            @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
            @enderror
        </div>
        <div class="mb-3">
          {{-- <label for="password"  class="form-label" >Password</label> --}}
          <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" id="password" placeholder="password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
</body>
</html