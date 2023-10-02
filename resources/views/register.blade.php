<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Star mix</title>
</head>
<body class="bg-dark">
<div class="container d-flex flex-column justify-content-center align-items-center" style="height: 80vh">
    @if($message = Session::get("error"))
        <div class="alert alert-danger">
            <h3>{{$message}}</h3>
        </div>
    @endif
    <form action="{{route("register")}}" method="post" class="w-50 bg-dark p-2 rounded-4 d-flex flex-column
    align-items-center">
        @csrf
        @method("POST")
        <img src="{{asset("img/logo.png")}}" width="150" />
        <br>
        <div class="form-floating w-100">
            <input type="text" placeholder="Username" class="form-control" name="username">
            <label>Username</label>
            @error("username")<span class="text-danger">{{$message}}</span>@enderror
        </div>
        <br>
        <div class="form-floating w-100">
            <input type="password" placeholder="Password" class="form-control" name="password">
            <label>Password</label>
            @error("password")<span class="text-danger">{{$message}}</span>@enderror
        </div>
        <br>
        <div class="form-floating w-100">
            <input type="password" placeholder="Repeat password" name="repeatPassword" class="form-control">
            <label>Repeat password</label>
            @error("repeatPassword")<span class="text-danger">{{$message}}</span>@enderror
        </div>
        <br>
        <input type="submit" value="Register" class="btn btn-warning w-100 text-white">
    </form>
    <a href="{{route("loginView")}}">Already have an account?</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
