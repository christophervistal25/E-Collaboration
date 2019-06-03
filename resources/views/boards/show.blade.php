<h1>Board : {{ $board->name }}</h1>
<form action="/cards" autocomplete="off" method="POST">
    @csrf
    <input type="input" name="name" placeholder="Input card name...">
    <input type="hidden" name="board_id" value="{{ $board->id }}">
    <input type="submit" value="Add card">
</form>

@foreach($board->cards as $card)
<span>{{ $card->name }}
    @foreach($card->tasks as $task)
    <form action="/tasks/{{ $task->id }}" autocomplete="off" method="POST">
        @csrf
        @method('PUT')
         <li>{{ $task->name }}
            <a href="/tasks/{{ $task->id }}/edit">Move to </a>
         </li>
    </form>
    @endforeach
</span>
@if($loop->index == 0)
<form action="/tasks" autocomplete="off" method="POST">
    @csrf
    <input type="text" name="name">
    <input type="hidden" name="card_id" value=" {{ $card->id }} ">
    <input type="submit" value="Add task">
</form>
@endif
<br>
@endforeach
