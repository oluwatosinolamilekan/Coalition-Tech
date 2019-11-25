           <!--  Modal content for the above example -->
           <div class="modal fade bs-example-modal-lg" id="myModal{{$task->id}}">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title mt-0" id="myLargeModalLabel">
                      {{-- {{$item->name}} --}}
                      </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span aria-hidden="true">&times;</span>

                      </button>
                    </div>
                    <div class="modal-body">
                         {{-- content --}}
                         <div class="form-group">
                            <form method="post" action="{{route('task.update',$task->id)}}">
                                        @csrf
                                    <div class="form-group">
                                        <label for="">Task Name</label>
                                        <input type="text" class="form-control"  name="name"  value="{{$task->name}}" required placeholder="Enter Product Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Task Priority</label>
                                        <input type="text" class="form-control" name="priority"   value="{{$task->priority}}" required placeholder="Enter Priority">
                                    </div>
                                    <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->