<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Tasks for Today</title>
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

    <h1>About Tasks for Today</h1>
    <p>Tasks for Today Management System supports full task CRUD, soft archiving via <code>is_archived</code>, authentication protection for management actions, and automatic email notifications when a task changes to done.</p>
</body>
</html>