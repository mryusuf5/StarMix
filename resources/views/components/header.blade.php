<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e0462e4fee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
    <title>Star mix</title>
    @yield("styles")
</head>
<body data-bs-theme="dark">
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto d-none d-lg-block col-xl-2 px-0 bg-dark" style="border-right: 1px solid #ffc107">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-2 pt-2 text-white min-vh-100">
                <a href="/" class="py-3 d-flex justify-content-center w-100">
                    <span class="fs-5 ">
                        <img src="{{asset("img/logo.png")}}" width="50">
                    </span>
                </a>
                <ul class="nav nav-pills flex-column align-items-center align-items-sm-start border
                border-warning w-100 p-2 rounded-4 mb-2" id="menu">
                    <li class="nav-item">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#addSongModal"
                           class="nav-link text-white align-middle px-0">
                            <i class="fa-solid fa-plus"></i> <span class="ms-1 d-none d-sm-inline">Add song</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white align-middle px-0">
                            <i class="fa-solid fa-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white align-middle px-0">
                            <i class="fa-solid fa-magnifying-glass"></i> <span class="ms-1 d-none d-sm-inline">Search</span>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start border
                border-warning w-100 p-2 rounded-4" id="menu">
                    <div class="d-flex justify-content-between w-100 fs-4">
                        <span>
                            <i class="fa-solid fa-book"></i> Your library
                        </span>
                        <span><i class="fa-solid fa-plus"></i></span>
                    </div>
                    <div class="w-100 border border-warning my-1"></div>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white align-middle px-0">
                            <i class="fa-solid fa-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                       id="dropdownUser1" data-bs-toggle="dropdown">
{{--                        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">--}}
                        <div class="rounded-circle border border-white fs-2 d-flex align-items-center
                        justify-content-center" style="width: 50px; height: 50px">
                            {{ucfirst(Session::get("user")->username[0])}}
                        </div>
                        <span class="d-none d-sm-inline mx-1">{{Session::get("user")->username}}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{route("logout")}}">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col py-3 bg-dark" style="min-height: 100vh">
            {{$slot}}
        </div>
    </div>
</div>
