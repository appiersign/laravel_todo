<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    {{--    <link rel="stylesheet" href="{{ asset('css/style.css') }}">--}}
    <link rel="stylesheet" href="">
    <title>Welcome</title>
</head>
<body>
<main class="container pt-5">
    @if(session()->has('success'))
        <div class="row">
            <div class="alert alert-success container">
                {{ session('success') }}
            </div>
        </div>
    @endif
    <div class="row mt-5">
        <div class="col-8">
            <h1 class="text-center">In The Index of Students</h1>
        </div>
        <div class="col-4">
            <a href="{{ route('students.create') }}" class="btn btn-warning">add new student</a>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="container">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>Birthday</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($students) === 0)
                            <tr>
                                <td colspan="5" class="text-center">no data found!</td>
                            </tr>
                        @endif
                        @foreach($students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->first_name }}</td>
                                <td>{{ $student->last_name }}</td>
                                <td>{{ $student->gender }}</td>
                                <td>{{ $student->birthday }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
