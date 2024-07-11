<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="container mt-5">
                    <h1 class="text-center mb-4">To Do List</h1>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <form id="todo-form" method="POST" action="{{ route('task.store') }}">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <input type="text" name="name" class="form-control"
                                                id="todo-input" placeholder="Add new task" required>
                                            <button class="btn btn-primary" type="submit">
                                                Add
                                            </button>
                                        </div>
                                    </form>
                                    @foreach ($tasks as $task)
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="task-text">{{ $task->name }}</span>
                                            <input type="text" class="form-control edit-input"
                                                style="display: none;" value="{{ $task->name }}">
                                            <div class="btn-group" role="group">
                                                <form action="{{ route('task.destroy', $task->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm delete-btn"
                                                        type="submit">✕</button>
                                                </form>
                                                <button class="btn btn-primary btn-sm edit-btn" data-toggle="modal"
                                                    data-target="#editModal_{{ $task->id }}"
                                                    data-task-id="{{ $task->id }}"
                                                    value="{{ $task->id }}">✎</button>
                                            </div>
                                            <div class="modal fade" id="editModal_{{ $task->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel">Edit task
                                                            </h5>
                                                        </div>
                                                        <form action="{{ route('task.update', $task->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <input type="text" name="name"
                                                                    class="form-control" id="todo-input"
                                                                    value="{{ $task->name }}" required>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script>
    $(document).ready(function() {
        $(document).on('click', '.edit-btn', function() {
            var task_id = $(this).data('task-id');
            $('#editModal_' + task_id).modal('show');
        });
        $(document).on('click', '.btn-secondary', function() {
            $(this).closest('.modal').modal('hide');
        });
    });
</script>
@endpush