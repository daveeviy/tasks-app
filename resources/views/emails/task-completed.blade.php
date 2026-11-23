<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Task Completed</title>
</head>
<body>
    <h2>Task Marked as Done</h2>
    <p><strong>Title:</strong> {{ $task->title }}</p>
    <p><strong>Description:</strong> {{ $task->description ?? 'No description provided.' }}</p>
    <p><strong>Status:</strong> {{ strtoupper($task->status) }}</p>
</body>
</html>