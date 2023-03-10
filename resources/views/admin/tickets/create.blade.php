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
<div class="create-container">
    <form method="post" action="{{ route('admin.tickets.store') }}" novalidate class="container"
    enctype="multipart/form-data">
        @csrf()
        @method('POST')
        <label for="subject" class="subject-title">Subject: </label>
        <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name ="subject" value="{{ old('subject') }}"
        placeholder="Type the subject of the ticket here">
        @error('subject')
            <div class="invalid-feedback">
                <ul>
                    @foreach($errors->get('subject') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
        @enderror

        <!-- select -->
        <label for="priority" class="priority-title">Priority: </label>
        <select class="form-select" id="priority" name="priority">
                <option value="High">High</option>
                <option value="Medium">Medium</option>
                <option value="Low">Low</option>
        </select>


        <label class="message-title">Message:</label>
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

        <label for="file">Upload File:</label>
        <input type="file" name="file">

        <button type="submit" class="btn btn-primary">Create Ticket</button>
    </form>
</div>

@endsection
