Task name :<span>{{ $task->name }}</span>
<form action="/tasks/{{$task->id}}" method="POST">
    @csrf
    @method('PUT')
    <label>Select card : </label>
    <select name="move_to_card">
        @foreach($cards as $card)
            <option {{ ($task->card_id === $card->id) ? 'selected' : null }} value="{{ $card->id }}">{{ $card->name }}</option>
        @endforeach
    </select>
    <br>
    <label>Current task : </label>
    <input type="submit"  value="Move">
</form>
