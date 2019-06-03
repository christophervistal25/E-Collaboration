$.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
 });

$('#btnCreate').click( (e) => {
    e.preventDefault();
     $.ajax({
        type: 'POST',
        url: "/boards",
        dataType: "json",
        data: {name:$('#projectName').val()},
        success:(data) => {

            $('#projectContainer').append(`
                <div class="mt-2 card border-left-info shadow h-100 py-2 col-md-3 ml-3 project-board" data-id-attribute="${data.new_project.id}" onclick="return redirect(this);" style="cursor:pointer;">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">${data.new_project.name}</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
              `);

            $('#createProjectModal').modal('toggle');
        }
    });
});
