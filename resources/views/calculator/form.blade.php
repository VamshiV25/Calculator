<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator Form Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        div.A {
        border-style: groove;
        border-color:black;
        padding:30px;
        margin:10px;
        margin-top:40px;
        margin-left:200px;
        margin-right:200px;   
        }
    </style>
</head>
<body class="bg-info p-1 mx-auto">
    <div class="A">
    <section class="container bg-warning p-2 my-3 text-Red">
        <h1 align="center">Calculator Form &nbsp;<a href="/calculator/logs"><span class="badge badge-dark"><h1>Logs</h1><span></a></h1>
    </section>
    <marquee behavior="scroll" direction="right" scrollamount="12">click on logs to see calculator logs</marquee>
        <section class="container bg-warning p-4 ">
        <form action="/calculator/result" method="get">
            <div class=" mb-3">
                <label for="formGroupExampleInput" class="pure-input-rounded"><h5>Enter A : </h5></label>
                <input type="text" name="a" class="form-control" id="formGroupExampleInput" placeholder="Enter an integer of value a">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="pure-input-rounded"><h5>Enter B : </h5></label>
                <input type="text" name="b" class="form-control" id="formGroupExampleInput2" placeholder="Enter an integer of value b">
            </div>

            <div class="mb-3">
                <label for="inputState" class="pure-input-rounded"><h5>Operation :</h5></label>
                <select id="inputState" name="opr" class="form-select">
                   <option value="add">Addition</option>
                   <option value="subtract">Substraction</option>
                   <option value="multiply">Multiplication</option>              
                </select>
            </div>
            <div class="mb-3 mb-auto">
                <button type="submit" class="btn btn-success" >Success</button>
            </div>
        </form>
    </section>
    </div>
</body>
</html>