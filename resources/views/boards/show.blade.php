@extends('templates.dashboard')
@section('title','Project ' . $board->name)
@section('content')
<button class="mb-2 btn btn-info font-weight-bold float-right" id="btnAddNewCard" data-board-id="{{ $board->id }}">Add new card</button>
<div class="clearfix"></div>
<div class="row" id="cards-container">
    @foreach($board->cards as $card)
    <!-- Dropdown Card Example -->
    <div class="card shadow mb-4 droppable col-md-4" ondragover="allowDrop(event)" ondrop="drop(event)">
        <!-- Card Header - Dropdown -->
        <div id="card-header" class="card-header py-3 d-flex flex-row align-items-center justify-content-between" >
            <h6 class="m-0 font-weight-bold text-primary">{{ $card->name }}</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Actions :</div>
                    <a class="dropdown-item addTask" refer-to="{{ $card->name }}">Add new task</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item">Archive</a>
                </div>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body" data-card-id="{{ $card->id }}" id="card-{{str_replace(' ', '-', strtolower($card->name))}}">
                @foreach($card->tasks as $task)
                    <button class="mt-2 btn btn-primary rounded-0 border-0 btn-block text-left btn-task "
                    id="list{{$task->id}}" draggable="true" ondragstart="dragStart(event)" data-task-id="{{ $task->id }}" data-task-description="{{ $task->description }}">
                     @if ( !is_null($task->description) )
                        <span class="icon text-white-50">
                            <i class="fas fa-info-circle"></i>
                        </span>
                     @endif
                    <span class="text">{{ $task->name }}</span>
                </button>
                @endforeach
        </div>
    </div>
    @endforeach
</div>

<!-- Add new task Modal-->
  <div class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Edit task</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
      <form autocomplete="off" id="taskEditForm">

        <div class="modal-body">
                <label for="#name">Name :</label>
                <input type="text" class="form-control" id="name" name="name">
                <label for="description">Description : </label>
                <textarea class="form-control" name="descrption" id="description" cols="30" rows="10"></textarea>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit" id="btnTaskSaved">Save</button>
         </form>
        </div>
      </div>
    </div>
  </div>

@endsection
