<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        @foreach ($department as $dep)
        <form action="{{ route('departments.updateDep', $dep->department_id) }}" method="Post">
            @csrf
            <h1>edit Department</h1>
    
            <input type="text" name="department_name" placeholder="@php    echo($dep->department_name); @endphp">
    
            <button type="submit">UPDATE
            </button>
        </form>
        @endforeach
    
    </div>

    <br><br><br>
        
        </div>
</body>
</html>