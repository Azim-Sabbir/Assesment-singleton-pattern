<!DOCTYPE html>
<html lang="en">
<head>
    <title>WP Developers</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/assets/images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
<div style="padding: 100px;">
    <div class="text-center">
        <h4 style="font-weight: bold;">Create An Employee</h4>
    </div>
    <br>
    @if(Session::has('message'))
        <p class="alert alert-danger">{{ Session::get('message') }}</p>
    @endif
    {{--    <form action="/employees" method="post">--}}
    {{ Form::open(array('url' => isset($employee) ? '/employees/'. $employee['id'] : '/employees', 'method'=> isset($employee) ? 'PUT' : 'POST')) }}
    @csrf
    <div class="form-row">
        <div class="col-md-3">
            <label for="">Employee Name</label>
            {{--                <input type="text" class="form-control" placeholder="name" name="name">--}}
            {{Form::text('name', $employee['name'] ?? null, ['class'=>'form-control','placeholder'=>'Enter name'])}}
        </div>
        <div class="col-md-3">
            <label for="">Email(Unique)*</label>
            {{--                <input type="email" class="form-control" placeholder="email" name="email">--}}
            {{Form::text('email', $employee['email'] ?? null, ['class'=>'form-control','placeholder'=>'Enter email(email must be unique)'])}}
        </div>
        <div class="col-md-3">
            <label for="">Age</label>
            {{--                <input type="number" class="form-control" placeholder="Age" name="age">--}}
            {{Form::number('age', $employee['age'] ?? null, ['class'=>'form-control','placeholder'=>'Enter age'])}}
        </div>
        <div class="col-md-3">
            <label for="">Experience</label>
{{--            <input type="number" class="form-control" placeholder="Experience" name="experience">--}}
            {{Form::number('experience', $employee['experience'] ?? null, ['class'=>'form-control','placeholder'=>'Enter experience'])}}
        </div>
    </div>
    <br>
    <div>
        <button type="submit" class="btn btn-success">Save</button>
        &nbsp;
        <a href="/employees" class="btn btn-info">Go to list</a>
    </div>
    {{ Form::close() }}
    {{--    </form>--}}
</div>

</body>
</html>
