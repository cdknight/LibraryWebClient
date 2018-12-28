<html>
    <head>
        <title>{{ $library_name }} | @yield('title')</title>

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- include the bootstrap files-->

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

        <!-- include font awesome-->

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

        <!-- include jquery files -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


    </head>


    <body>
        @section('header')

            <nav class="navbar navbar-expand-sm navbar-dark bg-dark">


                <div class="container-fluid">
                    <a class="navbar-brand text-white" href="/">{{ $library_name }}</a>


                    @if (Session::get('authenticated') == true)

                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbardrop" href="#">My Account</a>

                                <div class="dropdown-menu">

                                    <a class="dropdown-item" href="/user/dashboard">Dashboard</a>
                                    <a class="dropdown-item" href="/user/requests">Requests</a>
                                    <a class="dropdown-item">Items Out</a>
                                    <a class="dropdown-item">Fines and Fees</a>
                                    <a class="dropdown-item">My Info</a>

                                </div>

                            </li>
                        </ul>

                    @endif

                    <!-- quick search widget -->


                    <form class="ml-4 form-inline my-2">
                        <div class="input-group">
                            <input type="text" placeholder="Quick Search" name="search_term" class="form-control">
                            <input type="submit" value="Search" class="ml-2 btn btn-success">
                        </div>
                    </form>




                    <ul class="nav navbar-nav navbar-right ml-md-auto">



                        <li class="nav-item">
                            @if (Session::get('authenticated') == true)
                                <a class="nav-link" href="/logout">Log Out</a>
                            @elseif (!Session::get('authenticated'))
                                <a class="nav-link" href="/login">Log In</a>
                            @endif

                        </li>



                    </ul>

                </div>


            </nav>

        @show

        <div class="container mt-4">
            @if (Session::has('msg'))
                <p class="alert alert-info">{{ session('msg') }}</p>
            @endif

            @yield('content')
        </div>

    </body>

</html>