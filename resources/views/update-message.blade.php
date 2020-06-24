@extends('layouts.app')

@section('title')
    Admin Panel
@endsection

@section('content')
    <h1>Admin Panel</h1>
    <br>
    <hr>
    <h2>Update message:</h2>
    <br>

    <div class="conteiner">
        <div class="row">
            <form action="{{ route('message-update-submit', $contact->id) }}" method="post">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <span>Id: {{ $contact->id }}</span>
                    </div>
                    <div class="form-group col-md-12">
                        <span>Date Created: {{ $contact->created_at }}</span>
                    </div>
                    <p>Watched:  &nbsp;&nbsp;</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="watched" id="inlineRadio1"
                               value="1" @if($contact->watched) checked @endif>
                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="watched" id="inlineRadio2"
                               value="0" @if(!$contact->watched) checked @endif>
                        <label class="form-check-label" for="inlineRadio2">No</label>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="inputEmail">Name</label>
                        <input required type="text" class="form-control" id="inputName" name="name"
                               value="{{ $contact->name }}">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputEmail">Email</label>
                        <input required type="text" class="form-control" id="inputEmail" name="email"
                               value="{{ $contact->email }}">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputEmail">Phone</label>
                        <input required type="text" class="form-control" id="inputText" name="phone"
                               value="{{ $contact->phone }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputMessage">Message</label>
                    <textarea class="form-control" name="message">{{ $contact->message }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save message</button>

            </form>
            <br>
            <form action="/admin/{{ $contact->id }}/delete" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">Delete message</button>
            </form>
        </div>
    </div>
@endsection
