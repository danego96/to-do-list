<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            What do you have for today, {{ Auth::user()->name }}?
        </h2>
    </x-slot>

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
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="task-text">{{ $task->name }}</span>
                                            <input type="text" class="form-control edit-input" style="display: none;" value="{{ $task->name }}">
                                            <div class="btn-group" role="group">
                                                <form action="{{ route('task.destroy', $task->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                <button class="btn btn-danger btn-sm delete-btn" type="submit">✕</button>
                                                </form>
                                                <button class="btn btn-primary btn-sm edit-btn">✎</button>
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
</x-app-layout>
