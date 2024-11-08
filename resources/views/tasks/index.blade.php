@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="ion ion-clipboard mr-1"></i>
                To Do List
            </h3>


        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <ul class="todo-list" data-widget="todo-list">
                @foreach ($tasks as $task)
                    <li>
                        <!-- drag handle -->
                        <span class="handle">
                            <i class="fas fa-ellipsis-v"></i>
                            <i class="fas fa-ellipsis-v"></i>
                        </span>
                        <!-- checkbox -->
                        <form action="{{ route('tasks.toggleCompletion', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <input type="checkbox" name="completed" id="todoCheck{{ $task->id }}"
                                   value="1" {{ $task->completed ? 'checked' : '' }}
                                   onchange="this.form.submit();">
                            <label for="todoCheck{{ $task->id }}"></label>
                        </form>
                        <span class="text" style="{{ $task->completed ? 'text-decoration: line-through;' : '' }}">{{ $task->title }}</span>
                        <!-- todo text -->
                        <span class="text">{{ $task->title }}</span>
                        <!-- Emphasis label -->
                        <small class="badge badge-info"><i class="far fa-clock"></i> assigned on
                            {{ $task->duedate }}</small>
                        <!-- General tools such as edit or delete-->
                        <div class="tools">
                            <a href="{{ route('tasks.show', $task->id) }}"><i class="fas fa-edit" title="show Task"></i>
                            </a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link text-danger p-0"
                                    onclick="return confirm('Are you sure you want to delete this task?');"
                                    title="Delete Task">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                @endforeach
        </div>

        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <a type="button" class="btn btn-primary float-right" href="{{ route('tasks.create') }}"><i
                    class="fas fa-plus"></i> Add
                item</a>
        </div>
    </div>


    </div>
    </div>
@endsection
