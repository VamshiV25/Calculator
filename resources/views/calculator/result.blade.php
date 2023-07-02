<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator Result Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        div.A {
        border-style: groove;
        border-color:black;   
        margin : 100px;
        padding-left: 50px;
        padding-right: 50px;
        }
    </style>
</head>
<body class="bg-warning p-2">
    <div class="A">
   <section class="container bg-body-tertiary p-3 mx-auto my-5">
        <h1 align="center">Calculator Result</h1>
        <hr><div align="center">
        <div class="mb-2"><h6>The Value Of A is <span class="text-danger">{{$a}}</span></h6></div>
        <div class="mb-2"><h6>The Value Of B is <span class="text-danger">{{$b}}</span></h6></div>
        <div class="mb-2"><h6>The Operation is <span class="text-danger">{{$opr}}</span></h6></div>
        </div><hr>
        <div align="center" class="mb-2"><h5>The Result is <span class="text-danger">{{$result}}</span></h5></div>
        <br>
        <div align="center">
        <a class="btn btn-primary" href="/calculator/form">Back To Home</a>
        </div>
   </section>
   </div>
</body>
</html>