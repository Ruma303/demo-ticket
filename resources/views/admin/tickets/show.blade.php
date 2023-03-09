@extends('layouts.app');
@section('content')
<div class="show-container container">
    <h3 class="subject-title">Subject: <span class="subject-content"> {{ $ticket->subject }} </span></h3>
    <h4 class="priority-title">Priority: <span class="priority-content">{{ $ticket->priority }}</span></h4>
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
