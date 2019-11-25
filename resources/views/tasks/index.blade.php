@extends('layouts.master')
@section('content')
<div class="row">
   <div class="col-sm-3 col-md-8">
       @if(count($tasks) > 0)
      <table class="table table-striped" id="table">
         <thead>
            <tr>
               <th scope="col">Task Name</th>
               <th scope="col">Task Priority</th>
               <th scope="col">Task Created Date</th>
               <th scope="col">Edit</th>
               <th scope="col">Delete</th>
            </tr>
         </thead>
         <tbody>
            @foreach($tasks as $key => $task)
            <tr>
               <td>{{$task->name}}</td>
               <td>{{$task->priority}}</td>
               <td>
                  {{ Carbon\Carbon::parse($task->created_at)->toDayDateTimeString() }}
               </td>
               <td>
                   <a href="#myModal{{$task->id}}" data-toggle="modal" class="btn btn-primary">Edit</a>
               </td>
               <td>
                   <a href="{{route('task.delete',$task->id)}}" class="btn btn-danger" onclick="return(confirm('Are You sure?'))">Delete</a>
               </td>
               
            </tr>
            @include('tasks.edit')
            @endforeach
         </tbody>
      </table>
      {{$tasks->render()}}
      @else
        <span>No Task Available</span>
      @endif
   </div>
   <div class="col-sm-9 col-md-4">
       <h2>Add New Product</h2>
       <br>
      @include('tasks.create')
   </div>
</div>
@endsection

@section('script')
    
@endsection