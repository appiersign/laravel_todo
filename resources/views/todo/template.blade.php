<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <div class="row pt-5">
        <div class="container bg-secondary">
            <h1 class="text-white">@yield('header')</h1>
        </div>
    </div>
    @if(session('success'))
        <div class="row pt-5">
            <div class="container">
                <div class="alert alert-success">
                    <p>{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif
    @if($errors->any())
        <div class="row pt-5">
            <div class="container">
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <div class="row pt-5">
        <div class="container px-0">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>

