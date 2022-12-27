<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Perpus | @yield('title')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet"/>
    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css"
    rel="stylesheet"
    />
</head>

<body>
    <style>
        .main{
            height: 100vh;
        }
        .body-content{
            color: #000;
        }
        .sidebar{
            background: rgb(75, 75, 75);
            color: white;
        }
        .sidebar a{
            color: white;
            text-decoration: none;
            display: block;
            padding: 15px 10px;
        }
        .sidebar a:hover{
            background: #000;
        }
        .active{
            background: #000;
            border-right: solid 10px rgb(59, 113, 202);
        }
    </style>

    <div class="main d-flex flex-column justify-content-between">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">myPerpus</a>
                <button
                class="navbar-toggler"
                type="button"
                data-mdb-toggle="collapse"
                data-mdb-target="#navbarTogglerDemo03"
                aria-controls="navbarTogglerDemo03"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
                </button>
            </div>
        </nav>
        <div class="body-content h-100">
            <div class="row g-0 h-100">
                <div class="sidebar col-lg-2 collapse d-lg-block" id="navbarTogglerDemo03">
                        @if (Auth::user() -> role_id ==1) 
                            <a href="dashboard" @if (request()->route()->uri == 'dashboard') class='active'@endif>Dashboard</a>
                            <a href="books" @if (request()->route()->uri == 'books') class='active'@endif>Books</a>
                            <a href="categories" @if (request()->route()->uri == 'categories') class='active'@endif>Categories</a>
                            <a href="users" @if (request()->route()->uri == 'users') class='active'@endif>Users</a>
                            <a href="rentLogs" @if (request()->route()->uri == 'rentLogs') class='active'@endif>Rent Logs</a>
                            <a href="logout">Logout</a>
                        @else
                            <a href="profile" @if (request()->route()->uri == 'profile') class='active'@endif>Profile</a>
                            <a href="logout">Logout</a>
                        @endif
                </div>
                <div class="content col-lg-10 p-5">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"></script>
</body>
</html>