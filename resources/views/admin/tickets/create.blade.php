@extends('layouts.app');
@section('content')
<div class="create-container">
    <form method="post" action="{{ route('admin.tickets.store') }}" novalidate class="container">
        @csrf()
        @method('POST')
        <label for="subject" class="subject-title">Subject: </label>
        <input type="text" class="form-control" id="subject" name ="subject" value="{{ old('subject') }}"
        placeholder="Type the subject of the ticket here">


        <!-- select -->
        <label for="priority" class="priority-title">Priority: </label>
        <select class="form-select" id="priority" name="priority">
                <option value="High">High</option>
                <option value="Medium">Medium</option>
                <option value="Low">Low</option>
        </select>


        <label class="message-title">Message:</label>
        <textarea name="message" id="message" cols="30" rows="10" value="{{ old('message') }}" class="form-control" placeholder="Your message..."></textarea>


        <button type="submit" class="btn btn-primary">Create Ticket</button>
    </form>
</div>

@endsection
