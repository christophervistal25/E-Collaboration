@extends('templates.dashboard')
@section('title','Projects')
@section('content')
<div class="row">
@foreach($boards as $board)
    <div class="card border-left-info shadow h-100 py-2 col-md-3 ml-3 project-board" data-id-attribute="{{ $board->id }}" onclick="return redirect(this);" style="cursor:pointer;">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">{{ $board->name }}</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            {{-- <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div> --}}
                        </div>
                       <!--  <div class="col">
                           <div class="progress progress-sm mr-2">
                               <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                           </div>
                       </div> -->
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
@endsection
