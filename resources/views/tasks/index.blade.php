 <!DOCTYPE html>
<html lang="en">
<head>
<style>
        #task-input {
            width: 50%;
        }
        .form-control{
            display: inline !important;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<!-- <div class="container mt-5">
<div class="row">
    <div>
        <input type="text" id="task-input" class="form-control me-1" placeholder="Enter task"/>
        <button id="add-task" class="btn btn-primary">Add Task</button>
        <button id="show-all-tasks" class="btn btn-primary">Show All Tasks</button>
    </div>
    <div>
            <table class="table table-striped"> 
                <thead>
                        <tr>
                            <th>#</th>
                            <th>Task</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                </thead>
            <tbody>
    
                <tr id="task-list">
                    @foreach($tasks as $task)
                        <td data-id="{{ $task->id }}">
                            <input type="checkbox" class="complete-task" {{ $task->completed ? 'checked' : '' }}>
                            {{ $task->title }}
                            <button class="delete-task">Delete <i class="fas fa-check"></i></button>
                        </td>
                    @endforeach
                </tr>
            <tbody>
        </table>
        </div> -->

<!-- <div class="container mt-5">
    <div class="row mb-4">
        <div class="col">
            <input type="text" id="task-input" class="form-control me-1" placeholder="Enter task" style="width: 50%; display: inline-block;"/>
            <button id="add-task" class="btn btn-primary">Add Task</button>
            <button id="show-all-tasks" class="btn btn-primary">Show All Tasks</button>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Task</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="task-list">
                    @foreach($tasks as $task)
                <td data-id="{{ $task->id }}">
                    <td>
                       <td>
                            <input type="checkbox" class="complete-task" {{ $task->completed ? 'checked' : '' }}>
                        </td>
                        <td> 
                            {{ $task->title }}
                         </td>
                        <td>
                            <button class="btn btn-success complete-task">{{ $task->completed ? 'Done' : 'Pending' }}</button>
                        </td>
                        <td>
                            <button class="btn btn-danger delete-task">Delete</button>
                         </td> 
                        
                    </td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    <script>
        $(document).ready(function() {
            $('#add-task').on('click', function() {
                let taskTitle = $('#task-input').val();

                $.ajax({
                    url: '{{ route('tasks.store') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        title: taskTitle
                    },
                    success: function(task) {
                        $('#task-list').append(`<td data-id="${task.id}">
                            <input type="checkbox" class="complete-task">
                            ${task.title}
                            <button class="delete-task">Delete</button>
                        </td>`);
                        $('#task-input').val('');
                    },
                    error: function(response) {
                        alert(response.responseJSON.message);
                    }
                });
            });

            $(document).on('change', '.complete-task', function() {
                let taskId = $(this).parent().data('id');

                $.ajax({
                    url: `/tasks/${taskId}/complete`,
                    type: 'PATCH',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function() {
                        $(`td[data-id="${taskId}"]`).remove();
                    }
                });
            });

            $(document).on('click', '.delete-task', function() {
                if (confirm('Are you sure to delete this task?')) {
                    let taskId = $(this).parent().data('id');

                    $.ajax({
                        url: `/tasks/${taskId}`,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function() {
                            $(`td[data-id="${taskId}"]`).remove();
                        }
                    });
                }
            });

            $('#show-all-tasks').on('click', function() {
                $.ajax({
                    url: '{{ route('tasks.showAll') }}',
                    type: 'GET',
                    success: function(tasks) {
                        $('#task-list').empty();
                        tasks.forEach(task => {
                            $('#task-list').append(`<td data-id="${task.id}">
                                <input type="checkbox" class="complete-task" ${task.completed ? 'checked' : ''}>
                                ${task.title}
                                <button class="delete-task">Delete</button>
                            </td>`);
                        });
                    }
                });
            });
        });

    </script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>  -->



<div class="container mt-5">
    <div class="row mb-4">
        <div class="col">
            <input type="text" id="task-input" class="form-control me-1" placeholder="Enter task" style="width: 50%; display: inline-block;"/>
            <button id="add-task" class="btn btn-primary">Add Task</button>
            <button id="show-all-tasks" class="btn btn-secondary">Show All Tasks</button>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Task</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="task-list">
                    @foreach($tasks as $task)
                        <tr data-id="{{ $task->id }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $task->title }}</td>
                            <td>
                                <span class="badge {{ $task->completed ? 'bg-success' : 'bg-warning' }}">
                                    {{ $task->completed ? 'Done' : 'Pending' }}
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-success btn-sm edit-task">✔</button>
                                <button class="btn btn-danger btn-sm delete-task">✘</button>
                                <input type="checkbox" class="complete-task">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- JavaScript to handle task actions -->
