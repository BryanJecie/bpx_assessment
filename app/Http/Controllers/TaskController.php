<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TaskController extends Controller
{
    protected Task $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = $this->task->all();

        return response()->json([
            'data' => $tasks,
            'message' => 'Tasks retrieved successfully'
        ]);
    }

    /**
     * Make task as complete.
     */
    public function complete(Request $request, string $id)
    {
        $task = $this->task->find($id);

        if (!$task) {
            throw new ValidationException('Task not found');
        }

        $task->is_completed = true;
        $task->save();

        return response()->json([
            'data' => $task,
            'message' => 'Tasks has successfully completed'
        ]);
    }
}
