<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Calculator Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        div.A {
            border-style: groove;
            border-color: black;
            padding: 20px;
            margin: 30px auto;
            max-width: 800px; 
        }
    </style>
</head>
<body class="bg-info p-1 mx-auto">
    <div class="A">
        <section class="container bg-warning p-2 my-3 text-Red">
            <h1 align="center">Edit Calculator Data</h1>
        </section>
        <section class="container bg-warning p-4">
            <form action="/calculator/form/{{$data->id}}" method="post">
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="pure-input-rounded"><h5>Enter A : </h5></label>
                    <input type="text" name="a" class="form-control" id="formGroupExampleInput" value="{{$data->a}}">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="pure-input-rounded"><h5>Enter B : </h5></label>
                    <input type="text" name="b" class="form-control" id="formGroupExampleInput2" value="{{$data->b}}">
                </div>
                <div class="mb-3">
                    <label for="inputState" class="pure-input-rounded"><h5>Operation :</h5></label>
                    <select id="inputState" name="opr" class="form-select">
                        <option value="add" @if($data->opr == 'add') selected @endif>Addition</option>
                        <option value="subtract" @if($data->opr == 'subtract') selected @endif>Subtraction</option>
                        <option value="multiply" @if($data->opr == 'multiply') selected @endif>Multiplication</option>
                    </select>
                </div>
                <div class="mb-3 mb-auto">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </section>
    </div>
</body>
</html>