<script>
    $(document).ready(function() {
        // Add Task
        $('#add-task').on('click', function() {
            let taskTitle = $('#task-input').val();
            if (taskTitle) {
                $.ajax({
                    url: '{{ route('tasks.store') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        title: taskTitle
                    },
                    success: function(task) {
                        $('#task-list').append(`
                            <tr data-id="${task.id}">
                                <td>${$('#task-list tr').length + 1}</td>
                                <td>${task.title}</td>
                                <td>
                                    <span class="badge bg-warning">Pending</span>
                                </td>
                                <td>
                                    <button class="btn btn-success btn-sm complete-task1">✔</button>
                                    <button class="btn btn-danger btn-sm delete-task">✘</button>
                                    <input type="checkbox" class="complete-task">
                                </td>
                            </tr>
                        `);
                        $('#task-input').val('');
                    },
                    error: function(response) {
                        alert(response.responseJSON.message);
                    }
                });
            }
        });

        // Mark Task as Complete
        $(document).on('click', '.complete-task1', function() {
            let taskId = $(this).closest('tr').data('id');
            $.ajax({
                url: `/tasks/${taskId}/complete`,
                type: 'PATCH',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function() {
                    $(`tr[data-id="${taskId}"] .badge`).removeClass('bg-warning').addClass('bg-success').text('Done');
                }
            });
        });

        // Hide Task when Checkbox is clicked
        $(document).on('click', '.complete-task', function() {
            $(this).closest('tr').hide(); // Hide the row
        });

        // Show all hidden tasks
        $('#show-all-tasks').on('click', function() {
            $('#task-list tr').show(); // Show all rows
        });

        // Delete Task
        $(document).on('click', '.delete-task', function() {
            if (confirm('Are you sure to delete this task?')) {
                let taskId = $(this).closest('tr').data('id');
                $.ajax({
                    url: `/tasks/${taskId}`,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function() {
                        $(`tr[data-id="${taskId}"]`).remove();
                    }
                });
            }
        });

        // Show All Tasks
        $('#show-all-tasks').on('click', function() {
            $.ajax({
                url: '{{ route('tasks.showAll') }}',
                type: 'GET',
                success: function(tasks) {
                    $('#task-list').empty();
                    tasks.forEach((task, index) => {
                        $('#task-list').append(`
                            <tr data-id="${task.id}">
                                <td>${index + 1}</td>
                                <td>${task.title}</td>
                                <td>
                                    <span class="badge ${task.completed ? 'bg-success' : 'bg-warning'}">
                                        ${task.completed ? 'Done' : 'Pending'}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-success btn-sm complete-task1">✔</button>
                                    <button class="btn btn-danger btn-sm delete-task">✘</button>
                                    <input type="checkbox" class="complete-task">
                                </td>
                            </tr>
                        `);
                    });
                }
            });
        });
    });
</script>


</body>
</html> 



<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h3 class="text-center">Task Management App</h3>
            <form action="{{ route('tasks.store') }}" method="POST" class="d-flex mb-4">
                @csrf
                <input type="text" name="title" class="form-control me-2" placeholder="Enter task">
                <button type="submit" class="btn btn-primary">Add Task</button>
            </form>
            
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Task</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->is_complete ? 'Done' : 'Pending' }}</td>
                            <td>
                                <
                                <form action="{{ route('tasks.complete', $task->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </form>
                                
                                
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this task?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> -->

<!-- Bootstrap JS and dependencies -->
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script> -->
<!-- FontAwesome for icons -->
<!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html> -->



<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Simple To Do List App</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h3 class="text-center">PHP - Simple To Do List App</h3>
                <form id="task-form" class="d-flex mb-4">
                    <input type="text" id="task-input" class="form-control me-2" placeholder="Enter task">
                    <button type="button" id="add-task" class="btn btn-primary">Add Task</button>
                </form>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Task</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="task-list">
                        @foreach($tasks as $task)
                        <tr data-id="{{ $task->id }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->completed ? 'Done' : 'Pending' }}</td>
                            <td>
                                <button class="btn btn-success btn-sm complete-task">
                                    <i class="fas fa-check"></i>
                                </button>
                                <button class="btn btn-danger btn-sm delete-task">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#add-task').on('click', function () {
                let taskTitle = $('#task-input').val();

                $.ajax({
                    url: '{{ route('tasks.store') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        title: taskTitle
                    },
                    success: function (task) {
                        $('#task-list').append(`
                            <tr data-id="${task.id}">
                                <td>${$('#task-list tr').length + 1}</td>
                                <td>${task.title}</td>
                                <td>Pending</td>
                                <td>
                                    <button class="btn btn-success btn-sm complete-task">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm delete-task">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>`);
                        $('#task-input').val('');
                    },
                    error: function (response) {
                        alert(response.responseJSON.message);
                    }
                });
            });

            $(document).on('click', '.complete-task', function () {
                let taskId = $(this).closest('tr').data('id');

                $.ajax({
                    url: `/tasks/${taskId}/complete`,
                    type: 'PATCH',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function () {
                        $(`tr[data-id="${taskId}"]`).find('td:eq(2)').text('Done');
                    }
                });
            });

            $(document).on('click', '.delete-task', function () {
                if (confirm('Are you sure to delete this task?')) {
                    let taskId = $(this).closest('tr').data('id');

                    $.ajax({
                        url: `/tasks/${taskId}`,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function () {
                            $(`tr[data-id="${taskId}"]`).remove();
                        }
                    });
                }
            });
        });
    </script>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>

</html> -->

