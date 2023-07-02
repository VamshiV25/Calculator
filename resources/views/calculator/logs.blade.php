<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator Logs Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        div.A {
        border-style: groove;
        border-color:black;
        padding:20px;
        margin:20px;
        margin-top:50px;
        margin-left:200px;
        margin-right:200px;
        }
    </style>
</head>
<body class="bg-info p-4 mx-auto">
    <div class="A">
        <section class="container bg-warning p-3">
            <h1 align="center">Calculator logs</h1>
        </section> 
        <br>
        <section class="container bg-warning p-4 ">
        
        <table class="table table-hover table-warning">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">a</th>
                <th scope="col">b</th>
                <th scope="col">opr</th>
                <th scope="col">result</th>
                <th scope="col">created</th>
                <th scope="col">updated</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                <tr>
                    <th scope="row">{{$d->id}}</th>
                    <td>{{$d->a}}</td>
                    <td>{{$d->b}}</td>
                    <td>{{$d->opr}}</td>
                    <td>{{$d->result}}</td>
                    <td>{{$d->created_at}}</td>
                    <td>{{$d->updated_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <a class="btn btn-primary" href="/calculator/form">Back To Form</a>

         </section>
    </div>
</body>
</html>