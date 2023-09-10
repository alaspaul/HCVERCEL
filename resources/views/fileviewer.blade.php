<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>hello look at the files</h1>
        @foreach ($files as $file)
        <iframe src="{{url($file_path)}}"></iframe>
        @endforeach
    
    </div>

    <br><br><br>
        
        </div>
</body>
</html>