<?php

namespace App\Http\Controllers;
use App\Services\TaskService;
use App\Http\Requests\StoreTaskrequest;
use App\Http\Requests\UpdateTaskrequest;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private $task;

    public function __construct(TaskService $task)
    {
        $this->task = $task;
    }

    public function index()
    {
        $tasks = $this->task->allTask();
        return view('tasks.index',compact('tasks'));
    }

   
    public function store(StoreTaskrequest $request)
    {
        try {
            $validator = $request->validated();
            if($validator){
                $storeTask = $this->task->createTask($request);
                if ($storeTask == true) {
                    return back()->with('success','Task Added Successfully');
                }
            }
        } catch (\Exception $e) {
            return back()->with('error',$e->getMessage());
        }
    }

    public function edit()
    {
        $task = $this->task->showTask();
       return view('tasks.edit',compact('task'));
    }

    public function update(UpdateTaskrequest $request, $id)
    {
        try {
            $validator = $request->validated();
            if($validator){
                $storeTask = $this->task->editTask($request,$id);
                if ($storeTask == true) {
                    return back()->with('success','Task Updated Successfully');
                }
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
            return back()->with('error',$e->getMessage());
        }
    }

    public function delete($id)
    {
       $deleteTask = $this->task->deleteTask($id);
       return back()->with('success','Task Deleted');
    }
}
