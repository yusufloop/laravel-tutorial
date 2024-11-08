@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Task</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Task Title</label>
                        <input type="name" class="form-control" id="exampleInputEmail1" placeholder="Enter email"
                            value="{{ $task->title }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Task description</label>
                        <textarea type="description" class="form-control" id="description" placeholder="Enter email">{{ $task->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="type">Task type</label>
                        <input type="name" class="form-control" id="type" placeholder="Enter email"
                            value="{{ $task->type }}">
                    </div>
                    <div class="form-group">
                        <label for="duedate">Task duedate</label>
                        <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Enter email"
                            value="{{ $task->duedate }}">
                    </div>

                    <div>
                        <a class="btn btn-warning" href="{{ route('tasks.edit', $task->id) }}">Edit</a>
                    </div>
                </div>
                <!-- /.card-body -->


            </form>
        </div>
        <!-- /.card -->


    </div>
</div>
@endsection
