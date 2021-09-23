<!DOCTYPE html>
<html lang="en">
<head>
    <title>WP Developers</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/assets/images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <style>
        table, tbody, tr, td {
            text-align: center;
        }

        table, thead, tr, th {
            text-align: center;
        }
    </style>
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        * {box-sizing: border-box;}

        .form-inline {
            display: flex;
            flex-flow: row wrap;
            align-items: center;
        }

        .form-inline label {
            margin: 5px 10px 5px 0;
        }

        .form-inline input {
            vertical-align: middle;
            margin: 5px 10px 5px 0;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ddd;
        }

        .form-inline button {
            padding: 10px 20px;
            background-color: dodgerblue;
            border: 1px solid #ddd;
            color: white;
            cursor: pointer;
        }

        .form-inline button:hover {
            background-color: royalblue;
        }

        @media (max-width: 800px) {
            .form-inline input {
                margin: 10px 0;
            }

            .form-inline {
                flex-direction: column;
                align-items: stretch;
            }
        }
    </style>
</head>
<body>
<div style="padding: 100px;">
    <div class="text-center">
        <h4 style="font-weight: bold;">Employee Table</h4>
    </div>
    <br>

    <div class="row" style="padding: 50px;">
        <div class="col-md-6">
            <a href="/employees/crate" class="btn btn-info">Add New Employee</a>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <form class="form-inline" action="/employees" method="get">
                    <input type="text" placeholder="Search Employee" name="search_data">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <p>NB: you can search by name/age/email etc by changing the builder classes in the employee controller(index method)</p>
        </div>
    </div>
    <br>
    <table class="table">
        @if(Session::has('message'))
            <p class="alert alert-success">{{ Session::get('message') }}</p>
        @endif
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email(unique)</th>
            <th scope="col">Age</th>
            <th scope="col">Years Of Exp</th>
            <th scope="col" style="text-align: center">Action</th>
        </tr>
        </thead>
        <tbody>
        @php $sl=1; @endphp
        @foreach($employees as $data)
            <tr>
                <th scope="row">{{$sl++}}</th>
                <td>{{$data['name']}}</td>
                <td>{{$data['email']}}</td>
                <td>{{$data['age']}}</td>
                <td>{{$data['experience']}}</td>
                <td>
                    <a href="/employees/{{$data['id']}}/edit" class="btn btn-sm btn-info">Edit</a>
                    <a href="/employees/{{$data['id']}}/delete" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>


<script src="/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
