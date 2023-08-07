<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>Todos</title>
    <link rel="stylesheet" href="{{ asset("assets/bootstrap/dist/css/bootstrap.min.css")}}">
    <script src="{{ asset("assets/bootstrap/dist/js/bootstrap.min.js")}}"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    @yield("js")
    @yield("css")
</head>
    <div>
        <h1>Todos</h1>
        <ul>
            @foreach ($todos as $todo)
                <li>
                    <form method="POST" action="{{ route('todo.update', ['todo' => $todo->id]) }}" style="display: inline-block">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <input type="text" name="task" value="{{ $todo->task }}" required>
                        <input type="date" name="dueDate" value="{{$todo->dueDate}}">
                        <button class="btn btn-warning" type="submit">Update To-do </button>
                    </form>
                    <form action="{{ route('todo.update', ['todo' => $todo->id]) }}" style="display: inline-block" method="POST">
                        @csrf
                        @method('PUT')
                        <button name="status" class="{{ $todo->status ? 'btn btn-success' : 'btn btn-danger' }}" type="submit" value="{{ $todo->status ? 'false' : 'true' }}">
                            {{ $todo->status ? 'Done' : 'Undone' }}
                        </button>
                    </form>
                    
                    <form method="POST" action="{{ route('todo.destroy', ['todo' => $todo->id]) }}" style="display: inline-block">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger" onclick="return confirm('Are you sure about deleting this task')" type="submit"> Delete</button>
                    </form> 
                </li>
            @endforeach

            <form method="POST">
                @csrf
                <input type="text" name="task" required autofocus>
                <input type="date" name="dueDate" id="'dueDate" class="dueDate" required  >
                <button class="btn btn-success" type="submit">add</button>
                @if($errors->has('dueDate'))
                    <div style="" class="error"><script>alert("{{ $errors->first('dueDate') }}")</script></div>
                @endif
               
            </form>
        </ul>
    </div>
  
   </body>
</html>
