let taskId = null;

$.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
 });

$(document).on('click','.btn-task ', (event) => {
    // Get the Id of the current task clicked.
    taskId = event.target.getAttribute('data-task-id');
    let taskName = event.target.innerText;
    let taskDescription = event.target.getAttribute('data-task-description');

    $('#name').val(taskName);
    $('#description').val(taskDescription);


    // Show the modal
    $('#modalTitle').html(`Edit task ${taskName}`);
    $('#taskModal').modal('toggle');
});

$('#taskEditForm').submit( (e) => {
    e.preventDefault();
    let data = $('#taskEditForm').serialize();
    $.ajax({
        type: 'PUT',
        url: `/tasks/${taskId}`,
        dataType: "json",
        data: data,
        success:(data) => {
            if ( data.success ) {
                $('#taskModal').modal('toggle');
                // data-task-id="{{ $task->id }}" data-task-description="{{ $task->description }}">

                let selectedTask = $(`#list${data.task.id}`);
                selectedTask.attr('data-task-description',data.task.description);
                selectedTask.html(data.task.name);
            }
        }
    });
});
