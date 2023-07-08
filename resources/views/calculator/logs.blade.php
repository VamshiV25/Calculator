<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator Logs Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        table.table-bordered{
            border:1px solid blue;
            margin-top:20px;
        }
            table.table-bordered > thead > tr > th{
                border:1px solid blue;
        }
            table.table-bordered > tbody > tr > td{
                border:1px solid blue;
        }
        div.A {
                border-style: groove;
                border-color: black;
                padding: 20px;
                margin:200px;
                margin-top:20px;
                margin-bottom:20px;
        }
    </style>
</head>
<body>
    <div class="A">

        @if(request()->get('delete'))
            <div class="alert alert-success" role="alert">
                <div>
                    You Are Trying to Delete one Record({{request()->get('id')}}),Are You Sure..
                </div>
               <form action="/calculator/destroy/{{request()->get('id')}}" method="post">
                @csrf
                <button type="Submit" class="btn btn-danger mt-2">Delete</button>
                <a href="/calculator/logs">
                <button type="button" class="btn btn-secondary mt-2">Cancel</button>
                </a>
                
               </form>
            </div>
        @endif

        <section>
            <h1 align="center">Calculator logs</h1>
        </section>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
            <th scope="col">id</th>
                <th scope="col">a</th>
                <th scope="col">b</th>
                <th scope="col">opr</th>
                <th scope="col">result</th>
                <th scope="col">created</th>
                <th scope="col">updated</th>
                <th scope="col">actions</th>
            </tr>
            </thead>
            <tbody>
            <tbody>
                @foreach($data as $d)
                <tr>
                    <th scope="row"><a href="/calculator/show/{{$d->id}}">{{$d->id}}</a></th>
                    <td>{{$d->a}}</td>
                    <td>{{$d->b}}</td>
                    <td>{{$d->opr}}</td>
                    <td>{{$d->result}}</td>
                    <td>{{$d->created_at}}</td>
                    <td>{{$d->updated_at}}</td>
                    <td>
                            <a href="/calculator/update/{{$d->id}}" class="btn btn-primary mr-3">Edit</a>
                            <!-- <form action="/calculator/destroy/{{$d->id}}" method="post">
                                @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                            </form> -->
                           <a href="?delete=1&id={{$d->id}}" class="btn btn-danger mr-3">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>