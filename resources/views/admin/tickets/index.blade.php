@extends('layouts.app');
@section('content')
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
                <td>{{ $ticket->prority }}</td>
                <td>{{ $ticket->message }}</td>

                <!-- Bottoni -->
                <td>
                    <a class="btn btn-primary" href="{{route('admin.tickets.show', ['ticket' => $ticket])}}">More</a>
                </td>
                <td>
                    <a class="btn btn-warning" href="{{route('admin.tickets.edit', ['ticket' => $ticket])}}">Edit</a>
                </td>
                {{-- <td>
                    <a class="btn btn-danger" href="{{route('admin.tickets.delete', ['ticket' => $ticket])}}">Delete</a>
                </td> --}}
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
