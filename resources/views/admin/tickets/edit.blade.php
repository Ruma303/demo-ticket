@extends('layouts.app');
@section('content')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="edit-container container">
    <form method="post" action="{{ route('admin.tickets.update', ['ticket' => $ticket]) }}" novalidate>
        @csrf()
        @method('PUT')

        <label for="subject" class="subject-title">Change subject: </label>
        <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name ="subject" value="{{old('subject', $ticket->subject)}}"
        placeholder="Edit the subject of the ticket here">
        @error('subject')
            <div class="invalid-feedback">
                <ul>
                    @foreach($errors->get('subject') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
        @enderror

        {{--TODO Aggiorna metodo old--}}
        <label for="priority" class="priority-title">Change priority: </label>
        <select class="form-select" id="priority" name="priority">
                <option value="High">High</option>
                <option value="Medium">Medium</option>
                <option value="Low">Low</option>
        </select>

        {{-- % Edit file --}}
        <div class="edit-preview-div">
            <label for="file-title">Edit File:</label>
            <input type="file" name="file" id="file-tile">
            <img src="{{ asset('storage/' . $ticket->file) }}" alt="" class="file-preview">
            {{-- TODO aggiungi bottone scaricamento file --}}
        </div>


        {{--TODO Aggiorna metodo old--}}
        <label class="message-title">Change message:</label>
        <textarea name="message" id="message" cols="30" rows="10" value="{{ old('message') }}" class="form-control @error('message') is-invalid @enderror" placeholder="Your message..."></textarea>
        @error('message')
            <div class="invalid-feedback">
                <ul>
                    @foreach($errors->get('message') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
        @enderror

        <button type="submit" class="btn btn-warning">Edit ticket</button>
    </form>
    <form action="{{ route('admin.tickets.destroy', ['ticket' => $ticket]) }}" method="post">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Delete ticket</button>
    </form>
</div>

@endsection
