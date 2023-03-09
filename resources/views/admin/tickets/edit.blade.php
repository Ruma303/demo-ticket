@extends('layouts.app');
@section('content')
<div class="edit-container container">
    <form method="post" action="{{ route('admin.tickets.update', ['ticket' => $ticket]) }}" novalidate>
        @csrf()
        @method('PUT')
        {{-- FIXME: NON MANTIENE I VECCHI VALUE NEI CAMPI --}}
        <label for="subject" class="subject-title">Change subject: </label>
        <input type="text" class="form-control" id="subject" name ="subject" value="{{old('subject', $ticket->subject)}}"
        placeholder="Edit the subject of the ticket here">


        <!-- select -->
        <label for="priority" class="priority-title">Change priority: </label>
        <select class="form-select" id="priority" name="priority">
                <option value="High">High</option>
                <option value="Medium">Medium</option>
                <option value="Low">Low</option>
        </select>


        <label class="message-title">Change message:</label>
        <textarea name="message" id="message" cols="30" rows="10" value="{{ old('message') }}" class="form-control" placeholder="Your message..."></textarea>


        <button type="submit" class="btn btn-warning">Edit ticket</button>
    </form>
    <form action="{{ route('admin.tickets.destroy', ['ticket' => $ticket]) }}" method="post">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Delete ticket</button>
    </form>
</div>

@endsection
