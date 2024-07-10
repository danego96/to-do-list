<div class="container mt-5">
    <h1 class="text-center mb-4">To Do List</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form id="todo-form" method="POST" action="{{route('task.store')}}">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" name="name" class="form-control"
                                   id="todo-input"
                                   placeholder="Add new task"
                                required>
                            <button class="btn btn-primary" type="submit">
                                  Add
                              </button>
                        </div>
                    </form>
                    <ul class="list-group" id="todo-list">
@foreach ( $tasks as $task)
    {{$task -> name}}
@endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>