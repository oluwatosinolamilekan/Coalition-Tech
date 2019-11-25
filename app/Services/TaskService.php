<?php

namespace App\Services;
use App\Models\Task;
use Carbon\Carbon;
use DB;
class TaskService
{
    public function allTask()
    {
       $allTasks = Task::latest()->paginate(15);
       return $allTasks;
    }

    public function createTask($request)
    {
        $storeTask = Task::create([
            'name' => $request->name,
            'priority' => $request->priority,
            'created_at' => Carbon::now()
        ]);

        DB::beginTransaction();
        if ($storeTask) {
            DB::commit();
            return true;
        }else{
            DB::rollback();
            return false;
        }
    }

    public function showTask($id)
    {
        $findTask  = Task::find($id);
        return $findTask;
        
    }
    public function editTask($request,$id)
    {
        $storeTask = Task::where('id',$id)->update([
            'name' => $request->name,
            'priority' => $request->priority,
            'updated_at' => Carbon::now()
        ]);

        DB::beginTransaction();
        if ($storeTask) {
            DB::commit();
            return true;
        }else{
            DB::rollback();
            return false;
        }
    }

    public function deleteTask($id)
    {
        $findTask  = Task::find($id)->delete();
        return $findTask;
    }
}