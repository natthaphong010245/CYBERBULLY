<!DOCTYPE html>
<html>
<head>
    <title>Todo List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Todo List</h1>
        
        <form action="{{ route('todos.store') }}" method="POST" class="mb-3">
            @csrf
            <div class="input-group">
                <input type="text" name="title" class="form-control" placeholder="Add new todo">
                <button class="btn btn-primary">Add</button>
            </div>
        </form>

        <ul class="list-group">
            @foreach($todos as $todo)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $todo->title }}
                <form action="{{ route('todos.destroy', $todo) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </li>
            @endforeach
        </ul>
    </div>
</body>
</html>