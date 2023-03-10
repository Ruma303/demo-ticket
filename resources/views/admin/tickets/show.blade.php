@extends('layouts.app');
@section('content')
<div class="show-container container">
    <h3 class="subject-title">Subject: <span class="subject-content"> {{ $ticket->subject }} </span></h3>
    <h4 class="priority-title">Priority: <span class="priority-content">{{ $ticket->priority }}</span></h4>
    <img src="{{ asset('storage/' . $ticket->file) }}" alt="" class="file-preview">
    <h5 class="message-title">Message: <p class="message-content">{{ $ticket->message }}</p></h5>

    <td>
        <a class="btn btn-warning" href="{{route('admin.tickets.edit', ['ticket' => $ticket])}}">Edit</a>
    </td>
    <form action="{{ route('admin.tickets.destroy', ['ticket' => $ticket]) }}" method="post">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Delete ticket</button>
    </form>
</div>

@endsection
<style>
.file-preview {
    width: 10rem;
    max-width: 40rem;
    height: auto;
    max-height: auto;
}
</style>
