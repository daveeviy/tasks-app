<?php

namespace App\Http\Controllers;

use App\Mail\TaskCompletedMail;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('is_archived', false)->latest()->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'status' => ['required', 'in:pending,done'],
        ]);

        $task = Task::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'status' => $validated['status'],
            'is_archived' => false,
        ]);

        if ($task->status === 'done') {
            $recipient = config('mail.from.address', 'test@example.com');
            Mail::to($recipient)->send(new TaskCompletedMail($task));
        }

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'status' => ['required', 'in:pending,done'],
        ]);

        $wasDone = $task->status === 'done';

        $task->update([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'status' => $validated['status'],
        ]);

        if (! $wasDone && $task->status === 'done') {
            $recipient = config('mail.from.address', 'test@example.com');
            Mail::to($recipient)->send(new TaskCompletedMail($task));
        }

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->update(['is_archived' => true]);

        return redirect()->route('tasks.index')->with('success', 'Task archived successfully.');
    }
}