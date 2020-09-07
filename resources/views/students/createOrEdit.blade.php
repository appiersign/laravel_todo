<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<main class="container">
    @if($errors->any())
        <div class="row">
            <div class="alert alert-danger container">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        </div>
    @endif
    <div class="row">
        <div class="container">
            <h1 class="text-center">Create Student</h1>
        </div>
    </div>
    <div class="row">
        <form action="/students" class="container" method="post">
            @csrf
            <div class="row">
                <div class="col-6 form-group">
                    <label for="first_name">First Name:</label>
                    <input id="first_name" name="first_name" type="text" class="form-control" placeholder="Kofi">
                </div>
                <div class="col-6 form-group">
                    <label for="last_name">Last Name:</label>
                    <input id="last_name" name="last_name" type="text" class="form-control" placeholder="Mintah">
                </div>
            </div>
            <div class="row">
                <div class="col-6 form-group">
                    <label for="age">Age:</label>
                    <input id="age" name="age" type="number" class="form-control" placeholder="12">
                </div>
                <div class="col-6 form-group">
                    <label for="gender">Gender:</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="" disabled selected>choose gender</option>
                        <option value="m">male</option>
                        <option value="f">female</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-6"></div>
                <div class="col-6">
                    <button class="btn btn-primary">
                        save
                    </button>
                </div>
            </div>
        </form>
    </div>
</main>
</body>
</html>
