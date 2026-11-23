<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List - Tasks for Today</title>
</head>
<body>
    <nav>
        <a href="{{ route('welcome') }}">Welcome</a> |
        <a href="{{ route('tasks.index') }}">Task List</a> |
        <a href="{{ route('profile.public') }}">Profile</a> |
        <a href="{{ route('about') }}">About</a> |
        @auth
            <a href="{{ route('tasks.create') }}">Create Task</a> |
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit">Log Out</button>
            </form>
        @else
            <a href="{{ route('login') }}">Log In</a>
            <a href="{{ route('register') }}">Register</a>
        @endauth
    </nav>

    <h1>Tasks for Today</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @auth
        <p><a href="{{ route('tasks.create') }}">+ Create New Task</a></p>
    @endauth

    @if ($tasks->isEmpty())
        <p>No active tasks found.</p>
    @else
        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ strtoupper($task->status) }}</td>
                        <td>
                            @auth
                                <a href="{{ route('tasks.edit', $task) }}">Edit</a>
                                <form method="POST" action="{{ route('tasks.destroy', $task) }}" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Archive this task?')">Archive</button>
                                </form>
                            @else
                                <span>Login required to manage</span>
                            @endauth
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>