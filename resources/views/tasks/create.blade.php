<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task - Tasks for Today</title>
</head>
<body>
    <h1>Create Task</h1>
    <p><a href="{{ route('tasks.index') }}">Back to Task List</a></p>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf

        <div>
            <label for="title">Title</label><br>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
        </div>
        <br>

        <div>
            <label for="description">Description</label><br>
            <textarea id="description" name="description" rows="4">{{ old('description') }}</textarea>
        </div>
        <br>

        <div>
            <label for="status">Status</label><br>
            <select id="status" name="status" required>
                <option value="pending" {{ old('status', 'pending') === 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="done" {{ old('status') === 'done' ? 'selected' : '' }}>Done</option>
            </select>
        </div>
        <br>

        <button type="submit">Save Task</button>
    </form>
</body>
</html>