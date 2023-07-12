<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        @if (isset($message)){
            <div>
                <h1><center>@php
                    echo($message);
                @endphp
                </center></h1>
            </div>
        }
        @endif

      
            <div>
                <h1><center>
                welcome user {{ $ResUserInfo['resident_fName']}}    
                </center></h1>
            </div>
           
      
       <div>
        <a href="{{route('logout')}}">logout</a>
       </div>
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
      @foreach ($deps as $dep)
      <form action="{{ route('departments.destroy', $dep->department_id) }}" method="POST">
        @csrf
        @method('DELETE')
        <h1>department ID: @php
                                echo($dep->department_id);
                            @endphp
        </h1>
        
        <h1>delete department</h1>
  

        <button type="submit">delete
        </button>
    </form>
    <form action="{{ route('departments.edit', $dep->department_id) }}" method="POST">
        @csrf
        
        <h1>edit department</h1>
  

        <button type="submit">edit
        </button>
    </form>
      @endforeach
        
        </div>
</body>
</html>