@extends('templates.dashboard')
@section('title','Projects')
@section('content')
<button class="btn btn-primary float-right" data-toggle="modal" data-target="#createProjectModal">Add new project</button>
<div class="row" id="projectContainer">
@foreach($boards as $board)
    <div class="mt-2 card border-left-info shadow h-100 py-2 col-md-3 ml-3 project-board" data-id-attribute="{{ $board->id }}" onclick="return redirect(this);" style="cursor:pointer;">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">{{ $board->name }}</div>
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
    @endforeach
</div>
  <!-- Logout Modal-->
  <div class="modal fade" id="createProjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to make new project?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="#formCreateProject" autocomplete="off">
            <input type="text" name="name" id="projectName" class="form-control" placeholder="Enter Project name...">
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit" id="btnCreate">Create</button>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
