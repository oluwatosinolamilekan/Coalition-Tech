<div class="form-group">
    <form method="POST" action="{{route('task.store')}}">
        @csrf
        <div class="form-group">
            <label for="">Task Name</label>
            <input type="text" class="form-control"  name="name" required placeholder="Enter Product Name">
        </div>
        <div class="form-group">
            <label for="">Task Priority</label>
            <input type="text" class="form-control" name="priority"  required placeholder="Enter Priority">
        </div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
