@extends('layouts.app');
@section('content')
    @if(session('deleted'))
        <div class="alert alert-success">
            Ticket {{ session('deleted')->subject }} deleted
        </div>
    @endif
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Subject</th>
            <th scope="col">Priority</th>
            <th scope="col">Message</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tickets as $ticket)
            <tr>
                <th scope="row">{{ $ticket->id }}</th>
                <td>{{ $ticket->subject }}</td>
                {{-- FIXME: non vengono mostrare le priority --}}
                <td>{{ $ticket->priority }}</td>
                <td>{{ $ticket->message }}</td>

                <!-- Bottoni -->
                <td>
                    <a class="btn btn-primary" href="{{route('admin.tickets.show', ['ticket' => $ticket])}}">More</a>
                </td>
                <td>
                    <a class="btn btn-warning" href="{{route('admin.tickets.edit', ['ticket' => $ticket])}}">Edit</a>
                </td>
                <td>
                    <form action="{{ route('admin.tickets.destroy', ['ticket' => $ticket]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
