<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <form action="{{ route('departments.store') }}" method="post">
        @csrf
        <h1>add in department</h1>
        <input type="text" name="department_id" id="">


        <input type="text" name="department_name" id="">

        <button type="submit">insert
        </button>
    </form>
    </div>

    <br><br><br>

    <div>
      
        <form action="{{ route('departments.destroy, $dep') }}" method="DELETE">
            @csrf
            <h1>delete department</h1>
      
    
            <button type="submit">delete
            </button>
        </form>
        </div>
</body>
</html>