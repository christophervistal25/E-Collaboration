@extends('templates.dashboard')
@section('title','Project ' . $board->name)
@section('content')
<div class="row">
    <!-- <form action="/cards" autocomplete="off" method="POST">
        @csrf
        <input type="input" name="name" placeholder="Input card name...">
        <input type="hidden" name="board_id" value="{{ $board->id }}">
        <input type="submit" value="Add card">
    </form> -->
    @foreach($board->cards as $card)
    <!-- Dropdown Card Example -->
    <div class="card shadow mb-4 droppable col-md-4" ondragover="allowDrop(event)" ondrop="drop(event)">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">{{ $card->name }}</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Dropdown Header:</div>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body" data-card-id="{{ $card->id }}">
                @foreach($card->tasks as $task)
                <button  class="btn btn-primary rounded-0 border-0" id="list" draggable="true" ondragstart="dragStart(event)" data-task-id="{{ $task->id }}">
                    {{ $task->name }}
                </button>
                @endforeach
        </div>
    </div>
    @endforeach
</div>
@endsection
