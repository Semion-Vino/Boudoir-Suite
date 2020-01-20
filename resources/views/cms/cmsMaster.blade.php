<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Admin Panel</title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('lib/winkel/css/cms.css')}}">
    <script>
        var BASE_URL = "{{url('')}}/"

    </script>

</head>

<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{url('cms/dashboard')}}">Boudoir | Admin Panel</a>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="{{url('user/logout')}}">Log out</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="{{url('cms/dashboard')}}">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{url('cms/menu')}}">
                                Menu
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{url('cms/content')}}">
                                Content
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{url('cms/subcategories')}}">
                                Subcategories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{url('cms/products')}}">
                                Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{url('cms/orders')}}">
                                Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <hr>
                            <a class="nav-link " target="_blank" href="{{url('')}}">
                                Back to site
                            </a>
                        </li>

                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

                @yield('cms-content')





            </main>
        </div>
    </div>

    <script src="{{asset('lib/winkel/js/jquery.min.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>

    <script src="{{asset('lib/winkel/js/main.js')}}"></script>
    <script src="{{asset('js/cmsscript.js')}}"></script>
</body>

</html>
