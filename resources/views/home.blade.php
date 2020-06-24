@extends('layouts.app')

@section('title')
    Main Page
@endsection

@section('content')
    <h1>Main page</h1>
    <br>
    <h2>Contact form</h2>

    @include('partials.messages')

    <form action="/home/submit" method="post">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputName">Name</label>
                <input required type="text" class="form-control" id="inputName" name="name">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail">Email</label>
                <input required type="email" class="form-control" id="inputEmail" name="email">
            </div>
            <div class="form-group col-md-12">
                <label for="inputPhone">Phone</label>
                <input required type="phone" class="form-control" id="inputPhone" name="phone">
            </div>
        </div>
        <div class="form-group">
            <label for="inputMessage">Message</label>
            <textarea class="form-control" name="message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
@endsection
